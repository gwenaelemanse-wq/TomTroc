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
            $livre->setPseudo($row['pseudo'] ?? '');
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

    public function findLastAdded(): array  // ← Retourne un ARRAY, pas un seul livre!
    {
        $sql = "SELECT l.*, u.pseudo
        FROM livres l
        LEFT JOIN users u ON l.user_id = u.id_user
        ORDER BY l.id DESC LIMIT 4";

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
            $livre->setDateCreation($row['date_creation']);



            $livre->setUserId($row['user_id']);

            $livres[] = $livre;  // ← Ajoute chaque livre à l'array
        }

        return $livres;  // ← Retourne un array de LivreEntity
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

    public function updateStatut(int $livreId, string $statut): void
    {
        $sql = "UPDATE livres SET statut = :statut WHERE id = :livreId";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'statut' => $statut,
            'livreId' => $livreId
        ]);
    }

    public function getFirstDescriptionLine(int $livreId): ?string
    {
        $sql = "SELECT description FROM livres WHERE id = :livreId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['livreId' => $livreId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && isset($result['description'])) {
            $description = $result['description'];
            $lines = explode("\n", $description);
            return trim($lines[0]);
        }

        return null;
    }

    public function createLivre(LivreEntity $livre): void
    {
        $sql = "INSERT INTO livres (titre, auteur, image, description, statut, user_id) VALUES (:titre, :auteur, :image, :description, :statut, :user_id)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'titre' => $livre->getTitre(),
            'auteur' => $livre->getAuteur(),
            'image' => $livre->getImage(),
            'description' => $livre->getDescription(),
            'statut' => $livre->getStatut(),
            'user_id' => $livre->getUserId()
        ]);

        $livre->setId((int)$this->pdo->lastInsertId());

        $userManager = new UserManager();
        $userManager->refreshNbLivres($livre->getUserId());
    }

    public function updateLivre(LivreEntity $livre): void
    {
        $sql = "UPDATE livres
            SET titre = :titre,
                auteur = :auteur,
                image = :image,
                description = :description,
                statut = :statut
            WHERE id = :id
              AND user_id = :user_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'titre' => $livre->getTitre(),
            'auteur' => $livre->getAuteur(),
            'image' => $livre->getImage(),
            'description' => $livre->getDescription(),
            'statut' => $livre->getStatut(),
            'id' => $livre->getId(),
            'user_id' => $livre->getUserId(),
        ]);
    }

    public function deleteLivre(int $livreId, int $userId): void
    {
        $sql = "DELETE FROM livres
            WHERE id = :livreId
              AND user_id = :userId";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'livreId' => $livreId,
            'userId'  => $userId,
        ]);

        $userManager = new UserManager();
        $userManager->refreshNbLivres($userId);
    }



    public function search(string $term): array
    {
        $sql = "SELECT l.*, u.avatar, u.pseudo
            FROM livres l
            LEFT JOIN users u ON l.user_id = u.id_user
            WHERE l.titre LIKE :term
               OR l.auteur LIKE :term
            ORDER BY l.date_creation DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['term' => '%' . $term . '%']);

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $livres = [];
        foreach ($rows as $row) {
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

            $livres[] = $livre;
        }

        return $livres;
    }

    public function findOneByTitre(string $titre): ?LivreEntity
    {
        $sql = "SELECT l.*, u.avatar, u.pseudo
            FROM livres l
            LEFT JOIN users u ON l.user_id = u.id_user
            WHERE LOWER(TRIM(l.titre)) = LOWER(TRIM(:titre))
            LIMIT 1";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['titre' => $titre]);

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
