<h1>Confirmation de la suppression du livre n°<?= $livre->getId() ?> ?</h1>

<ul class="list-group">
    <li class="list-group-item">
        <strong>Titre : </strong> <?= $livre->getTitre() ?>
    </li>
    <li class="list-group-item">
        <strong>Auteur : </strong> <?= $livre->getAuteur() ?>
    </li>
    <li class="list-group-item">
        <strong>Résumé : </strong> <?= $livre->getResume() ?>
    </li>
    <li class="list-group-item">
        <strong>Couverture : </strong> <?= $livre->getCouverture() ?>
    </li>
</ul>

<form method="post">
    <div class="d-flex justify-content-between">
        <button class="btn btn-success">Confirmer</button>
        <a href="<?= lien("livre", "liste") ?>" class="btn btn-danger">Annuler</a>
    </div>
</form>
