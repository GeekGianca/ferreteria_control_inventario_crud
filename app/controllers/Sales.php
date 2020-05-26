<?php

class Sales extends Controller
{
    public function __construct()
    {
        $this->model = $this->model('SalesModel');
    }

    public function index()
    {
        $this->view('pages/sales');
    }

    public function search_product()
    {
        if (session_status() == PHP_SESSION_NONE)
            session_start();
        $id_product = $_POST['b_producto'];
        $product = $this->model->selectById($id_product);
        $_SESSION['product'] = $product;
        redirect('/sales');
    }

    public function add_to_invoice()
    {
        if (session_status() == PHP_SESSION_NONE)
            session_start();
        if (!isset($_SESSION['products'])) {
            $_SESSION['products'] = array();
        }
        $data = [
            'idproducto' => $_POST['n_producto'],
            'nombre' => $_SESSION['product']->nombre,
            'precio' => $_POST['p_producto'],
            'disponibilidad' => $_POST['c_disponible'],
            'cantidad' => $_POST['c_comprar']
        ];
        array_push($_SESSION['products'], $data);
        unset($_SESSION['product']);
        redirect('/sales');
    }
}