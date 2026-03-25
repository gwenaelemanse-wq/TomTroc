<div class="container">
    <div class="messagerie">

        <?php if (!isset($_SESSION['user_id'])) : ?>
            <p>Veuillez vous connecter pour accéder à votre messagerie.</p>


        <?php else : ?>
            <aside class="messagerie_sidebar">
                <h1 class="messagerie_titre">Messagerie</h1>

                <ul class="messagerie_liste" id="conversations-list">
                    <?php foreach ($conversations as $conv) : ?>
                        <a href="index.php?action=messagerie&id=<?= $conv['other_user_id'] ?>">
                            <li class=" conversation <?= ((int) $conv['other_user_id'] === (int) $otherUserId) ? 'conversation-active' : '' ?>"
                                data-conversation-id="<?= $conv['other_user_id'] ?>"
                                data-nom="<?= htmlspecialchars($conv['pseudo']) ?>"
                                data-initiales="<?= substr(htmlspecialchars($conv['pseudo']), 0, 2) ?>">

                                <div class="avatar">
                                    <img src="<?= htmlspecialchars($conv['avatar']) ?>" alt="Photo de <?= htmlspecialchars($conv['pseudo']) ?>">
                                </div>

                                <div class="conversation_infos">
                                    <span class="conversation_nom"><?= htmlspecialchars($conv['pseudo']) ?></span>
                                    <span class="conversation_heure">
                                        <?= htmlspecialchars(Utils::formatMessageDate($conv['created_at'])) ?>
                                    </span>
                                    <p class="conversation_apercu"><?= htmlspecialchars($conv['message']) ?></p>
                                </div>

                            </li>

                        </a>
                    <?php endforeach; ?>
                </ul>
            </aside>

            <!-- ==========================================
      ZONE CHAT
      En PHP : data-conversation-id injecté par le contrôleur
    ========================================== -->
            <div class="messagerie_chat" id="chat-zone">

                <!-- Header : interlocuteur actif -->
                <div class="chat_header">
                    <?php if ($otherUser !== null) : ?>
                        <div class="avatar">
                            <img
                                src="<?= htmlspecialchars($otherUser->getAvatar()) ?>"
                                alt="Avatar de <?= htmlspecialchars($otherUser->getPseudo()) ?>">
                        </div>

                        <span class="chat_nom" id="chat-nom">
                            <?= htmlspecialchars($otherUser->getPseudo()) ?>
                        </span>
                    <?php else : ?>
                        <span class="chat_nom" id="chat-nom">
                            Sélectionnez une conversation
                        </span>
                    <?php endif; ?>
                </div>
                <!--
        //** */
        Zone messages
        En PHP : foreach ($messages as $msg)
        Classe message-envoye si $msg->getAuteurId() === $_SESSION['user_id']
        Classe message-recu sinon
        -->

                <div class="chat_messages" id="messages-container">

                    <?php if (!empty($messages)) : ?>
                        <?php $userId1 = $_SESSION['user_id']; ?>

                        <?php foreach ($messages as $message) : ?>
                            <?php if ((int)$message->getSenderId() === (int)$userId1) : ?>
                                <article class="message-envoye">
                                    <small class="message_heure">
                                        <?= htmlspecialchars(Utils::formatMessageDate($message->getCreatedAt())) ?>
                                    </small>
                                    <div class="message_contenu"><?= htmlspecialchars($message->getMessage()) ?></div>

                                </article>

                            <?php else : ?>
                                <article class="message-recu">
                                    <div class="avatar">
                                        <img
                                            src="<?= htmlspecialchars($otherUser->getAvatar()) ?>">

                                        <small class="message_heure">
                                            <?= htmlspecialchars(Utils::formatMessageDate($message->getCreatedAt())) ?></small>
                                    </div>


                                    <div class="message_contenu"><?= htmlspecialchars($message->getMessage()) ?></div>

                                </article>

                            <?php endif; ?>

                        <?php endforeach; ?>

                    <?php else : ?>
                        <p>Aucun message</p>

                    <?php endif; ?>

                </div>

                <!--
        Formulaire d'envoi
        En PHP : action="/message/envoyer" → MessageController::envoyer()
        En AJAX : submit intercepté par JS (voir messagerie.js)
      -->
                <form
                    class="chat_formulaire"
                    id="form-message"
                    method="POST" action="index.php?action=message-envoyer">
                    <!-- En PHP : valeur injectée selon la conversation active -->
                    <input type="hidden" name="receiver_id" value="<?= (int) $otherUserId ?>">
                    <input type="hidden" name="livre_id" value="<?= (int)($_GET['livre_id'] ?? 0) ?>">

                    <input
                        class="chat_input"
                        type="text"
                        name="message"
                        id="input-message"
                        placeholder="Tapez votre message ici"
                        autocomplete="off"
                        required>
                    <button class="chat_bouton-envoyer" type="submit">Envoyer</button>
                </form>

            </div>
        <?php endif; ?>
    </div>
</div>
