<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TomTroc - Accueil</title>
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
    <main class="site-main">
        <section class="hero">
            <div class="container hero-content">



                <div class="hero-text">
                    <h1>Rejoignez nos <br />lecteurs passionnés </h1>

                    <p>Donnez une nouvelle vie à vos livres en les<br />
                        échangeant avec d'autres amoureux de la lecture.<br />
                        Nous croyons en la magie du partage de connaissances<br />
                        et d'histoires à travers les livres. </p>

                    <a href="#" class="btn-discover">Découvrir</a>


                </div>
                <div class="hero-photo">
                    <img src="images/photo de l'accueil.jpg" alt="Photo de l'accueil">
                </div>
            </div>
        </section>
        <section class="latest-books">
            <div class="container">
                <h2 class="section-title">Nos derniers livres à l’échange</h2>

                <div class="latest-grid">

                    <article class="book-card">
                        <img src="images/livre1.jpg" alt="Livre 1">
                        <h3 class="book-title">Livre 1</h3>
                        <p class="book-description">Description du livre 1</p>
                        <p class="book-author">Auteur du livre 1</p>
                    </article>

                    <article class="book-card">
                        <img src="images/livre2.jpg" alt="Livre 2">
                        <h3 class="book-title">Livre 2</h3>
                        <p class="book-description">Description du livre 2</p>
                        <p class="book-author">Auteur du livre 2</p>
                    </article>

                    <article class="book-card">
                        <img src="images/livre3.jpg" alt="Livre 3">
                        <h3 class="book-title">Livre 3</h3>
                        <p class="book-description">Description du livre 3</p>
                        <p class="book-author">Auteur du livre 3</p>
                    </article>

                    <article class="book-card">
                        <img src="images/livre4.jpg" alt="Livre 4">
                        <h3 class="book-title">Livre 4</h3>
                        <p class="book-description">Description du livre 4</p>
                        <p class="book-author">Auteur du livre 4</p>
                    </article>

                </div>
            </div>
            <a href="#" class="btn-view-all">Voir tous les livres</a>
        </section>
        <section class="fonction-description">
            <div class="container">
                <h2 class="section-title">Comment ça marche ?</h2>
                <p class="fonction-description-text">Échanger des livres avec TomTroc c’est simple et amusant ! Suivez ces étapes pour commencer :</p>

                <div class="description-grid">
                    <div class="description">
                        <div class="description-text">Inscrivez-vous gratuitement sur notre plateforme</div>

                    </div>
                    <div class="description">
                        <div class="description-text">Ajoutez les livres que vous souhaitez échanger à votre profil</div>

                    </div>
                    <div class="description">
                        <div class="description-text">Parcourez les livres disponibles chez d'autres membres</div>

                    </div>
                    <div class="description">
                        <div class="description-text">Proposez un échange et discutez avec d'autres passionnés de lecture</div>

                    </div>
                </div>
                <a href="#" class="btn-get-started">Commencer à échanger</a>
            </div>
        </section>
        <div class="photo">
            <img class="photo-banner" src="images/Photo accueil 2.jpg" alt="Photo de l'accueil 2">
        </div>

        <section class="valeurs">
            <div class="container">
                <div class="valeurs-content">
                    <h2 class="valeurs-title">Nos valeurs</h2>
                    <p class="valeurs-text">Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté.
                        Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs.
                        Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.</p>
                    <p class="valeurs-text">Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.</p>
                    <p class="valeurs-text">Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter,
                        de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.</p>

                    <p class="signature">L'équipe TomTroc</p>


                    <img class="vector-image" src="images/vector.svg" alt="Image vectorielle">
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
                <a class="logo.initiales" href="images/Group 10.png">
                    <img src="images/Group 10.png" alt="Initiales TomTroc">
                </a>
            </nav>
        </div>
    </footer>

</body>

</html>