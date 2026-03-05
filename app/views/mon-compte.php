<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/menu.js" defer></script>
</head>

<body>

    <main class="mon-compte-page">
        <div class="mon-compte-container">
            <section class="mon-compte-section">

                <h2 class="mon-compte">Mon Compte</h2>
                <div class="mon-compte-grid">
                    <div class="mon-compte-profil">
                        <img src="assets/images/photo.png" alt="Photo de profil" class="mon-compte-photo">
                        <div class="photo-wrapper">
                            <img src="assets/images/Line5.png" alt="Ligne de séparation" class="mon-compte-ligne">
                        </div>
                        <p class="mon-compte-pseudo"><?php htmlspecialchars($user->getPseudo()); ?></p>
                        <p class="mon-compte-timeMember">Membre depuis: <?php htmlspecialchars($user->getInscription()); ?></p>
                        <p class="mon-compte-nbrLivres"><?php htmlspecialchars($user->getNbrLivres()); ?> livres</p>
                    </div>
                    <div class="mon-compte-info">
                        <h1 class="mon-compte-info">Vos informations personnelles</h1>
                        <div class="form-wrapper">
                            <p class="mon-compte-email">Adresse email</p>
                            <input type="email" id="email" name="email" required>
                            <p class="mon-compte-password">Mot de passe</p>
                            <input type="password" id="password" name="password" required>
                            <p class="mon-compte-pseudo">Pseudo</p>
                            <input type="text" id="pseudo" name="pseudo" required>
                            <p class="mon-compte-btn">
                                <button type="submit">Enregister</button>
                            </p>
                        </div>
                    </div>
                    <div class="mon-compte-livres">

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
                        <table class="mon-compte-livres-table">
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
    </main>

</body>

</html>