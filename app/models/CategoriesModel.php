<?php
require_once 'CategoriesImplement.php';
class CategoriesModel
{
    private $categories;

    public function __construct()
    {
        $this->categories = new CategoriesImplement();
    }

    public function insert($data)
    {
        return $this->categories->insert($data);
    }

    public function selectAll()
    {
        return $this->categories->select();
    }

    public function update($data)
    {
        return $this->categories->update($data);
    }

    public function selectById($data)
    {
        return $this->categories->selectById($data);
    }
}