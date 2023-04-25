<?php require_once "src/views/templates/header.php" ?>

<main role="main" class="container central">
    <div class="col-sm-12 p-3">
        <h3>
            Tipos Produtos
            <a href="?page=tiposProdutos&action=create" class="btn btn-primary">Novo Tipo Produto</a>
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
                <?php foreach ($tiposProdutos as $tipoProduto) : ?>
                    <tr>
                        <td>
                            <?php echo $tipoProduto['descricao']; ?>
                        </td>
                        <td>
                            <a href="index.php?page=taxas&action=edit&id=<?php echo $tipoProduto['taxa_id']; ?>">
                                <?php
                                require_once "src/models/Taxa.php";
                                $taxa = new Taxa($tipoProduto['taxa_id']);
                                echo $taxa->descricao . "($taxa->descricao)";
                                ?>
                            </a>
                        </td>
                        <td>
                            <a href="index.php?page=tiposProdutos&action=edit&id=<?php echo $tipoProduto['id']; ?>" class="btn btn-info">
                                Editar
                            </a>
                            <a href="index.php?page=tiposProdutos&action=delete&id=<?php echo $tipoProduto['id']; ?>" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir este tipo de produto?');">
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