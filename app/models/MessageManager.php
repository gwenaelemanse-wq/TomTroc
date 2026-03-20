<?php

class MessageManager extends BaseManager
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DBManager::getInstance()->getPDO();
    }

    public function findConversationBetweenUsers(int $userId1, int $userId2): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM messagerie 
             WHERE (sender_id = :userId1 AND receiver_id = :userId2) 
                OR (sender_id = :userId2 AND receiver_id = :userId1) 
             ORDER BY created_at ASC'
        );
        $stmt->execute([
            ':userId1' => $userId1,
            ':userId2' => $userId2
        ]);

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $messages = [];

        foreach ($rows as $row) {
            $message = new MessageEntity();
            $message->setId($row['id']);
            $message->setMessage($row['message']);
            $message->setSenderId($row['sender_id']);
            $message->setReceiverId($row['receiver_id']);
            $message->setCreatedAt($row['created_at']);

            $messages[] = $message;
        }

        return $messages;
    }

    public function createMessage(int $senderId, int $receiverId, string $message): void
    {
        $sql = "INSERT INTO messagerie (message, sender_id, receiver_id, created_at)
            VALUES (:message, :sender_id, :receiver_id, NOW())";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'message' => $message,
            'sender_id' => $senderId,
            'receiver_id' => $receiverId
        ]);
    }

    public function findUserConversations(int $userId2): array
    {
        $sql = " SELECT message, created_at,
        CASE
            WHEN sender_id = :userId2 THEN receiver_id
            ELSE sender_id
        END AS other_user_id, u.pseudo, u.avatar
        FROM messagerie
        JOIN users u
        ON u.id_user = CASE
            WHEN sender_id = :userId2 THEN receiver_id
            ELSE sender_id
            END
        WHERE sender_id = :userId2 OR receiver_id = :userId2
        ORDER BY created_at DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':userId2' => $userId2
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
