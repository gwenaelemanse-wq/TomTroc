<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
    <script src="js/menu.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="site-header">
        <div class="container header-content">

            <div class="header-left">
                <a class="logo" href="accueil.php">
                    <img src="images/logo@2x.png" alt="Logo de TomTroc">
                </a>

                <!-- Menu principal (desktop à gauche) -->
                <nav class="nav-primary">
                    <ul>
                        <li><a href="accueil.php">Accueil</a></li>
                        <li><a href="livres.php">Nos livres à l’échange</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Burger (visible seulement en mobile via CSS) -->
            <button class="burger" aria-label="Ouvrir le menu" aria-expanded="false">
                ☰
            </button>

            <!-- Wrapper qui contient le menu de droite + (en mobile) on met aussi le menu de gauche dedans via CSS -->
            <div class="header-nav">
                <nav class="nav-secondary">
                    <ul>
                        <li><a href="messagerie.php">Messagerie</a></li>
                        <li><a href="monCompte.php">Mon compte</a></li>
                        <li><a href="connexion.php">Connexion</a></li>
                    </ul>
                </nav>
            </div>

        </div>
    </header>

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
                        <img src="images/alex.png" alt="Photo de Alexlecture">
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
                        <img src="images/nath.png" alt="Photo de Nathalire">
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
                        <img src="images/sas.png" alt="Photo de Sas634">
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
                    <img src="images/alex.png" alt="Photo de Alexlecture">
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

                <!-- Message envoyé (droite) -->
                <article class="message message-envoye">
                    <time class="message_heure" datetime="2024-08-21T15:44">21.08 15:44</time>
                    <p class="message_contenu">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    </p>
                </article>

                <!-- Message reçu (gauche) -->
                <article class="message message-recu">
                    <div class="avatar">
                        <img src="images/alex.png" alt="Photo de Alexlecture">
                    </div>
                    <div class="message_bloc">
                        <time class="message_heure" datetime="2024-08-21T15:48">21.08 15:48</time>
                        <p class="message_contenu">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        </p>
                    </div>
                </article>

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

    <footer class="site-footer">
        <div class="container footer-content">
            <nav class="footer-nav">
                <ul>
                    <li><a href="#">Politique de confidentialité</a></li>
                    <li><a href="#">Mentions légales</a></li>
                    <li><a href="#">Tom Troc©</a></li>
                </ul>
                <a class="logo-initiales" href="images/Group 10.png">
                    <img src="images/Group 10.png" alt="Initiales TomTroc">
                </a>
            </nav>
        </div>
    </footer>

</body>

</html>