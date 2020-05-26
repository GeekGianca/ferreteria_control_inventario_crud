<?php
class ProviderImplement {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function selectById($id)
    {
        $this->db->query("SELECT `idproveedor`, `nombre`, `ciudad`, `telefono`, `nombre_contacto` FROM `proveedor` WHERE `idproveedor` = '$id';");
        return $this->db->registry();
    }

    public function insert($data)
    {
        $this->db->query("INSERT INTO `proveedor`(`idproveedor`, `nombre`, `ciudad`, `telefono`, `nombre_contacto`) VALUES (:idproveedor, :nombre, :ciudad, :telefono, :nombre_contacto)");
        $this->db->bind(':idproveedor', $data['idproveedor']);
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':ciudad', $data['ciudad']);
        $this->db->bind(':telefono', $data['telefono']);
        $this->db->bind(':nombre_contacto', $data['nombre_contacto']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data)
    {
        $this->db->query("UPDATE `proveedor` SET `nombre`=:nombre,`ciudad`=:ciudad,`telefono`=:telefono,`nombre_contacto`=:nombre_contacto WHERE `idproveedor` = :idproveedor;");
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':ciudad', $data['ciudad']);
        $this->db->bind(':telefono', $data['telefono']);
        $this->db->bind(':nombre_contacto', $data['nombre_contacto']);
        $this->db->bind(':idproveedor', $data['idproveedor']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function select()
    {
        $this->db->query("SELECT * FROM `proveedor`;");
        return $this->db->records();
    }

    public function delete($data)
    {
        $this->db->query("DELETE FROM `proveedor` WHERE `idproveedor` = :idproveedor;");
        $this->db->bind(':idproveedor', $data['idproveedor']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}