<?php require_once "src/views/templates/header.php" ?>

<main role="main" class="container central">
    <div class="col-sm-12 p-3">
        <h3>Editar Produto</h3>
        <form method="post" action="?page=produtos&action=save&id=<?php echo $produto['id']; ?>">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $produto['nome']; ?>">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea class="form-control" id="descricao" name="descricao"><?php echo $produto['descricao']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="text" class="form-control" id="preco" name="preco" value="<?php echo $produto['preco']; ?>">
            </div>
            <div class="form-group">
                <label for="tipo_id">Tipo:</label>
                <select class="form-control" id="tipo_id" name="tipo_id">
                    <?php foreach ($tiposProdutos as $tipoProduto) : ?>
                        <?php if ($produto['tipo_id'] == $tipoProduto['id']) : ?>
                            <option value="<?php echo $tipoProduto['id']; ?>" selected>
                                <?php echo $tipoProduto['descricao']; ?>
                            </option>
                        <?php else : ?>
                            <option value="<?php echo $tipoProduto['id']; ?>">
                                <?php echo $tipoProduto['descricao']; ?>
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