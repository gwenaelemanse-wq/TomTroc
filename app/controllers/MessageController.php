<?php

class MessageController
{
    private MessageManager $manager;

    public function __construct()
    {
        $this->manager = new MessageManager();
    }

    public function show(int $userId2): void
    {
        $userId1 = (int) $_SESSION['user_id'];
        $messages = $this->manager->findConversationBetweenUsers($userId1, $userId2);

        $viewFile = __DIR__ . '/../views/messagerie.php';
        require __DIR__ . '/../views/layout.php';
    }
}
