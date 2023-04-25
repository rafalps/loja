<?php require_once "src/views/templates/header.php" ?>

<main role="main" class="container central">
    <div class="col-sm-12 p-3">
        <h3>
            Produtos
            <a href="?page=produtos&action=create" class="btn btn-primary">Novo Produto</a>
        </h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto) : ?>
                    <tr>
                        <td><?php echo $produto['nome']; ?></td>
                        <td><?php echo $produto['descricao']; ?></td>
                        <td><?php echo $produto['preco']; ?></td>
                        <td>
                            <a href="index.php?page=produtos&action=edit&id=<?php echo $produto['id']; ?>" class="btn btn-info">
                                Editar
                            </a>
                            <a href="index.php?page=produtos&action=delete&id=<?php echo $produto['id']; ?>" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir este produto?');">
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