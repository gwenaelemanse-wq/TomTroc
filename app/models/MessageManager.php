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
}
