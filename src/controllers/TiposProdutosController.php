<?php

require_once 'src/models/Taxa.php';
require_once 'src/models/TipoProduto.php';

class TiposProdutosController
{

    public function index()
    {
        $tipoProduto = new TipoProduto();
        $tiposProdutos = $tipoProduto->findAll();
        require_once 'src/views/tiposProdutos/index.php';
    }

    public function create()
    {
        $taxa = new Taxa();
        $taxas = $taxa->findAll();
        require_once 'src/views/tiposProdutos/create.php';
    }

    /**
     * @param int|null $id
     */
    public function save(?int $id = null)
    {
        $tipoProduto = new TipoProduto($id);
        $tipoProduto->fill($_POST);
        $tipoProduto->save();
        header('Location: index.php?page=tiposProdutos');
    }

    /**
     * @param int $id
     */
    public function edit(int $id)
    {
        $tipoProduto = new TipoProduto($id);
        $tipoProduto = (array)$tipoProduto;
        $taxa = new Taxa();
        $taxas = $taxa->findAll();
        require_once 'src/views/tiposProdutos/edit.php';
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        $produto = new TipoProduto($id);
        $produto->delete();
        header("Location: index.php?page=tiposProdutos");
    }
}
