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
    <main class="compte-public-page">
        <div class="compte-public-container">
            <section class="compte-public-section">
                <div class="compte-public-grid">
                    <div class="compte-public-profil">
                        <img src="assets/images/Mask group.png" alt="Photo du profil public" class="compte-public-profil-photo">
                        <div class="photo-wrapper">
                            <img src="assets/images/Line5.png" alt="Ligne de séparation" class="compte-public-ligne">
                        </div>
                        <p class="compte-public-pseudo">Pseudo: Utilisateur123</p>
                        <p class="compte-public-timeMember">Membre depuis: </p>
                        <p class="compte-public-nbrLivres">6 livres</p>
                        <a href="messagerie.php" class="btn-contact-public">Ecrire un message</a>
                    </div>
                    <div class="compte-public-livres">
                        <table>
                            <thead>
                                <tr>
                                    <th>PHOTO</th>
                                    <th>TITRE</th>
                                    <th>AUTEUR</th>
                                    <th>DESCRIPTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="assets/images/livre1.jpg" alt="Livre 1" class="compte-public-livres-photo"></td>
                                    <td>Livre 1</td>
                                    <td>Auteur du livre 1</td>
                                    <td>Description du livre 1</td>
                                </tr>
                                <tr>
                                    <td><img src="assets/images/livre2.jpg" alt="Livre 2" class="compte-public-livres-photo"></td>
                                    <td>Livre 2</td>
                                    <td>Auteur du livre 2</td>
                                    <td>Description du livre 2</td>
                                </tr>
                                <tr>
                                    <td><img src="assets/images/livre3.jpg" alt="Livre 3" class="compte-public-livres-photo"></td>
                                    <td>Livre 3</td>
                                    <td>Auteur du livre 3</td>
                                    <td>Description du livre 3</td>
                                </tr>
                                <tr>
                                    <td><img src="assets/images/livre4.jpg" alt="Livre 4" class="compte-public-livres-photo"></td>
                                    <td>Livre 4</td>
                                    <td>Auteur du livre 4</td>
                                    <td>Description du livre 4</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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
                    <img src="assets/images/Group 10.png" alt="Initiales TomTroc">
                </a>
            </nav>
        </div>
    </footer>

</body>

</html>