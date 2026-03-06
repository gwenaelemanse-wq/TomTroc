<?php

class UsersController
{
    private UserManager $manager;

    public function __construct()
    {
        $this->manager = new UserManager();
    }

    public function showMonCompte(): void
    {
        $id = (int) Utils::request('id', 0);
        $user = $this->manager->findOne($id);

        $livreManager = new LivreManager();
        $livres = $livreManager->findLivresByUserId($id);

        if ($user !== null) {
            $user->setNbrLivres(count($livres));
        }

        $users = $user !== null ? [$user] : [];

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

            if ($user !== null && password_verify($password, $user->getPassword())) {
                $_SESSION['user_id']     = $user->getId();
                $_SESSION['user_pseudo'] = $user->getPseudo();
                Utils::redirect('accueil');
                return;
            }

            $error = 'Email ou mot de passe incorrect.';
        }

        require __DIR__ . '/../views/connexion.php';
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
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'Adresse email invalide.';
            } elseif (strlen($password) < 8) {
                $error = 'Le mot de passe doit contenir au moins 8 caractères.';
            } elseif ($this->manager->findByEmail($email) !== null) {
                $error = 'Cette adresse email est déjà utilisée.';
            } elseif ($this->manager->findByPseudo($pseudo) !== null) {
                $error = 'Ce pseudo est déjà utilisé.';
            } else {
                $user = new UserEntity();
                $user->setPseudo($pseudo);
                $user->setEmail($email);
                $user->setPassword(password_hash($password, PASSWORD_DEFAULT));
                $user->setInscription(date('Y-m-d H:i:s'));

                $this->manager->addUser($user);

                $_SESSION['user_id']     = $user->getId();
                $_SESSION['user_pseudo'] = $user->getPseudo();
                Utils::redirect('accueil');
                return;
            }
        }

        require __DIR__ . '/../views/inscription.php';
    }
}
