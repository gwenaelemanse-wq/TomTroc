<div class="container">
    <div class="compte-public-page">

        <div class="compte-public-section">
            <div class="compte-public-grid">
                <div class="compte-public-profil">
                    <img src="<?= htmlspecialchars($user->getAvatar()) ?>" alt="Photo du profil public" class="compte-public-profil-photo">
                    <div class="photo-wrapper">
                        <img src="assets/images/Line5.png" alt="Ligne de séparation" class="compte-public-ligne">
                    </div>
                    <p class="compte-public-pseudo"><?= htmlspecialchars($user->getPseudo()) ?></p>
                    <p class="compte-public-timeMember"><?= htmlspecialchars(Utils::membreDepuis($user->getInscription())) ?></p>
                    <p class="mon-compte-nbrLivres"><img src="assets/images/Vector@2x.png" alt="Livres"> <?= htmlspecialchars($user->getNbrLivres()) ?> livres</p>
                    <a href="index.php?action=messagerie&id=<?= htmlspecialchars($user->getId()) ?>" class="btn-contact-public">Ecrire un message</a>
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
                            <?php foreach ($livres as $livre) : ?>
                                <tr>
                                    <td>
                                        <?php $img = $livre->getImage(); ?>

                                        <?php if (!empty($img)) : ?>
                                            <img src="<?= htmlspecialchars($img) ?>"
                                                alt="<?= htmlspecialchars($livre->getTitre()) ?>"
                                                class="compte-public-livres-photo">
                                        <?php else : ?>
                                            <img src="assets/images/placeholder.jpg"
                                                alt="Pas d'image"
                                                class="compte-public-livres-photo">
                                        <?php endif; ?>
                                    </td>
                                    <td><?= htmlspecialchars($livre->getTitre()) ?></td>
                                    <td><?= htmlspecialchars($livre->getAuteur()) ?></td>
                                    <td class="compte-public-livres-description"><?= htmlspecialchars($livre->getDescription()) ?></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
