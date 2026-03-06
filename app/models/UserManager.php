<?php

class UserManager extends BaseManager
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DBManager::getInstance()->getPDO();
    }
    public function getAvatarByUserId(int $userId): ?string
    {
        $sql = "SELECT avatar FROM users WHERE id_user = :userId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['userId' => $userId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['avatar'] : null;
    }
    public function getPseudoByUserId(int $userId): ?string
    {
        $sql = "SELECT pseudo FROM users WHERE id_user = :userId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['userId' => $userId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['pseudo'] : null;
    }
    public function getNblivresByUserId(int $userId): int
    {
        $sql = "SELECT COUNT(*) AS nbrLivres FROM livres WHERE user_id = :userId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['userId' => $userId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? (int)$result['nbrLivres'] : 0;
    }
    public function getInscriptionByUserId(int $userId): ?string
    {
        $sql = "SELECT date_inscription FROM users WHERE id_user = :userId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['userId' => $userId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['date_creat_compte'] : null;
    }
    public function addUser(UserEntity $user): void
    {
        $sql = "INSERT INTO users (prenom, nom, pseudo, email, avatar, mot_de_passe, date_creat_compte) 
                VALUES (:prenom, :nom, :pseudo, :email, :avatar, :mot_de_passe, :date_creat_compte)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'prenom' => $user->getPrenom(),
            'nom' => $user->getNom(),
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail(),
            'avatar' => $user->getAvatar(),
            'mot_de_passe' => $user->getPassword(),
            'date_creat_compte' => $user->getInscription()
        ]);

        $user->setId((int)$this->pdo->lastInsertId());
    }

    public function findOne(int $id): ?UserEntity
    {
        $sql = "SELECT * FROM users WHERE id_user = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        $user = new UserEntity();
        $user->setId($row['id_user']);
        $user->setPrenom($row['prenom']);
        $user->setNom($row['nom']);
        $user->setPseudo($row['pseudo']);
        $user->setEmail($row['email']);
        $user->setAvatar($row['avatar']);
        $user->setInscription($row['date_creat_compte']);

        return $user;
    }

    public function findByEmail(string $email): ?UserEntity
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        $user = new UserEntity();
        $user->setId($row['id_user']);
        $user->setPrenom($row['prenom']);
        $user->setNom($row['nom']);
        $user->setPseudo($row['pseudo']);
        $user->setEmail($row['email']);
        $user->setAvatar($row['avatar'] ?? '');
        $user->setInscription($row['date_creat_compte']);
        $user->setPassword($row['mot_de_passe'] ?? '');

        return $user;
    }

    public function findByPseudo(string $pseudo): ?UserEntity
    {
        $sql = "SELECT * FROM users WHERE pseudo = :pseudo";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['pseudo' => $pseudo]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        $user = new UserEntity();
        $user->setId($row['id_user']);
        $user->setPrenom($row['prenom']);
        $user->setNom($row['nom']);
        $user->setPseudo($row['pseudo']);
        $user->setEmail($row['email']);
        $user->setAvatar($row['avatar']);
        $user->setInscription($row['date_creat_compte']);

        return $user;
    }
}
