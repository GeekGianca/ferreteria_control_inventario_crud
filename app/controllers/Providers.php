<?php

class Providers extends Controller
{
    public function __construct()
    {
        $this->model = $this->model('ProviderModel');
    }

    public function index()
    {
        $providers = $this->model->selectAll();
        $data = [
            'title' => 'Proveedores',
            'providers' => $providers
        ];
        $this->view('pages/providers', $data);
    }

    public function insert_provider()
    {
        $data = [
            'idproveedor' => trim($_POST['c_proveedor']),
            'nombre' => trim($_POST['n_proveedor']),
            'ciudad' => trim($_POST['ci_proveedor']),
            'telefono' => trim($_POST['t_proveedor']),
            'nombre_contacto' => trim($_POST['nc_proveedor'])
        ];
        if ($this->model->insert($data)) {
            redirect('/providers');
        }
    }

    public function edit_provider()
    {
        if (session_status() == PHP_SESSION_NONE)
            session_start();

        $idProvider = $_GET['id_provider'];
        $provider = $this->model->selectById($idProvider);
        $_SESSION['provider_edit'] = $provider;
        redirect('/providers');
    }

    public function update_provider()
    {
        if(session_status() == PHP_SESSION_NONE)
            session_start();
        $data = [
            'idproveedor' => trim($_POST['c_proveedor']),
            'nombre' => trim($_POST['n_proveedor']),
            'ciudad' => trim($_POST['ci_proveedor']),
            'telefono' => trim($_POST['t_proveedor']),
            'nombre_contacto' => trim($_POST['nc_proveedor'])
        ];
        if ($this->model->update($data)){
            unset($_SESSION['provider_edit']);
            redirect('/providers');
        }

    }

}