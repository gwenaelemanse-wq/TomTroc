<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
                        <li><a href="index.php?action=messagerie">Messagerie</a></li>
                        <li><a href="index.php?action=mon-compte<?= isset($_SESSION['user_id']) ? '&id=' . (int)$_SESSION['user_id'] : '' ?>">Mon compte</a></li>
                        <li><a href="index.php?action=connexion">Connexion</a></li>
                    </ul>
                </nav>
            </div>

        </div>
    </header>
    <main class="inscription-page">
        <div class="inscription-container">
            <section class="inscription-section">

                <h2 class="inscription-title">Inscription</h2>

                <?php if (!empty($error)): ?>
                    <p class="inscription-error"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>

                <form class="inscription-form" action="index.php?action=inscription" method="post">
                    <div class="form-group">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" id="pseudo" name="pseudo" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="submit-container">
                        <button type="submit">S'inscrire</button>
                    </div>
                    <div class="register-link">
                        <p>Déjà inscrit ? <a href="index.php?page=connexion">Connectez-vous!</a></p>
                    </div>
                </form>
            </section>
            <div class="inscription-image">
                <img src="assets/images/Mask group.png" alt="Image d'inscription">
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