<?php require_once "src/views/templates/header.php" ?>

<main role="main" class="container central">
    <div class="col-sm-12 p-3">
        <h3>Cadastrar Nova Taxa</h3>
        <form method="post" action="?page=taxas&action=save">
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" class="form-control" name="descricao" id="descricao" required>
            </div>
            <div class="form-group">
                <label for="taxa">Valor:</label>
                <input type="number" class="form-control" name="taxa" id="taxa" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</main>

<?php require_once "src/views/templates/footer.php" ?>