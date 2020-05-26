<?php
require_once 'ProviderImplement.php';

class ProviderModel
{
    private $provider;

    public function __construct()
    {
        $this->provider = new ProviderImplement();
    }

    public function insert($data)
    {
        return $this->provider->insert($data);
    }

    public function selectAll()
    {
        return $this->provider->select();
    }

    public function update($data)
    {
        return $this->provider->update($data);
    }

    public function selectById($data)
    {
        return $this->provider->selectById($data);
    }
}