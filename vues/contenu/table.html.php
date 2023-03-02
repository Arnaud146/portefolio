<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($contenus as $contenu): ?>
        <tr>
            <td>
                <?= $contenu->getId() ?>
            </td>
            <td>
                <?= $contenu->getTitre() ?>
            </td>
            <td>
                <?= $contenu->getDescription() ?>
            </td>
            <td>
                <?= $contenu->getImage() ?>
            </td>
            <td>
                <a href="<?= lien("contenu", "modifier", $contenu->getId()) ?>">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="<?= lien("contenu", "supprimer", $contenu->getId()) ?>">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>
