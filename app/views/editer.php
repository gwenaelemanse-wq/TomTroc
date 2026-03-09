<form
    class="editer-form"
    action="index.php?action=editer<?= $mode === 'edit' ? '&id=' . (int)$livre->getId() : '' ?>"
    method="post"
    enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" id="titre" name="titre" value="<?= htmlspecialchars($formData['titre'] ?? '') ?>" required>
    </div>

    <div class="form-group">
        <label for="auteur">Auteur</label>
        <input type="text" id="auteur" name="auteur" value="<?= htmlspecialchars($formData['auteur'] ?? '') ?>" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" id="description" name="description" value="<?= htmlspecialchars($formData['description'] ?? '') ?>" required>
    </div>

    <div class="form-group">
        <label for="statut">Disponibilité</label>
        <select name="statut" id="statut">
            <option value="Disponible" <?= (($formData['statut'] ?? 'Disponible') === 'Disponible') ? 'selected' : '' ?>>Disponible</option>
            <option value="Indisponible" <?= (($formData['statut'] ?? 'Disponible') === 'Indisponible') ? 'selected' : '' ?>>Indisponible</option>
        </select>
    </div>

    <div class="form-group">
        <label for="image_url">Image via URL (optionnel)</label>
        <input type="text" id="image_url" name="image_url" value="">
        <small>Ex: https://... ou assets/images/....</small>
    </div>

    <div class="form-group">
        <label for="image_file">Ou importer une image (optionnel)</label>
        <input type="file" id="image_file" name="image_file" accept="image/*">
    </div>


    <button type="submit"><?= $mode === 'edit' ? 'Enregistrer' : 'Ajouter' ?></button>
</form>