<?php

class LivreManager extends BaseManager
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DBManager::getInstance()->getPDO();
    }

    // findAll(), findOne()...


    public function findAll(): array
    {
        $sql = "SELECT * FROM livres";

        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $livres = [];

        foreach ($data as $row) {
            $livre = new LivreEntity();
            $livre->setId($row['id']);
            $livre->setTitre($row['titre']);
            $livre->setAuteur($row['auteur']);
            $livre->setImage($row['image']);
            $livre->setDescription($row['description']);
            $livre->setUserId($row['user_id']);


            $livres[] = $livre;
        }

        return $livres;
    }


    public function findOne(int $id): ?LivreEntity
    {
        $sql = "SELECT l.*, u.avatar, u.pseudo 
            FROM livres l
            LEFT JOIN users u ON l.user_id = u.id_user
            WHERE l.id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        $livre = new LivreEntity();
        $livre->setId($row['id']);
        $livre->setTitre($row['titre']);
        $livre->setAuteur($row['auteur']);
        $livre->setImage($row['image']);
        $livre->setDescription($row['description']);
        $livre->setStatut($row['statut']);
        $livre->setDateCreation($row['date_creation']);
        $livre->setUserId($row['user_id']);
        $livre->setAvatar($row['avatar'] ?? '');
        $livre->setPseudo($row['pseudo'] ?? '');

        return $livre;
    }
}
