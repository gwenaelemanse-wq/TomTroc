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


        $messages = [];
        $otherUserId = $userId2;
        $otherUser = null;
        $conversations = [];

        if (isset($_SESSION['user_id'])) {
            $userId1 = (int) $_SESSION['user_id'];
            $conversations = $this->manager->findUserConversations($userId1);

            if ($userId2 > 0) {
                $messages = $this->manager->findConversationBetweenUsers($userId1, $userId2);

                $userManager = new UserManager();
                $otherUser = $userManager->findOne($userId2);
            }

            $viewFile = __DIR__ . '/../views/messagerie.php';
            require __DIR__ . '/../views/layout.php';
        };
    }

    public function send(): void
    {

        $senderId = (int) $_SESSION['user_id'];
        $receiverId = (int) $_POST['receiver_id'];
        $message = trim($_POST['message']);

        if (!empty($message)) {
            $this->manager->createMessage($senderId, $receiverId, $message);
        }

        header("Location: index.php?action=messagerie&id=" . $receiverId);
        exit;
    }
}
