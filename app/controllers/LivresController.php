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

        $livres = $this->manager->findAll();
        $viewFile = __DIR__ . '/../views/livres.php';
        require __DIR__ . '/../views/layout.php';
    }

    public function show(int $id): void
    {
        $livre = $this->manager->findOne($id);

        if ($livre === null) {
            http_response_code(404);
            echo "Livre introuvable";
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
        $viewFile = __DIR__ . '/../views/livres-by-user.php';
        require __DIR__ . '/../views/layout.php';
    }
}
