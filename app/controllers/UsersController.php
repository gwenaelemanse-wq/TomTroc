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
}
