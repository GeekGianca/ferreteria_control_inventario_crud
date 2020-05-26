<?php

class Products extends Controller
{
    public function __construct()
    {
        $this->model = $this->model('ProductModel');
    }

    public function index()
    {
        $products = $this->model->selectAll();
        $data = [
            'title' => 'Productos',
            'products' => $products
        ];
        $this->view('pages/products', $data);
    }

    public function delete_product()
    {
        $idproduct = $_GET['id_product'];
        $data = [
            'idproducto' => $idproduct
        ];
        $this->model->delete($data);
        redirect('/products');
    }
}