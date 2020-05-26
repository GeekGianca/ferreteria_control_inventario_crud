<?php
require_once 'ProductImplement.php';

class ProductModel
{
    private $product;

    public function __construct()
    {
        $this->product = new ProductImplement();
    }

    public function selectAll()
    {
        return $this->product->selectAll();
    }

    public function delete($data)
    {
        return $this->product->delete($data);
    }

    public function selectById($data)
    {
        return $this->product->selectById($data);
    }
}