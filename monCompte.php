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

    <main class="mon-compte-page">
        <div class="mon-compte-container">
            <section class="mon-compte-section">

                <h2 class="mon-compte">Mon Compte</h2>
                <div class="mon-compte-grid">
                    <div class="mon-compte-profil">
                        <img src="images/photo.png" alt="Photo de profil" class="mon-compte-photo">
                        <div class="photo-wrapper">
                            <img src="images/Line 5.png" alt="Ligne de séparation" class="mon-compte-ligne">
                        </div>
                        <p class="mon-compte-pseudo">Pseudo: Utilisateur123</p>
                        <p class="mon-compte-timeMember">Membre depuis: </p>
                        <p class="mon-compte-nbrLivres">6 livres</p>
                    </div>
                    <div class="mon-compte-info">
                        <h1 class="mon-compte-info">Vos informations personnelles</h1>
                        <div class="form-wrapper">
                            <p class="mon-compte-email">Adresse email</p>
                            <input type="email" id="email" name="email" required>
                            <p class="mon-compte-password">Mot de passe</p>
                            <input type="password" id="password" name="password" required>
                            <p class="mon-compte-pseudo">Pseudo</p>
                            <input type="text" id="pseudo" name="pseudo" required>
                            <p class="mon-compte-btn">
                                <button type="submit">Enregister</button>
                            </p>
                        </div>
                    </div>
                    <div class="mon-compte-livres">
                        <table>
                            <thead>
                                <tr>
                                    <th>PHOTO</th>
                                    <th>TITRE</th>
                                    <th>AUTEUR</th>
                                    <th>DESCRIPTION</th>
                                    <th>DISPONIBILITÉ</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="images/livre1.jpg" alt="Livre 1" class="mon-compte-livre-photo"></td>
                                    <td>Livre 1</td>
                                    <td>Auteur du livre 1</td>
                                    <td>Description du livre 1</td>
                                    <td><span class="status status--ok">Disponible</span></td>
                                    <td> <a href="#" class="action-edit">Éditer</a> <a href="#" class="action-delete">Supprimer</a></td>
                                </tr>
                                <tr>
                                    <td><img src="images/livre2.jpg" alt="Livre 2" class="mon-compte-livre-photo"></td>
                                    <td>Livre 2</td>
                                    <td>Auteur du livre 2</td>
                                    <td>Description du livre 2</td>
                                    <td><span class="status status--ok">Disponible</span></td>
                                    <td> <a href="#" class="action-edit">Éditer</a> <a href="#" class="action-delete">Supprimer</a></td>
                                </tr>
                                <tr>
                                    <td><img src="images/livre3.jpg" alt="Livre 3" class="mon-compte-livre-photo"></td>
                                    <td>Livre 3</td>
                                    <td>Auteur du livre 3</td>
                                    <td>Description du livre 3</td>
                                    <td><span class="status status--ko">Indisponible</span></td>
                                    <td> <a href="#" class="action-edit">Éditer</a> <a href="#" class="action-delete">Supprimer</a></td>
                                </tr>
                                <tr>
                                    <td><img src="images/livre4.jpg" alt="Livre 4" class="mon-compte-livre-photo"></td>
                                    <td>Livre 4</td>
                                    <td>Auteur du livre 4</td>
                                    <td>Description du livre 4</td>
                                    <td><span class="status status--ok">Disponible</span></td>
                                    <td> <a href="#" class="action-edit">Éditer</a> <a href="#" class="action-delete">Supprimer</a></td>
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
                <a class="logo-initiales" href="images/Group 10.png">
                    <img src="images/Group 10.png" alt="Initiales TomTroc">
                </a>
            </nav>
        </div>
    </footer>

</body>

</html>