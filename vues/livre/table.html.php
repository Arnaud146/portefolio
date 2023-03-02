<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Couverture</th>
            <th>Résumé</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($livres as $livre): ?>
        <tr>
            <!-- Table Row -->
            <td>
                <?= $livre->getId() ?>
            </td>
            <td>
                <?= $livre->getTitre() ?>
            </td>
            <td>
                <?= $livre->getAuteur() ?>
            </td>
            <td>
                <?= $livre->getCouverture() ?>
            </td>
            <td>
                <?= $livre->getResume() ?>
            </td>

            <td>
                <a href="<?= lien("livre", "modifier", $livre->getId()) ?>">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="<?= lien("livre", "supprimer", $livre->getid()) ?>">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>
