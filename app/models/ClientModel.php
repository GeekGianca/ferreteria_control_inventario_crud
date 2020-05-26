<?php
require_once 'ClientImplement.php';

class ClientModel
{
    private $client;

    public function __construct()
    {
        $this->client = new ClientImplement();
    }

    public function insertInvoice($data){
        return $this->client->insert_invoice($data);
    }

    public function insertProduct($data){
        return $this->client->insert_product($data);
    }

    public function selectAllProviders()
    {
        return $this->client->selectAllProviders();
    }

    public function selectAllCategories()
    {
        return $this->client->selectAllCategories();
    }

}
