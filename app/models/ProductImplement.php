<?php

class ProductImplement
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function selectById($id)
    {
        $this->db->query("SELECT * FROM `productos` WHERE `idproducto` = '$id';");
        return $this->db->registry();
    }

    public function selectAll()
    {
        $this->db->query("SELECT * FROM `productos`;");
        return $this->db->records();
    }

    public function delete($data)
    {
        $this->db->query("DELETE FROM `productos` WHERE `idproducto` = :idproducto;");
        $this->db->bind(':idproducto', $data['idproducto']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}