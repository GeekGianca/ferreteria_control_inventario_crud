<?php
class CategoriesImplement {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function selectById($id){
        $this->db->query("SELECT `idcategoria`, `nombre`, `cantidad_disponible` FROM `categoria` WHERE `idcategoria` = '$id';");
        return $this->db->registry();
    }

    public function insert($data)
    {
        $this->db->query("INSERT INTO `categoria`(`idcategoria`, `nombre`, `cantidad_disponible`) VALUES (:idcategoria,:nombre,:cantidad_disponible);");
        $this->db->bind(':idcategoria', $data['idcategoria']);
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':cantidad_disponible', $data['cantidad_disponible']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update($data)
    {
        $this->db->query("UPDATE `categoria` SET `nombre`=:nombre,`cantidad_disponible`=:cantidad_disponible WHERE `idcategoria` = :idcategoria;");
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':cantidad_disponible', $data['cantidad_disponible']);
        $this->db->bind(':idcategoria', $data['idcategoria']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function select()
    {
        $this->db->query("SELECT * FROM `categoria`;");
        return $this->db->records();
    }

    public function delete($data)
    {
        $this->db->query("DELETE FROM `categoria` WHERE `idcategoria` = :idcategoria;");
        $this->db->bind(':idcategoria', $data['idcategoria']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}
