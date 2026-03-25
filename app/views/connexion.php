<div class="connexion-page">
    <div class="connexion-container">
        <section class="connexion-section">

            <h2 class="connexion-title">Connexion</h2>

            <?php if (!empty($error)) : ?>
                <p class="connexion-error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>

            <form class="connexion-form" action="index.php?action=connexion" method="post">

                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="submit-container">
                    <button type="submit">Se connecter</button>
                </div>
                <div class="register-link">
                    <p>Pas de compte ? <a href="index.php?action=inscription">Inscrivez-vous!</a></p>
                </div>
            </form>

        </section>
        <div class="connexion-image">
            <img src="assets/images/imageconnexion.png" alt="Image de connexion">
        </div>

    </div>


</div>
