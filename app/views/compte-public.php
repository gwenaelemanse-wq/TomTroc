<main class="compte-public-page">
    <div class="compte-public-container">
        <section class="compte-public-section">
            <div class="compte-public-grid">
                <div class="compte-public-profil">
                    <img src="<?= htmlspecialchars($user->getAvatar()) ?>" alt="Photo du profil public" class="compte-public-profil-photo">
                    <div class="photo-wrapper">
                        <img src="assets/images/Line5.png" alt="Ligne de séparation" class="compte-public-ligne">
                    </div>
                    <p class="compte-public-pseudo">Pseudo: <?= htmlspecialchars($user->getPseudo()) ?></p>
                    <p class="compte-public-timeMember">Membre depuis: <?= htmlspecialchars($user->getInscription()) ?></p>
                    <p class="compte-public-nbrLivres"><?= htmlspecialchars($user->getNbrLivres()) ?> livres</p>
                    <a href="messagerie.php" class="btn-contact-public">Ecrire un message</a>
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
                            <tr>
                                <td><img src="assets/images/livre1.jpg" alt="Livre 1" class="compte-public-livres-photo"></td>
                                <td>Livre 1</td>
                                <td>Auteur du livre 1</td>
                                <td>Description du livre 1</td>
                            </tr>
                            <tr>
                                <td><img src="assets/images/livre2.jpg" alt="Livre 2" class="compte-public-livres-photo"></td>
                                <td>Livre 2</td>
                                <td>Auteur du livre 2</td>
                                <td>Description du livre 2</td>
                            </tr>
                            <tr>
                                <td><img src="assets/images/livre3.jpg" alt="Livre 3" class="compte-public-livres-photo"></td>
                                <td>Livre 3</td>
                                <td>Auteur du livre 3</td>
                                <td>Description du livre 3</td>
                            </tr>
                            <tr>
                                <td><img src="assets/images/livre4.jpg" alt="Livre 4" class="compte-public-livres-photo"></td>
                                <td>Livre 4</td>
                                <td>Auteur du livre 4</td>
                                <td>Description du livre 4</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>


    </div>









</main>