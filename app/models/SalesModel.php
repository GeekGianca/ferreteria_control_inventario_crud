<?php
require_once 'SalesImplement.php';
class SalesModel {
    private $sales;
    public function __construct()
    {
        $this->sales = new SalesImplement();
    }

    public function insert($data){
        return $this->sales->insert($data);
    }

    public function selectAll(){
        return $this->sales->select();
    }

    public function update($data){
        return $this->sales->update($data);
    }

    public function selectById($data){
        return $this->sales->selectById($data);
    }
}