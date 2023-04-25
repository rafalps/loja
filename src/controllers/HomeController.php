<?php

class HomeController
{

    public function index()
    {
        require_once 'src/views/home/index.php';
    }

    public function dashboard()
    {
        require_once 'src/models/Produto.php';
        require_once 'src/models/Taxa.php';
        require_once 'src/models/Venda.php';
        require_once 'src/models/TipoProduto.php';
        $totalProdutos = (new Produto())->contador();
        $totalTaxas = (new Taxa())->contador();
        $totalVendas = (new Venda())->contador();
        $totalTiposProdutos = (new TipoProduto())->contador();
        require_once 'src/views/home/dashboard.php';
    }
}
