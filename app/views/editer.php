<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
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
    <main class="editer-page">
        <a href="monCompte.php" alt="Retour" class="btn-retour"><img src="assets/images/Line6.png" alt="fleche" class="fleche-retour">retour</a>
        <h1>Modifier les informations</h1>
        <div class="editer-grid">
            <div class="editer-photo">
                <h2 class="editer-photo-titre">Photo</h2>
                <img src="assets/images/livre1.jpg" alt="Photo du livre edite" class="editer-photo-livre">
                <a href="#" alt="Modifier la photo" class="editer-photo-modifier">Modifier la photo</a>
            </div>
            <section class="editer-section">

                <form class="editer-form" action="#" method="post">
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" id="titre" name="titre" required>
                    </div>
                    <div class="form-group">
                        <label for="auteur">Auteur</label>
                        <input type="text" id="auteur" name="auteur" required>
                    </div>
                    <div class="form-group">
                        <label for="commentaire">Commentaire</label>
                        <input type="text" id="comment" name="comment" required>
                    </div>
                    <div class="form-group">
                        <label for="statut">Disponibilité:</label>
                        <select name="statut" id="statut">
                            <option value="disponible">Disponible</option>
                            <option value="indisponible">Indisponible</option>
                        </select>
                    </div>
                    <div class="submit-container">
                        <button type="submit">Valider</button>
                    </div>
                </form>
            </section>
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