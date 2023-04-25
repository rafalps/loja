<?php require_once "src/views/templates/header.php" ?>

<main role="main" class="container central">
    <div class="col-sm-12 p-3">
        <h3>Cadastrar Novo Produto</h3>
        <form method="post" action="?page=produtos&action=save">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea class="form-control" name="descricao" id="descricao"></textarea>
            </div>
            <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="number" class="form-control" name="preco" id="preco" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="tipo_id">Tipo:</label>
                <select name="tipo_id" class="form-control">
                    <?php foreach ($tiposProdutos as $tipoProduto) : ?>
                        <option value="<?php echo $tipoProduto['id']; ?>">
                            <?php echo $tipoProduto['descricao']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</main>

<?php require_once "src/views/templates/footer.php" ?>