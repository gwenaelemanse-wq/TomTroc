<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'TomTroc' ?></title>
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
                <nav class="nav-primary">
                    <ul>
                        <li><a href="index.php?action=accueil">Accueil</a></li>
                        <li><a href="index.php?action=livres">Nos livres à l'échange</a></li>
                    </ul>
                </nav>
            </div>
            <div class="header-nav">
                <nav class="nav-secondary">
                    <ul>
                        <li>
                            <a href="index.php?action=messagerie">
                                <img src="assets/images/IconMessagerie.png" alt="Messagerie">
                                Messagerie
                                <span class="nav-badge" id="messagerie-badge" hidden>0</span>
                            </a>
                        </li>
                        <li><a href="index.php?action=mon-compte<?= isset($_SESSION['user_id']) ? '&id=' . (int)$_SESSION['user_id'] : '' ?>"><img src="assets/images/IconMonCompte.png" alt="Mon compte">Mon compte</a></li>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <li><a href="index.php?action=deconnexion">Déconnexion</a></li>
                        <?php else: ?>
                            <li><a href="index.php?action=connexion">Connexion</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>


        <?php require $viewFile; ?> <!-- ← La vue s'insère ici -->
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