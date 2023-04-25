<?php

require_once 'src/models/Taxa.php';

class TaxasController
{

    public function index()
    {
        $taxa = new Taxa();
        $taxas = $taxa->findAll();
        require_once 'src/views/taxas/index.php';
    }

    public function create()
    {
        require_once 'src/views/taxas/create.php';
    }

    /**
     * @param int|null $id
     */
    public function save(?int $id = null)
    {
        $taxa = new Taxa($id);
        $taxa->fill($_POST);
        $taxa->save();
        header('Location: index.php?page=taxas');
    }

    /**
     * @param int $id
     */
    public function edit(int $id)
    {
        $taxa = new Taxa($id);
        $taxa = (array)$taxa;
        require_once 'src/views/taxas/edit.php';
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        $taxa = new Taxa($id);
        $taxa->delete();
        header("Location: index.php?page=taxas");
    }
}
