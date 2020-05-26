<?php

class Pages extends Controller
{
    public function __construct()
    {
        $this->model = $this->model('ClientModel');
    }

    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $providers = $this->model->selectAllProviders();
        $categories = $this->model->selectAllCategories();
        $data = [
            'title' => 'Registro de facturación',
            'providers' => $providers,
            'categories' => $categories
        ];
        $this->view('pages/index', $data);
    }

    public function add_to_invoice()
    {
        try {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
                echo "Start session\n";
            }
            if (!isset($_SESSION['invoice'])) {
                $data = [
                    'idfactura' => $_POST['no_fact'],
                    'noventa' => uniqid(),
                    'cantidad_productos' => 0,
                    'total_venta' => 0
                ];
                $_SESSION['invoice'] = $data;
                echo "Attach invoice\n";
            }
            if (!isset($_SESSION['products'])) {
                $_SESSION['products'] = array();
                $_SESSION['total'] = 0;
                echo "Create array\n";
            }
            $date = date('Y-m-d H:M:S');
            $data_product = [
                'idproducto' => $_POST['p_codigo'],
                'nombre' => $_POST['p_nombre'],
                'precio_venta' => $_POST['p_venta'],
                'precio_compra' => $_POST['p_compra'],
                'fecha_registro' => $date,
                'disponibilidad' => $_POST['c_comprada'],
                'categoria_idcategoria' => $_POST['p_categoria']
            ];
            $_SESSION['total'] = $_SESSION['total'] + floatval($_POST['p_compra']);
            array_push($_SESSION['products'], $data_product);
            redirect('/index');
        } catch (Exception $e) {
            echo $e->getMessage();
            $_SESSION['alert'] = false;
        }
    }

    public function insert_invoice()
    {
        try{
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $invoice = $_SESSION['invoice'];
            $products = $_SESSION['products'];
            if($this->model->insertInvoice($invoice)){
                foreach ($products as $prod){
                    if(!$this->model->insertProduct($prod)){
                        $_SESSION['alert'] = 'Error al registrar el producto '.$prod['nombre'];
                    }
                }
            }else{
                $_SESSION['alert'] = 'No se pudo registrar la factura.';
            }
            $_SESSION['success'] = 'Se realizo el registro correctamente.';
            unset($_SESSION['products']);
            unset($_SESSION['invoice']);
            unset($_SESSION['total']);
        }catch (Exception $e){
            if(strpos($e->getMessage(), 'Integrity constraint violation')){
                $_SESSION['alert'] = 'Existe un registro duplicado en los productos, porfavor editelo.';
            }
        }
        redirect('/');
    }

    public function change_product()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $date = date('Y-m-d');
        $data_product = [
            'idproducto' => $_POST['p_codigo'],
            'nombre' => $_POST['p_nombre'],
            'precio_venta' => $_POST['p_venta'],
            'precio_compra' => $_POST['p_compra'],
            'fecha_registro' => $date,
            'disponibilidad' => $_POST['c_comprada'],
            'categoria_idcategoria' => $_POST['p_categoria']
        ];
        $products = $_SESSION['products'];
        $key = $_SESSION['key_product'];
        unset($products[$key]);
        array_push($products, $data_product);
        $_SESSION['products'] = $products;
        unset($_SESSION['key_product']);
        unset($_SESSION['edit_product']);
        redirect('/');
    }

    public function edit_product()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $id_product = $_GET['id_product'];
        $products = $_SESSION['products'];
        $key_ = null;
        $edit = null;
        foreach ($products as $key => $value) {
            if ($id_product == $value['idproducto']) {
                $key_ = $key;
                $edit = $value;
            }
        }
        $_SESSION['key_product'] = $key_;
        $_SESSION['edit_product'] = $edit;
        redirect('/');
    }

    public function cancel_invoice()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        unset($_SESSION['products']);
        unset($_SESSION['invoice']);
        unset($_SESSION['total']);
        unset($_SESSION['alert']);
        unset($_SESSION['success']);
        redirect('/');
    }

    public function remove_product()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $id_product = $_GET['id_product'];
        $products = $_SESSION['products'];
        $key_ = null;
        foreach ($products as $key => $value) {
            if ($id_product == $value['idproducto']) {
                $key_ = $key;
            }
        }
        if (count($products) == 1) {
            unset($products[$key_]);
        } else {
            array_splice($products, $key_, $key_);
        }
        $_SESSION['products'] = $products;
        redirect('/');
    }
}