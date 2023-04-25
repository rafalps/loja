<?php require_once "src/views/templates/header.php" ?>

<main role="main" class="container central">
    <div class="col-sm-12 p-3">
        <h3>Editar Tipo Produto</h3>
        <form method="post" action="?page=tiposProdutos&action=save&id=<?php echo $tipoProduto['id']; ?>">
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo $tipoProduto['descricao']; ?>" required>
            </div>
            <div class="form-group">
                <label for="taxa_id">Tipo:</label>
                <select class="form-control" id="taxa_id" name="taxa_id" required>
                    <?php foreach ($taxas as $taxa) : ?>
                        <?php if ($tipoProduto['taxa_id'] == $taxa['id']) : ?>
                            <option value="<?php echo $taxa['id']; ?>" selected>
                                <?php echo $taxa['descricao'] . "(" . $taxa['taxa'] . ")"; ?>
                            </option>
                        <?php else : ?>
                            <option value="<?php echo $taxa['id']; ?>">
                                <?php echo $taxa['descricao'] . "(" . $taxa['taxa'] . ")"; ?>
                            </option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</main>

<?php require_once "src/views/templates/footer.php" ?>