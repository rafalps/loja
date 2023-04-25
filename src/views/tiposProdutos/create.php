<?php require_once "src/views/templates/header.php" ?>

<main role="main" class="container central">
    <div class="col-sm-12 p-3">
        <h3>Cadastrar Novo Tipo de Produto</h3>
        <form method="post" action="?page=tiposProdutos&action=save">
            <div class="form-group">
                <label for="descricao">Descriçã:</label>
                <input type="text" class="form-control" name="descricao" id="descricao" required>
            </div>
            <div class="form-group">
                <label for="taxa_id">Taxa:</label>
                <select name="taxa_id" class="form-control" required>
                    <?php foreach ($taxas as $taxa) : ?>
                        <option value="<?php echo $taxa['id']; ?>">
                            <?php echo $taxa['descricao'] . "(" . $taxa['taxa'] . ")"; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</main>

<?php require_once "src/views/templates/footer.php" ?>