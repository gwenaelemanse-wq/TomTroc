<?php

class LivresController
{
    private LivreManager $manager;

    public function __construct()
    {
        $this->manager = new LivreManager();
    }

    public function index(): void
    {
        $search = trim(Utils::request('search', ''));

        if ($search !== '') {
            $livres = $this->manager->search($search);   // <-- array
            $noResults = empty($livres);
        } else {
            $livres = $this->manager->findAll();
            $noResults = false;
        }

        $viewFile = __DIR__ . '/../views/livres.php';
        require __DIR__ . '/../views/layout.php';
    }

    public function show(): void
    {
        $id = (int) Utils::request('id', 0);
        $livre = $this->manager->findOne($id);

        if ($livre === null) {
            Utils::redirect('livres');
            return;
        }

        $viewFile = __DIR__ . '/../views/details-livre.php';
        require __DIR__ . '/../views/layout.php';
    }

    public function showLastAdded(): void
    {
        $pageTitle = 'TomTroc - Accueil';
        $livres = $this->manager->findLastAdded();
        $viewFile = __DIR__ . '/../views/accueil-content.php';
        require __DIR__ . '/../views/layout.php';  // ← Le layout enveloppe tout
    }

    public function showLivresByUser(int $userId): void
    {
        $livres = $this->manager->findLivresByUserId($userId);
        $viewFile = __DIR__ . '/../views/compte-public.php';
        require __DIR__ . '/../views/layout.php';
    }

    public function showFirstDescriptionLine(int $livreId): void
    {
        $livres = $this->manager->getFirstDescriptionLine($livreId);
        $viewFile = __DIR__ . '/../views/compte-public.php';
        require __DIR__ . '/../views/layout.php';
    }

    public function edit(): void
    {
        // 1) sécurité: connecté
        if (!isset($_SESSION['user_id'])) {
            // soit redirect, soit message
            Utils::redirect('connexion');
            return;
        }

        $id = (int) Utils::request('id', 0);
        $mode = $id > 0 ? 'edit' : 'create';

        $livre = null;

        if ($mode === 'edit') {
            $livreManager = new LivreManager();
            $livre = $livreManager->findOne($id);

            if ($livre === null) {
                // livre introuvable
                Utils::redirect('mon-compte', ['id' => (int)$_SESSION['user_id']]);
                return;
            }

            // 2) sécurité: le livre doit appartenir à l'utilisateur
            if ((int)$livre->getUserId() !== (int)$_SESSION['user_id']) {
                Utils::redirect('mon-compte', ['id' => (int)$_SESSION['user_id']]);
                return;
            }
        }

        // 3) POST: enregistrer
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = (int) $_SESSION['user_id'];

            $titre = trim(Utils::request('titre', ''));
            $auteur = trim(Utils::request('auteur', ''));
            $description = trim(Utils::request('description', ''));
            $statut = trim(Utils::request('statut', 'Disponible'));

            // Livre "à sauvegarder"
            $livreToSave = new LivreEntity();
            $livreToSave->setTitre($titre);
            $livreToSave->setAuteur($auteur);
            $livreToSave->setDescription($description);
            $livreToSave->setUserId($userId);      // IMPORTANT: depuis session
            $livreToSave->setStatut($statut);      // "Disponible"/"Indisponible"

            // Image: upload > URL > garder (edit) > null (create)
            $uploadedPath = $this->saveUploadedImage('image_file');
            $imageUrl = trim(Utils::request('image_url', ''));

            if ($uploadedPath !== null) {
                $livreToSave->setImage($uploadedPath);
            } elseif ($imageUrl !== '') {
                $livreToSave->setImage($imageUrl);
            } else {
                if ($mode === 'edit' && $livre !== null) {
                    $livreToSave->setImage($livre->getImage());
                } else {
                    $livreToSave->setImage(null);
                }
            }

            // Sauvegarde
            if ($mode === 'edit' && $livre !== null) {
                $livreToSave->setId((int)$livre->getId());
                $this->manager->updateLivre($livreToSave);
            } else {
                $this->manager->createLivre($livreToSave);
            }

            Utils::redirect('mon-compte', ['id' => $userId]);
            return;
        }

        // Données “prêtes pour le formulaire”
        $formData = [
            'titre' => $livre ? $livre->getTitre() : '',
            'auteur' => $livre ? $livre->getAuteur() : '',
            'description' => $livre ? $livre->getDescription() : '',
            'image' => $livre ? $livre->getImage() : '',
            'statut' => $livre ? $livre->getStatut() : 'Disponible',
        ];

        $viewFile = __DIR__ . '/../views/editer.php';
        require __DIR__ . '/../views/layout.php';
    }



    public function deleteLivreByUser(): void
    {
        if (!isset($_SESSION['user_id'])) {
            Utils::redirect('connexion');
            return;
        }

        $livreId = (int) Utils::request('id', 0);
        $userId = (int) $_SESSION['user_id'];

        $this->manager->deleteLivre($livreId, $userId);

        Utils::redirect('mon-compte', ['id' => $userId]);
    }

    private function saveUploadedImage(string $fieldName = 'image_file'): ?string
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

        // sécurité minimale
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        if (!in_array($ext, $allowed, true)) {
            return null; // ou gérer une erreur utilisateur
        }

        $uploadsDir = __DIR__ . '/../../public/uploads';
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0775, true);
        }

        $fileName = bin2hex(random_bytes(16)) . '.' . $ext;
        $dest = $uploadsDir . '/' . $fileName;

        if (!move_uploaded_file($tmp, $dest)) {
            return null;
        }

        // chemin enregistré en DB (accessible depuis le navigateur)
        return 'uploads/' . $fileName;
    }

    public function searchAndRedirect(): void
    {
        $search = trim(Utils::request('search', ''));

        if ($search === '') {
            // rien tapé => retour listing
            Utils::redirect('livres');
            return;
        }

        $livre = $this->manager->findOneByTitre($search);

        if ($livre !== null) {
            Utils::redirect('details-livre', ['id' => $livre->getId()]);
            return;
        }

        // sinon on ré-affiche la page livres + message
        $livres = $this->manager->findAll();
        $noResults = true;

        $viewFile = __DIR__ . '/../views/livres.php';
        require __DIR__ . '/../views/layout.php';
    }
}
