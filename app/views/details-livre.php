<div class="container">
    <div class="details-livre-page">


        <div class="details-livre-container">
            <div class="details-breadcrumb">
                <a href="index.php?action=livres">Nos livres</a> &gt; <?= htmlspecialchars($livre->getTitre()) ?>
            </div>

            <div class="details-livre-grid">

                <div class="details-livre-image">

                    <img
                        src="<?= htmlspecialchars($livre->getImage()) ?>"
                        alt="<?= htmlspecialchars($livre->getTitre()) ?>"
                        class="details-livre-image">

                </div>

                <div class="details-livre-section">
                    <div class="details-livre-info">
                        <div class="details-livre-info-inner">
                            <h1 class="details-livre-title"><?= htmlspecialchars($livre->getTitre()) ?></h1>

                            <p class="details-livre-author">Par <?= htmlspecialchars($livre->getAuteur()) ?></p>

                            <div class="details-livre-separator">
                                <img src="assets/images/Line3.png" alt="Ligne de séparation" class="mon-compte-ligne">
                            </div>

                            <p>DESCRIPTION</p>
                            <p class="details-livre-description"><?= htmlspecialchars($livre->getDescription()) ?></p>

                            <div class="details-owner">
                                <h2>PROPRIÉTAIRE</h2>

                                <div class="owner-info">
                                    <a href="index.php?action=compte-public&id=<?= (int)($livre->getUserId() ?? 0) ?>">
                                        <img
                                            src="<?= htmlspecialchars($livre->getAvatar() ?? 'assets/images/Group12.png') ?>"
                                            alt="Avatar du propriétaire"
                                            class="owner-avatar">
                                        <p class="owner-pseudo"><?= htmlspecialchars($livre->getPseudo() ?? 'Utilisateur inconnu') ?></p>
                                    </a>
                                </div>
                            </div>

                            <a href="index.php?action=messagerie&id=<?= (int)($livre->getUserId() ?? 0) ?>" class="btn-contact">
                                Envoyer un message
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
