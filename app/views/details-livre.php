<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/menu.js" defer></script>
</head>

<body>
    <header class="site-header">
        <div class="container header-content">

            <div class="header-left">
                <a class="logo" href="index.php?page=accueil">
                    <img src="assets/images/logo@2x.png" alt="Logo de TomTroc">
                </a>

                <!-- Menu principal (desktop à gauche) -->
                <nav class="nav-primary">
                    <ul>
                        <li><a href="index.php?page=accueil">Accueil</a></li>
                        <li>
                            <a href="index.php?page=livres">Nos livres à l’échange</a>
                        </li>
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
                        <li><a href="index.php?page=messagerie">Messagerie</a></li>
                        <li><a href="index.php?page=mon-compte">Mon compte</a></li>
                        <li><a href="index.php?page=connexion">Connexion</a></li>
                    </ul>
                </nav>
            </div>

        </div>
    </header>

    <main class="details-livre-page">


        <div class="details-livre-container">
            <p class="details-breadcrumb">
                Nos livres &gt; <?= htmlspecialchars($livre->getTitre()) ?>
            </p>

            <div class="details-livre-grid">

                <div class="details-livre-image">

                    <img
                        src="<?= htmlspecialchars($livre->getImage()) ?>"
                        alt="<?= htmlspecialchars($livre->getTitre()) ?>"
                        class="details-livre-image">

                </div>

                <section class="details-livre-section">
                    <div class="details-livre-info">
                        <div class="details-livre-info-inner">
                            <h1 class="details-livre-title"><?= htmlspecialchars($livre->getTitre()) ?></h1>

                            <p class="details-livre-author">Par <?= htmlspecialchars($livre->getAuteur()) ?></p>

                            <p class="details-livre-description"><?= nl2br(htmlspecialchars($livre->getDescription())) ?></p>

                            <div class="details-owner">
                                <h2>PROPRIÉTAIRE</h2>

                                <a href="index.php?page=compte-public&id=<?= (int)($livre->getUserId() ?? 0) ?>">
                                    <img
                                        src="<?= htmlspecialchars($livre->getAvatar() ?? 'assets/images/Group12.png') ?>"
                                        alt="Avatar du propriétaire"
                                        class="owner-avatar">
                                </a>
                            </div>

                            <a href="index.php?page=messagerie&conversation=<?= (int)($livre->getUserId() ?? 0) ?>" class="btn-contact">
                                Envoyer un message
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
    <footer class="site-footer">
        <div class="container footer-content">
            <nav class="footer-nav">
                <ul>
                    <li><a href="#">Politique de confidentialité</a></li>
                    <li><a href="#">Mentions légales</a></li>
                    <li><a href="#">Tom Troc©</a></li>
                </ul>
                <a class="logo-initiales" href="assets/images/Group10.png">
                    <img src="assets/images/Group10.png" alt="Initiales TomTroc">
                </a>
            </nav>
        </div>
    </footer>

</body>

</html>