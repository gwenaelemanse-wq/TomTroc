<main class="editer-page">
    <div class="editer-container">
        <a href="index.php?action=mon-compte&id=<?= (int)($_SESSION['user_id'] ?? 0) ?>" class="editer-back">&larr; retour</a>

        <h1 class="editer-title">Modifier les informations</h1>

        <section class="editer-card">
            <div class="editer-grid">

                <form
                    class="editer-form"
                    action="index.php?action=editer<?= $mode === 'edit' ? '&id=' . (int)$livre->getId() : '' ?>"
                    method="post"
                    enctype="multipart/form-data">
                    <!-- Colonne gauche -->
                    <div class="editer-left">
                        <p class="editer-label-top">Photo</p>

                        <?php
                        $img = $formData['image'] ?? '';
                        $imgSrc = !empty($img) ? htmlspecialchars($img) : 'assets/images/placeholder.jpg';
                        ?>

                        <div class="editer-photo-wrapper">
                            <img src="<?= $imgSrc ?>" id="previewImage" class="editer-photo-livre" alt="Photo du livre">
                        </div>

                        <div class="editer-photo-actions">
                            <!-- clique => ouvre le file picker -->
                            <label for="image_file" class="editer-photo-modifier">Modifier la photo</label>
                            <input type="file" id="image_file" name="image_file" accept="image/*" class="image-input-hidden">

                        </div>
                    </div>

                    <!-- Colonne droite -->
                    <div class="editer-right">



                        <div class="editer-form-group">
                            <label for="titre">Titre</label>
                            <input type="text" id="titre" name="titre" value="<?= htmlspecialchars($formData['titre'] ?? '') ?>" required>
                        </div>

                        <div class="editer-form-group">
                            <label for="auteur">Auteur</label>
                            <input type="text" id="auteur" name="auteur" value="<?= htmlspecialchars($formData['auteur'] ?? '') ?>" required>
                        </div>

                        <div class="editer-form-group">
                            <label for="description">Commentaire</label>
                            <textarea id="description" name="description" rows="10" required><?= htmlspecialchars($formData['description'] ?? '') ?></textarea>
                        </div>

                        <div class="editer-form-group">
                            <label for="statut">Disponibilité</label>
                            <select name="statut" id="statut">
                                <option value="Disponible" <?= (($formData['statut'] ?? 'Disponible') === 'Disponible') ? 'selected' : '' ?>>disponible</option>
                                <option value="Indisponible" <?= (($formData['statut'] ?? 'Disponible') === 'Indisponible') ? 'selected' : '' ?>>indisponible</option>
                            </select>
                        </div>

                        <!-- Optionnel: on garde pour compat controller, mais on le masque -->
                        <div class="editer-form-group editer-image-url">
                            <label for="image_url">Image via URL (optionnel)</label>
                            <input type="text" id="image_url" name="image_url" value="">
                        </div>

                        <button class="editer-submit" type="submit">Valider</button>

                    </div>
                </form>
            </div>
        </section>
    </div>
</main>
<script>
    const imageInput = document.getElementById('image_file');
    const previewImage = document.getElementById('previewImage');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    });
</script>