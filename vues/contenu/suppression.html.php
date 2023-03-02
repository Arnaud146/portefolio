<h1>Confirmation de la suppression du contenu n°<?= $contenu->getId() ?> ?</h1>

<ul class="list-group">
    <li class="list-group-item">
        <strong>Titre : </strong> <?= $contenu->getTitre() ?>
    </li>
    <li class="list-group-item">
        <strong>Description : </strong> <?= $contenu->getDescription() ?>
    </li>
    <li class="list-group-item">
        <strong>Image : </strong> <?= $contenu->getImage() ?>
    </li>
</ul>

<form method="post">
    <div class="d-flex justify-content-between">
        <button class="btn btn-success">Confirmer</button>
        <a href="<?= lien("contenu", "liste") ?>" class="btn btn-danger">Annuler</a>
    </div>
</form>
