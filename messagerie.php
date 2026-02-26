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