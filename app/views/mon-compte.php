<main class="mon-compte-page">
    <div class="mon-compte-page">
        <div class="mon-compte-container">
            <section class="mon-compte-section">

                <h2 class="mon-compte">Mon Compte</h2>





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

                    <div class="mon-compte-grid">

                        <div class="mon-compte-profil">
                            <form id="avatarForm" action="index.php?action=update-avatar" method="post" enctype="multipart/form-data">
                                <img
                                    id="avatarPreview"
                                    src="<?= htmlspecialchars(!empty($user->getAvatar()) ? $user->getAvatar() : 'assets/images/placeholder.jpg') ?>"
                                    alt="Photo de profil"
                                    class="mon-compte-avatar">

                                <div class="modifier-avatar">
                                    <!-- Input file caché (le label déclenche le clic) -->
                                    <input
                                        type="file"
                                        id="avatar_file"
                                        name="avatar_file"
                                        accept="image/*"
                                        class="avatar-file-input">

                                    <!-- Lien maquette -->
                                    <label for="avatar_file" class="avatar-modifier-link">Modifier</label>
                                </div>
                            </form>
                            <script>
                                document.addEventListener('DOMContentLoaded', () => {
                                    const form = document.getElementById('avatarForm');
                                    const input = form?.querySelector('input[type="file"][name="avatar_file"]');
                                    console.log('file input found?', !!input);
                                    if (!form || !input) return;

                                    input.addEventListener('change', () => {
                                        console.log('file changed', input.files);
                                        if (input.files && input.files.length > 0) form.submit();
                                    });
                                });
                            </script>

                            <div class="photo-wrapper">
                                <img src="assets/images/Line5.png" alt="Ligne de séparation" class="mon-compte-ligne">
                            </div>
                            <p class="mon-compte-pseudo"><?= htmlspecialchars($user->getPseudo()) ?></p>
                            <p class="mon-compte-timeMember">Membre depuis: <?= htmlspecialchars($user->getInscription()) ?></p>
                            <p class="mon-compte-nbrLivres"><?= htmlspecialchars($user->getNbrLivres()) ?> livres</p>
                        </div>
                        <!-- ton bloc avatar + pseudo + membre depuis -->


                        <div class="mon-compte-info">

                            <h1 class="mon-compte-info-title">Vos informations personnelles</h1>
                            <form class="mon-compte-info-form" action="index.php?action=update-profile" method="post">
                                <div class="form-group">
                                    <label for="email">Adresse email</label>
                                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($user->getEmail()) ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="mot_de_passe">Mot de passe</label>
                                    <input
                                        type="password"
                                        id="mot_de_passe"
                                        name="mot_de_passe"
                                        placeholder="********"
                                        autocomplete="new-password">
                                    <small class="hint">Laisser vide pour ne pas changer.</small>
                                </div>

                                <div class="form-group">
                                    <label for="pseudo">Pseudo</label>
                                    <input type="text" id="pseudo" name="pseudo" value="<?= htmlspecialchars($user->getPseudo()) ?>" required>
                                </div>

                                <div class="update-profile-wrapper">
                                    <button class="update-profile" type="submit">Enregistrer</button>
                                </div>
                            </form>

                            <!-- ton formulaire infos -->
                        </div>

                        <div class="mon-compte-livres">
                            <div class="addLivre-link">
                                <a href="index.php?action=editer">Ajouter / éditer un livre</a>
                            </div>

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
                                                <td class="livre-description"><?= htmlspecialchars($livre->getDescription()) ?></td>
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
                            <!-- ton tableau -->
                        </div>
            </section>
        </div>
    </div>

<?php endif; ?>

<a href="index.php?action=deconnexion" class="btn-logout">Se déconnecter</a>






</main>