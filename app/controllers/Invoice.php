<?php
class Invoice extends Controller{
    public function __construct()
    {
        $this->model = $this->model('InvoiceModel');
    }

    public function index()
    {
        $sales = $this->model->selectAllSales();
        $purchases = $this->model->selectAllPurchases();
        $data = [
            'title' => 'Facturas',
            'sales' => $sales,
            'purchases' => $purchases
        ];
        $this->view('pages/invoice', $data);
    }
}