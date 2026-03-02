<?php

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/LivreManager.php';

class LivresController
{
    private LivreManager $manager;

    public function __construct()
    {
        $this->manager = new LivreManager(getPDO());
    }

    public function index(): void
    {
        $livres = $this->manager->findAll();
        require __DIR__ . '/../views/livres.php';
    }

    public function show(int $id): void
    {
        $livre = $this->manager->findOne($id);

        if ($livre === null) {
            http_response_code(404);
            echo "Livre introuvable";
            return;
        }

        require __DIR__ . '/../views/details-livre.php';
    }
}
