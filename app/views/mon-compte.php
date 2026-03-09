<main class="mon-compte-page">
    <div class="mon-compte-page">
        <div class="mon-compte-container">
            <section class="mon-compte-section">

                <h2 class="mon-compte">Mon Compte</h2>

                <div class="mon-compte-grid">

                    <?php if (!$isLoggedIn): ?>

                        <div class="mon-compte-livres">
                            <p>Vous devez être connecté pour accéder à votre compte.</p>
                            <a href="index.php?action=connexion">Connectez-vous</a>
                        </div>

                    <?php elseif (!$isOwner): ?>

                        <div class="mon-compte-livres">
                            <p>Accès refusé : ce compte ne vous appartient pas.</p>
                            <a href="index.php?action=mon-compte&id=<?= (int) $_SESSION['user_id'] ?>">Aller sur mon compte</a>
                        </div>

                    <?php else: ?>

                        <?php foreach ($users as $user) : ?>
                            <div class="mon-compte-profil">
                                <form action="index.php?action=update-avatar" method="post" enctype="multipart/form-data">
                                    <div>
                                        <label for="avatar_url">Avatar via URL (optionnel)</label>
                                        <input type="text" id="avatar_url" name="avatar_url" placeholder="https://... ou assets/images/...">
                                    </div>

                                    <div>
                                        <label for="avatar_file">Ou importer une image (optionnel)</label>
                                        <input type="file" id="avatar_file" name="avatar_file" accept="image/*">
                                    </div>

                                    <button type="submit">Modifier l’avatar</button>
                                </form>

                                <div class="photo-wrapper">
                                    <img src="assets/images/Line5.png" alt="Ligne de séparation" class="mon-compte-ligne">
                                </div>
                                <p class="mon-compte-pseudo"><?= htmlspecialchars($user->getPseudo()) ?></p>
                                <p class="mon-compte-timeMember">Membre depuis: <?= htmlspecialchars($user->getInscription()) ?></p>
                                <p class="mon-compte-nbrLivres"><?= htmlspecialchars($user->getNbrLivres()) ?> livres</p>
                            </div>

                            <div class="mon-compte-info">
                                <h1 class="mon-compte-profil-titre">Vos informations personnelles</h1>
                                <p class="mon-compte-email">Email : <?= htmlspecialchars($user->getEmail()) ?></p>
                                <p class="mon-compte-password">Mot de passe : ********</p>
                                <p class="mon-compte-pseudo">Pseudo : <?= htmlspecialchars($user->getPseudo()) ?></p>
                                <button class="mon-compte-edit">Enregister</button>
                            </div>
                        <?php endforeach; ?>

                        <div class="mon-compte-livres">

                            <?php if (empty($livres)): ?>
                                <p>
                                    Votre bibliothèque est vide. Ajoutez votre premier livre pour commencer à échanger !
                                    <a href="index.php?action=editer">Ajouter / éditer un livre</a>
                                </p>
                            <?php else: ?>
                                <table class="mon-compte-livres-table">
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
                                        <?php foreach ($livres as $livre) : ?>
                                            <tr>
                                                <td>
                                                    <?php $img = $livre->getImage(); ?>

                                                    <?php if (!empty($img)): ?>
                                                        <img src="<?= htmlspecialchars($img) ?>"
                                                            alt="<?= htmlspecialchars($livre->getTitre()) ?>"
                                                            class="mon-compte-livre-photo">
                                                    <?php else: ?>
                                                        <img src="assets/images/placeholder.jpg"
                                                            alt="Pas d'image"
                                                            class="mon-compte-livre-photo">
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= htmlspecialchars($livre->getTitre()) ?></td>
                                                <td><?= htmlspecialchars($livre->getAuteur()) ?></td>
                                                <td><?= htmlspecialchars($livre->getDescription()) ?></td>
                                                <td>
                                                    <span class="status <?= $livre->getStatut() === 'Disponible' ? 'status--ok' : 'status--ko' ?>">
                                                        <?= htmlspecialchars($livre->getStatut()) ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="index.php?action=editer&id=<?= (int) $livre->getId() ?>" class="action-edit">Éditer</a>
                                                    <a href="index.php?action=supprimer&id=<?= (int) $livre->getId() ?>" onclick="return confirm('Supprimer ce livre ?');" class="action-delete">Supprimer</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>

                        </div>
                        <a href="index.php?action=deconnexion" class="btn-logout">Se déconnecter</a>

                    <?php endif; ?>

                </div>
            </section>
        </div>
    </div>
</main>