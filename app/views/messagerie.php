<!-- ============================================
    MAIN MESSAGERIE
    En PHP : template rendu par MessageController::index()
    ============================================ -->
<main class="messagerie">

    <!-- ==========================================
      SIDEBAR – liste des conversations
      En PHP : foreach ($conversations as $conv)
    ========================================== -->
    <aside class="messagerie_sidebar">
        <h1 class="messagerie_titre">Messagerie</h1>

        <ul class="messagerie_liste" id="conversations-list">

            <!--
          data-conversation-id → $conv->getId()
          data-nom             → $conv->getInterlocuteur()->getPseudo()
          data-initiales       → initiales du pseudo
          class --active       → si $conv->getId() === $conversationActive->getId()
        -->
            <li class="conversation conversation-active"
                data-conversation-id="1"
                data-nom="Alexlecture"
                data-initiales="AL">

                <div class="avatar">
                    <img src="assets/images/alex.png" alt="Photo de Alexlecture">
                </div>

                <div class="conversation_infos">
                    <div class="conversation_top">
                        <span class="conversation_nom">Alexlecture</span>
                        <span class="conversation_heure">15:43</span>
                    </div>

                    <p class="conversation_apercu">
                        Lorem ipsum dolor sit amet,...
                    </p>
                </div>

            </li>

            <li class="conversation"
                data-conversation-id="2"
                data-nom="Nathalire"
                data-initiales="NA">
                <div class="avatar">
                    <img src="assets/images/nath.png" alt="Photo de Nathalire">
                </div>
                <div class="conversation_infos">
                    <span class="conversation_nom">Nathalire</span>
                    <span class="conversation_heure">20:08</span>
                    <p class="conversation_apercu">Lorem ipsum dolor sit amet,...</p>
                </div>
            </li>

            <li class="conversation"
                data-conversation-id="3"
                data-nom="Sas634"
                data-initiales="SA">
                <div class="avatar">
                    <img src="assets/images/sas.png" alt="Photo de Sas634">
                </div>
                <div class="conversation_infos">
                    <span class="conversation_nom">Sas634</span>
                    <span class="conversation_heure">15:08</span>
                    <p class="conversation_apercu">Lorem ipsum dolor sit amet,...</p>
                </div>
            </li>

        </ul>
    </aside>

    <!-- ==========================================
      ZONE CHAT
      En PHP : data-conversation-id injecté par le contrôleur
    ========================================== -->
    <section class="messagerie_chat" id="chat-zone">

        <!-- Header : interlocuteur actif -->
        <header class="chat_header" id="chat-header">
            <div class="avatar">
                <img src="assets/images/alex.png" alt="Photo de Alexlecture">
            </div>
            <span class="chat_nom" id="chat-nom">Alexlecture</span>
        </header>

        <!--
        Zone messages
        En PHP : foreach ($messages as $msg)
        Classe message--envoye si $msg->getAuteurId() === $_SESSION['user_id']
        Classe message--recu sinon
      -->
        <div class="chat_messages" id="messages-container">

            <?php if (!empty($messages)) : ?>

                <?php $userId1 = $_SESSION['user_id']; ?>

                <?php foreach ($messages as $message) : ?>

                    <?php if ((int)$message->getSenderId() === (int)$userId1) : ?>

                        <article class="message message-envoye">
                            <p><?= htmlspecialchars($message->getMessage()) ?></p>
                            <small><?= $message->getCreatedAt() ?></small>
                        </article>

                    <?php else : ?>

                        <article class="message message-recu">
                            <p><?= htmlspecialchars($message->getMessage()) ?></p>
                            <small><?= $message->getCreatedAt() ?></small>
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
            action="/message/envoyer"
            method="POST">
            <!-- En PHP : valeur injectée selon la conversation active -->
            <input type="hidden" name="conversation_id" id="input-conversation-id" value="1">

            <input
                class="chat_input"
                type="text"
                name="contenu"
                id="input-message"
                placeholder="Tapez votre message ici"
                autocomplete="off"
                required>
            <button class="chat_bouton-envoyer" type="submit">Envoyer</button>
        </form>

    </section>

</main>