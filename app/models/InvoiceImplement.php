<?php

class InvoiceImplement
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function selectAllSales(){
        $this->db->query("SELECT `idfactura`, `cantidad_productos`, `total_venta`, `Cliente_idcliente`, `detalle_venta`,`fechahora_venta` FROM `facturas` INNER JOIN `f_venta` ON `facturas`.`idfactura` = `f_venta`.`Factura_idfactura`;");
        return $this->db->records();
    }

    public function selectAllPurchases(){
        $this->db->query("SELECT `idfactura`, `cantidad_productos`, `total_venta`, `Proveedor_idproveedor`, `detalle_venta`,`fechahora_venta` FROM `facturas` INNER JOIN `f_compra` ON `facturas`.`idfactura` = `f_compra`.`Factura_idfactura`;");
        return $this->db->records();
    }

    public function selectById($id)
    {
        $this->db->query("SELECT `idCliente`, `nombre`, `direccion`, `telefono` FROM `cliente` WHERE '$id';");
        return $this->db->registry();
    }

    public function insert($data)
    {
        $this->db->query("INSERT INTO `cliente`(`idCliente`, `nombre`, `direccion`, `telefono`) VALUES (:idCliente,:nombre,:direccion,:telefono);");
        $this->db->bind(':idCliente', $data['idCliente']);
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':direccion', $data['direccion']);
        $this->db->bind(':telefono', $data['telefono']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data)
    {
        $this->db->query("UPDATE `cliente` SET `nombre`=:nombre,`direccion`=:direccion,`telefono`=:telefono WHERE `idCliente`= :idCliente;");
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':direccion', $data['direccion']);
        $this->db->bind(':telefono', $data['telefono']);
        $this->db->bind(':idCliente', $data['idCliente']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function select()
    {
        $this->db->query("SELECT * FROM `cliente`;");
        return $this->db->records();
    }

    public function delete($data)
    {
        $this->db->query("DELETE FROM `cliente` WHERE `idCliente` = :idCliente;");
        $this->db->bind(':idCliente', $data['idCliente']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}