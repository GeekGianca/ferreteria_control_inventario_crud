<?php
class ClientImplement {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function selectAllProviders()
    {
        $this->db->query("SELECT `idproveedor`, `nombre` FROM `proveedor`;");
        return $this->db->records();
    }

    public function selectAllCategories()
    {
        $this->db->query("SELECT `idcategoria`, `nombre` FROM `categoria`;");
        return $this->db->records();
    }

    public function insert_invoice($data)
    {
        if(session_status() == PHP_SESSION_NONE)
            session_start();
        $this->db->query("INSERT INTO `facturas`(`idfactura`, `noventa`, `cantidad_productos`, `total_venta`, `fechahora_venta`, `detalle_venta`) VALUES (:idfactura,:noventa,:cantidad_productos,:total_venta,(SELECT CURRENT_DATE),:detalle_venta);");
        $this->db->bind(':idfactura', $data['idfactura']);
        $this->db->bind(':noventa', $data['noventa']);
        $this->db->bind(':cantidad_productos', count($_SESSION['products']));
        $this->db->bind(':total_venta', $_SESSION['total']);
        $this->db->bind(':detalle_venta', count($_SESSION['products']).' x '.$_SESSION['total']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function insert_product($data)
    {
        $this->db->query("INSERT INTO `productos`(`idproducto`, `nombre`, `precio_venta`, `precio_compra`, `fecha_registro`, `disponibilidad`, `categoria_idcategoria`) VALUES (:idproducto,:nombre,:precio_venta,:precio_compra,:fecha_registro,:disponibilidad,:categoria_idcategoria);");
        $this->db->bind(':idproducto', $data['idproducto']);
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':precio_venta', $data['precio_venta']);
        $this->db->bind(':precio_compra', $data['precio_compra']);
        $this->db->bind(':fecha_registro', $data['fecha_registro']);
        $this->db->bind(':disponibilidad', $data['disponibilidad']);
        $this->db->bind(':categoria_idcategoria', $data['categoria_idcategoria']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}
