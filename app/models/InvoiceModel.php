<?php
require_once 'InvoiceImplement.php';
class InvoiceModel
{
    private $invoice;

    public function __construct()
    {
        $this->invoice = new InvoiceImplement();
    }

    public function insert($data)
    {
        return $this->invoice->insert($data);
    }

    public function selectAllSales()
    {
        return $this->invoice->selectAllSales();
    }

    public function selectAllPurchases()
    {
        return $this->invoice->selectAllPurchases();
    }

    public function update($data)
    {
        return $this->invoice->update($data);
    }

    public function selectById($data)
    {
        return $this->invoice->selectById($data);
    }
}