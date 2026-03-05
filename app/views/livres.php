<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos livres à l'échange</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/menu.js" defer></script>
</head>

<body>
    <header class="site-header">
        <div class="container header-content">

            <div class="header-left">
                <a class="logo" href="index.php?action=accueil">
                    <img src="assets/images/logo@2x.png" alt="Logo de TomTroc">
                </a>

                <!-- Menu principal (desktop à gauche) -->
                <nav class="nav-primary">
                    <ul>
                        <li><a href="index.php?action=accueil">Accueil</a></li>
                        <li>
                            <a href="index.php?action=livres">Nos livres à l’échange</a>
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
                        <li><a href="index.php?action=messagerie">Messagerie</a></li>
                        <li><a href="index.php?action=mon-compte">Mon compte</a></li>
                        <li><a href="index.php?action=connexion">Connexion</a></li>
                    </ul>
                </nav>
            </div>

        </div>
    </header>
    <main class="site-books">
        <section class="books">
            <div class="container books-content">
                <div class="main-top">
                    <h2 class="books-title">Nos livres à l’échange</h2>

                    <form class="search-form" action="#" method="get">
                        <div class="search-container">
                            <input type="text" name="search" placeholder="Rechercher..." />
                            <button type="submit">🔍</button>
                        </div>
                    </form>
                </div>

                <div class="books-grid">

                    <?php foreach ($livres as $livre): ?>
                        <article class="book-card">
                            <img
                                class="book-card-img"
                                src="<?= htmlspecialchars($livre->getImage()) ?>"
                                alt="<?= htmlspecialchars($livre->getTitre()) ?>">
                            <h3 class="book-title"><?= htmlspecialchars($livre->getTitre()) ?></h3>
                            <p class="book-author"><?= htmlspecialchars($livre->getAuteur()) ?></p>
                            <p class="book-description"><?= htmlspecialchars($livre->getDescription()) ?></p>

                            <a class="btn" href="index.php?action=details-livre&id=<?= (int) $livre->getId() ?>">
                                voir le détail
                            </a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
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
                <a class="logo.initiales" href="assets/images/Group10.png">
                    <img src="assets/images/Group10.png" alt="Initiales TomTroc">
                </a>
            </nav>
        </div>
    </footer>

</body>

</html>