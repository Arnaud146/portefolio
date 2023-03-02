<?php if(isset($erreurs)) : ?>
    <?php foreach($erreurs as $champ => $message): ?>
        <div class="alert alert-danger"><?= $champ ?> : <?= $message ?></div>
    <?php endforeach ?>
<?php endif ?>

<h1>Ajouter un livre</h1>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" class="form-control" required
                value="<?= !empty($livre) ? $livre->getTitre() : "" ?>">
    </div>
    <div class="form-group">
        <label for="auteur">Auteur</label>
        <input type="text" name="auteur" id="auteur" class="form-control" required
                value="<?= $livre->getAuteur() ?? "" ?>">
    </div>
    <div class="form-group">
        <label for="couverture">Couverture</label>
        <input type="file" name="couverture" id="couverture" class="form-control">
    </div>
    <div class="form-group">
        <label for="resume">Résumé</label>
        <textarea name="resume" id="resume"  class="form-control"><?= $livre->getResume() ?? "" ?></textarea>
    </div>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <button type="reset" class="btn btn-secondary">Effacer</button>
    </div>
</form>
