<?php

require_once 'src/models/Produto.php';
require_once 'src/models/TipoProduto.php';

class ProdutosController
{

    public function index()
    {
        $produto = new Produto();
        $produtos = $produto->findAll();
        require_once 'src/views/produtos/index.php';
    }

    public function create()
    {
        $tiposProdutos = $this->getTiposProdutos();
        require_once 'src/views/produtos/create.php';
    }

    /**
     * @param int|null $id
     */
    public function save(?int $id = null)
    {
        $produto = new Produto($id);
        $produto->fill($_POST);
        $produto->save();
        header('Location: index.php?page=produtos');
    }

    /**
     * @param int $id
     */
    public function edit(int $id)
    {
        $produto = new Produto($id);
        $produto = (array)$produto;
        $tiposProdutos = $this->getTiposProdutos();
        require_once 'src/views/produtos/edit.php';
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        $produto = new Produto($id);
        $produto->delete();
        header("Location: index.php?page=produtos");
    }

    /**
     * @param array|null $codigosProdutos
     */
    public function getTiposProdutos(?array $codigosProdutos = [])
    {
        $tipoProduto = new TipoProduto();
        if (is_array($codigosProdutos) && count($codigosProdutos) > 0) {
            $codigosProdutos = implode(',', $codigosProdutos);
            $tipoProduto = $tipoProduto->pdo->prepare("SELECT * FROM $tipoProduto->table WHERE id in ($codigosProdutos)");
            $tipoProduto->execute();
            $rows = $tipoProduto->fetchAll();
        } else {
            $tipoProduto = new TipoProduto();
            $rows = $tipoProduto->findAll();
        }
        return $rows;
    }
}
