<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos livres à l'échange</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/menu.js" defer></script>
</head>

<body>

    <main class="site-books">
        <section class="books">
            <div class="container books-content">
                <div class="main-top">
                    <h2 class="books-title">Nos livres à l’échange</h2>

                    <form class="search-form" action="index.php" method="get">
                        <input type="hidden" name="action" value="search">

                        <div class="search-container">
                            <input type="text" name="search" placeholder="Rechercher un livre" />
                            <button type="submit">
                                <img src="assets/images/Union.png" alt="Rechercher">
                            </button>
                        </div>
                    </form>
                </div>

                <div class="books-grid">

                    <?php if (!empty($_GET['search']) && !empty($noResults)): ?>
                        <p class="search-empty">
                            Aucun livre ne correspond à “<?= htmlspecialchars($_GET['search']) ?>”.
                        </p>
                    <?php endif; ?>

                    <?php foreach ($livres as $livre): ?>
                        <article class="book-card">
                            <a href="index.php?action=details-livre&id=<?= (int) $livre->getId() ?>">
                                <img
                                    class="book-card-img"
                                    src="<?= htmlspecialchars($livre->getImage()) ?>"
                                    alt="<?= htmlspecialchars($livre->getTitre()) ?>">
                            </a>
                            <h3 class="book-title"><?= htmlspecialchars($livre->getTitre()) ?></h3>
                            <p class="book-author"><?= htmlspecialchars($livre->getAuteur()) ?></p>
                            <p class="book-pseudo">Vendu par : <?= htmlspecialchars($livre->getPseudo()) ?></p>


                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>



</body>

</html>