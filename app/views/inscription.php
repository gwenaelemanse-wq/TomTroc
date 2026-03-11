<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/menu.js" defer></script>
</head>

<body>

    <main class="inscription-page">
        <div class="inscription-container">
            <section class="inscription-section">

                <h2 class="inscription-title">Inscription</h2>

                <?php if (!empty($error)): ?>
                    <p class="inscription-error"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>

                <form class="inscription-form" action="index.php?action=inscription" method="post">
                    <div class="form-group">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" id="pseudo" name="pseudo" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="submit-container">
                        <button type="submit">S'inscrire</button>
                    </div>
                    <div class="register-link">
                        <p>Déjà inscrit ? <a href="index.php?action=connexion">Connectez-vous!</a></p>
                    </div>
                </form>
            </section>
            <div class="inscription-image">
                <img src="assets/images/imageconnexion.png" alt="Image d'inscription">
            </div>

        </div>


    </main>

</body>

</html>