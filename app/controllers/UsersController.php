<?php

class UsersController
{
    private UserManager $manager;

    public function __construct()
    {
        $this->manager = new UserManager();
    }

    private function checkConnectedById(int $id): bool
    {
        if (!isset($_SESSION['user_id'])) {
            return false;
        }

        return (int)$_SESSION['user_id'] === $id;
    }


    public function showMonCompte(): void
    {
        $id = (int) Utils::request('id', 0);

        $isAllowed = $this->checkConnectedById($id);

        $users = [];
        $livres = [];

        if ($isAllowed) {
            $user = $this->manager->findOne($id);

            $livreManager = new LivreManager();
            $livres = $livreManager->findLivresByUserId($id);

            if ($user !== null) {
                $user->setNbrLivres(count($livres));
                $users = [$user];
            }
        }

        // Variables “simples” pour la vue
        $isLoggedIn = isset($_SESSION['user_id']);     // connecté ou non
        $isOwner = $isAllowed;                          // connecté + bon id
        $hasLivres = !empty($livres);

        $viewFile = __DIR__ . '/../views/mon-compte.php';
        require __DIR__ . '/../views/layout.php';
    }

    public function login(): void
    {
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email    = trim(Utils::request('email', ''));
            $password = Utils::request('password', '');

            $user = $this->manager->findByEmail($email);

            if ($user !== null) {
                $stored = $user->getPassword(); // contenu DB: hash OU clair (actuellement chez toi)

                $isHash = is_string($stored) && str_starts_with($stored, '$2y$');

                $ok = false;

                if ($isHash) {
                    $ok = password_verify($password, $stored);
                } else {
                    // Ancien mot de passe en clair (migration)
                    $ok = hash_equals((string) $stored, (string) $password);

                    if ($ok) {
                        $newHash = password_hash($password, PASSWORD_DEFAULT);
                        $this->manager->updatePasswordHash($user->getId(), $newHash);
                    }
                }

                if ($ok) {
                    $_SESSION['user_id']     = $user->getId();
                    $_SESSION['user_pseudo'] = $user->getPseudo();
                    Utils::redirect('mon-compte', ['id' => $user->getId()]);
                    return;
                }
            }

            $error = 'Email ou mot de passe incorrect.';
        }

        $viewFile = __DIR__ . '/../views/connexion.php';
        require __DIR__ . '/../views/layout.php';
    }
    public function logout(): void
    {



        // Vider les variables de session
        $_SESSION = [];

        // Supprimer le cookie de session (recommandé)
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        // Détruire la session
        session_destroy();

        // Redirection
        Utils::redirect('connexion'); // ou 'accueil'
    }

    public function register(): void
    {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo   = trim(Utils::request('pseudo', ''));
            $email    = trim(Utils::request('email', ''));
            $password = Utils::request('password', '');
            if ($pseudo === '' || $email === '' || $password === '') {
                $error = 'Tous les champs sont obligatoires.';
            } elseif ($this->manager->findByEmail($email) !== null) {
                $error = 'Cette adresse email est déjà utilisée.';
            } elseif ($this->manager->findByPseudo($pseudo) !== null) {
                $error = 'Ce pseudo est déjà utilisé.';
            } elseif (strlen($password) < 8) {
                $error = 'Le mot de passe doit contenir au moins 8 caractères.';
            } else {
                $user = new UserEntity();
                $user->setPseudo($pseudo);
                $user->setEmail($email);
                $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
                $user->setInscription(date('Y-m-d H:i:s'));
                $user->setAvatar('assets/images/placeholder.jpg');
                $this->manager->addUser($user);

                $_SESSION['user_id']     = $user->getId();
                $_SESSION['user_pseudo'] = $user->getPseudo();
                Utils::redirect('mon-compte', ['id' => $user->getId()]);
                return;
            }
        }
        $viewFile = __DIR__ . '/../views/inscription.php';
        require __DIR__ . '/../views/layout.php';
    }

    private function saveUploadedImage(string $fieldName, string $subDir): ?string
    {
        if (
            !isset($_FILES[$fieldName]) ||
            !is_array($_FILES[$fieldName]) ||
            ($_FILES[$fieldName]['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK
        ) {
            return null;
        }

        $tmp = $_FILES[$fieldName]['tmp_name'];
        $originalName = $_FILES[$fieldName]['name'] ?? 'upload';
        $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (!in_array($ext, $allowed, true)) {
            return null;
        }

        $dir = __DIR__ . '/../../public/uploads/' . $subDir;
        if (!is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $fileName = bin2hex(random_bytes(16)) . '.' . $ext;
        $dest = $dir . '/' . $fileName;

        if (!move_uploaded_file($tmp, $dest)) {
            return null;
        }

        return 'uploads/' . $subDir . '/' . $fileName; // stocké en DB
    }

    public function updateAvatar(): void
    {
        if (!isset($_SESSION['user_id'])) {
            Utils::redirect('connexion');
            return;
        }

        $userId = (int)$_SESSION['user_id'];

        // upload > url > rien (on garde l’existant)
        $uploaded = $this->saveUploadedImage('avatar_file', 'avatars');
        $url = trim(Utils::request('avatar_url', ''));

        $newAvatar = null;
        if ($uploaded !== null) {
            $newAvatar = $uploaded;
        } elseif ($url !== '') {
            $newAvatar = $url;
        } else {
            // rien fourni => pas de changement
            Utils::redirect('mon-compte', ['id' => $userId]);
            return;
        }

        $userManager = new UserManager();
        $userManager->updateAvatar($userId, $newAvatar);

        Utils::redirect('mon-compte', ['id' => $userId]);
    }

    public function updateProfile(): void
    {
        if (!isset($_SESSION['user_id'])) {
            Utils::redirect('connexion');
            return;
        }

        $userId = (int) $_SESSION['user_id'];

        $email = trim(Utils::request('email', ''));
        $pseudo = trim(Utils::request('pseudo', ''));

        // Important: on lit le bon champ (à aligner avec le formulaire)
        $newPassword = password_hash(Utils::request('mot_de_passe', ''), PASSWORD_DEFAULT); // ou 'mot_de_passe' selon ton form

        if ($email === '' || $pseudo === '') {
            Utils::redirect('mon-compte', ['id' => $userId]);
            return;
        }

        $userManager = new UserManager();
        $userManager->updateProfile($userId, $email, $pseudo, $newPassword);

        Utils::redirect('mon-compte', ['id' => $userId]);
    }

    public function showComptePublic(int $userId): void
    {
        $user = $this->manager->showComptePublic($userId);

        if ($user === null) {
            Utils::redirect('accueil');
            return;
        }

        $livreManager = new LivreManager();
        $livres = $livreManager->findLivresByUserId($userId);

        $user->setNbrLivres(count($livres));

        // Variables “simples” pour la vue
        $isLoggedIn = isset($_SESSION['user_id']);
        $isOwner = $this->checkConnectedById($userId);
        $hasLivres = !empty($livres);

        $viewFile = __DIR__ . '/../views/compte-public.php';
        require __DIR__ . '/../views/layout.php';
    }
}
