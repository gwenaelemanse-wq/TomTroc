<section class="hero">
    <div class="container hero-content">



        <div class="hero-text">
            <h1>Rejoignez nos <br />lecteurs passionnés </h1>

            <p>Donnez une nouvelle vie à vos livres en les<br />
                échangeant avec d'autres amoureux de la lecture.<br />
                Nous croyons en la magie du partage de connaissances<br />
                et d'histoires à travers les livres. </p>

            <a href="index.php?action=livres" class="btn-discover">Découvrir</a>


        </div>
        <div class="hero-photo">
            <img src="assets/images/photo de l'accueil.jpg" alt="Photo de l'accueil">
        </div>
    </div>
</section>

<section class="latest-books">
    <div class="container">
        <h2 class="section-title">Nos derniers livres à l'échange</h2>

        <div class="latest-grid">
            <?php foreach ($livres as $livre): ?>
                <article class="book-card">
                    <img
                        class="book-card-img"
                        src="<?= htmlspecialchars($livre->getImage()) ?>"
                        alt="<?= htmlspecialchars($livre->getTitre()) ?>">
                    <h3 class="book-title"><?= htmlspecialchars($livre->getTitre()) ?></h3>
                    <p class="book-author"><?= htmlspecialchars($livre->getAuteur()) ?></p>
                    <p class="book-pseudo">Vendu par: <?= htmlspecialchars($livre->getPseudo()) ?></p>

                    <a class="btn" href="index.php?action=details-livre&id=<?= (int)$livre->getId() ?>">
                        Voir le détail
                    </a>
                </article>
            <?php endforeach; ?>
        </div>

        <a href="index.php?action=livres" class="btn-view-all">Voir tous les livres</a>


    </div>
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
        <a href="index.php?action=livres" class="btn-get-started">Commencer à échanger</a>
    </div>
</section>
<div class="photo">
    <img class="photo-banner" src="assets/images/Photo accueil 2.jpg" alt="Photo de l'accueil 2">
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


            <img class="vector-image" src="assets/images/vector.svg" alt="Image vectorielle">
        </div>
    </div>
</section>