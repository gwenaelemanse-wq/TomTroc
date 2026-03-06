<body>

    <main class="mon-compte-page">
        <div class="mon-compte-page">
            <div class="mon-compte-container">
                <section class="mon-compte-section">

                    <h2 class="mon-compte">Mon Compte</h2>
                    <div class="mon-compte-grid">

                        <?php foreach ($users as $user) : ?>
                            <div class="mon-compte-profil">
                                <img src="<?= htmlspecialchars($user->getAvatar()) ?>" alt="Photo de profil" class="mon-compte-photo">
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

                        <div class=" mon-compte-livres">


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
                                            <td><img src="<?= htmlspecialchars($livre->getImage()) ?>" alt="<?= htmlspecialchars($livre->getTitre()) ?>" class="mon-compte-livre-photo"></td>
                                            <td><?= htmlspecialchars($livre->getTitre()) ?></td>
                                            <td><?= htmlspecialchars($livre->getAuteur()) ?></td>
                                            <td><?= htmlspecialchars($livre->getDescription()) ?></td>
                                            <td><span class="status <?= $livre->getStatut() === 'Disponible' ? 'status--ok' : 'status--ko' ?>"><?= htmlspecialchars($livre->getStatut()) ?></span></td>
                                            <td> <a href="editer.php" class="action-edit">Éditer</a> <a href="#" class="action-delete">Supprimer</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

</body>

</html>