<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/menu.js"></script>
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

    <main class="details-livre-page">


        <div class="details-livre-container">
            <p class="details-breadcrumb">Nos livres &gt; The Kinfolk Table</p>

            <div class="details-livre-grid">

                <div class="details-livre-image">

                    <img src="images/livre1.jpg" alt="Image du livre" class="details-livre-hero-image">
                </div>

                <section class="details-livre-section">
                    <div class="details-livre-info">
                        <div class="details-livre-info-inner">
                            <h1 class="details-livre-title">The Kinfolk Table</h1>
                            <p class="details-livre-author">par Nathan Williams</p>

                            <div class="photo-wrapper">
                                <img src="images/Line 3.png" alt="Ligne de séparation" class="details-livre-ligne">
                            </div>

                            <div class="details-livre-description">
                                <h2>DESCRIPTION</h2>
                                <p>J'ai récemment plongé dans les pages de 'The Kinfolk Table' et j'ai été enchanté par cette œuvre captivante.
                                    Ce livre va bien au-delà d'une simple collection de recettes ; il célèbre l'art de partager des moments authentiques autour de la table.</p>
                                <p>Les photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes
                                    et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité.</p>
                                <p>Chaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers.</p>
                                <p>'The Kinfolk Table' incarne parfaitement l'esprit de la cuisine et de la camaraderie, et il est certain
                                    que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.</p>

                            </div>

                            <div class="details-owner">
                                <h2>PROPRIÉTAIRE</h2>
                                <img src="images/Group 12.png" alt="Avatar de Marie Dubois" class="owner-avatar">
                            </div>

                            <a href="messagerie.php" class="btn-contact">Envoyer un message</a>
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
                <a class="logo-initiales" href="images/Group 10.png">
                    <img src="images/Group 10.png" alt="Initiales TomTroc">
                </a>
            </nav>
        </div>
    </footer>

</body>

</html>