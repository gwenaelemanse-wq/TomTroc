<?php

class LivreManager
{
    public function __construct(private PDO $pdo) {}

    public function findAll(): array
    {
        $sql = "
            SELECT
                l.id,
                l.titre,
                l.auteur,
                l.image,
                l.description,
                l.statut,
                l.date_creation,
                l.user_id,
                u.pseudo
            FROM livres l
            JOIN users u ON u.id_user = l.user_id
            ORDER BY l.date_creation DESC
        ";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function findOne(int $id): ?array
    {
        $sql = "
            SELECT
                l.id,
                l.titre,
                l.auteur,
                l.image,
                l.description,
                l.statut,
                l.date_creation,
                l.user_id,
                u.pseudo
            FROM livres l
            JOIN users u ON u.id_user = l.user_id
            WHERE l.id = :id
            LIMIT 1
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);

        $livre = $stmt->fetch();
        return $livre ?: null;
    }
}
