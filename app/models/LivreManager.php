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
        $sql = "SELECT l.*, u.pseudo
            FROM livres l
            LEFT JOIN users u ON l.user_id = u.id_user";

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
            $livre->setPseudo($row['pseudo'] ?? '');

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

    public function findLastAdded(): array  // ← Retourne un ARRAY, pas un seul livre!
    {
        $sql = "SELECT l.*, u.pseudo
            FROM livres l
            LEFT JOIN users u ON l.user_id = u.id_user
            ORDER BY l.date_creation DESC LIMIT 4";

        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);  // ← fetchAll() pour plusieurs lignes

        $livres = [];

        foreach ($data as $row) {
            $livre = new LivreEntity();
            $livre->setId($row['id']);
            $livre->setTitre($row['titre']);
            $livre->setAuteur($row['auteur']);
            $livre->setImage($row['image']);
            $livre->setPseudo($row['pseudo'] ?? '');



            $livre->setUserId($row['user_id']);

            $livres[] = $livre;  // ← Ajoute chaque livre à l'array
        }

        return $livres;  // ← Retourne un array de LivreEntity
    }

    public function addLivre(LivreEntity $livre): void
    {
        $sql = "INSERT INTO livres (titre, auteur, image, description, user_id) VALUES (:titre, :auteur, :image, :description, :user_id)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'titre' => $livre->getTitre(),
            'auteur' => $livre->getAuteur(),
            'image' => $livre->getImage(),
            'description' => $livre->getDescription(),
            'user_id' => $livre->getUserId()
        ]);

        $livre->setId((int)$this->pdo->lastInsertId());
    }

    public function findLivresByUserId(int $userId): array
    {
        $sql = "SELECT * FROM livres WHERE user_id = :userId";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['userId' => $userId]);

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $livres = [];

        foreach ($data as $row) {
            $livre = new LivreEntity();
            $livre->setId($row['id']);
            $livre->setTitre($row['titre']);
            $livre->setAuteur($row['auteur']);
            $livre->setImage($row['image']);
            $livre->setStatut($row['statut']);
            $livre->setDescription($row['description']);

            $livres[] = $livre;
        }

        return $livres;
    }
}
