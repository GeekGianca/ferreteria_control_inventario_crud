<?php

class Categories extends Controller
{
    public function __construct()
    {
        $this->model = $this->model('CategoriesModel');
    }

    public function index()
    {
        $categories = $this->model->selectAll();
        $data = [
            'title' => 'Categorias',
            'categories' => $categories
        ];
        $this->view('pages/categories', $data);
    }

    public function insert_category()
    {
        $data = [
            'idcategoria' => trim($_POST['c_categoria']),
            'nombre' => trim($_POST['n_categoria']),
            'cantidad_disponible' => '0'
        ];
        try {
            session_start();
            if ($this->model->insert($data)) {
                redirect('/categories');
            }
        } catch (Exception $e) {
            $_SESSION['error_category'] = attach_error($e->getCode(), $e->getMessage());
        }
        redirect('/categories');
    }

    public function edit_category()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $idcategory = $_GET['id_category'];
        $data = $this->model->selectById($idcategory);
        $_SESSION['category_edit'] = $data;
        redirect('/categories');
    }

    public function update_category()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $data = [
            'nombre' => trim($_POST['n_categoria']),
            'cantidad_disponible' => 0,
            'idcategoria' => trim($_POST['c_categoria'])
        ];
        $this->model->update($data);
        unset($_SESSION['category_edit']);
        redirect('/categories');
    }
}