<?php require_once "src/views/templates/header.php" ?>

<main role="main" class="container central">
    <div class="col-sm-12 p-3">
        <h3>
            Taxas
            <a href="?page=taxas&action=create" class="btn btn-primary">Nova Taxa</a>
        </h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Taxa</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($taxas as $taxa) : ?>
                    <tr>
                        <td><?php echo $taxa['descricao']; ?></td>
                        <td><?php echo $taxa['taxa']; ?></td>
                        <td>
                            <a href="index.php?page=taxas&action=edit&id=<?php echo $taxa['id']; ?>" class="btn btn-info">
                                Editar
                            </a>
                            <a href="index.php?page=taxas&action=delete&id=<?php echo $taxa['id']; ?>" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir essa taxa?');">
                                Excluir
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<?php require_once "src/views/templates/footer.php" ?>