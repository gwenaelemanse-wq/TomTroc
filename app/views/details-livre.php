<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/menu.js" defer></script>
</head>

<body>


    <main class="details-livre-page">


        <div class="details-livre-container">
            <p class="details-breadcrumb">
                Nos livres &gt; <?= htmlspecialchars($livre->getTitre()) ?>
            </p>

            <div class="details-livre-grid">

                <div class="details-livre-image">

                    <img
                        src="<?= htmlspecialchars($livre->getImage()) ?>"
                        alt="<?= htmlspecialchars($livre->getTitre()) ?>"
                        class="details-livre-image">

                </div>

                <section class="details-livre-section">
                    <div class="details-livre-info">
                        <div class="details-livre-info-inner">
                            <h1 class="details-livre-title"><?= htmlspecialchars($livre->getTitre()) ?></h1>

                            <p class="details-livre-author">Par <?= htmlspecialchars($livre->getAuteur()) ?></p>

                            <p class="details-livre-description"><?= htmlspecialchars($livre->getDescription()) ?></p>

                            <div class="details-owner">
                                <h2>PROPRIÉTAIRE</h2>

                                <a href="index.php?page=compte-public&id=<?= (int)($livre->getUserId() ?? 0) ?>">
                                    <img
                                        src="<?= htmlspecialchars($livre->getAvatar() ?? 'assets/images/Group12.png') ?>"
                                        alt="Avatar du propriétaire"
                                        class="owner-avatar">
                                </a>
                            </div>

                            <a href="index.php?page=messagerie&conversation=<?= (int)($livre->getUserId() ?? 0) ?>" class="btn-contact">
                                Envoyer un message
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>


</body>

</html>