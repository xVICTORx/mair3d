<?php

class DescuentoDao extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function countAll() {
        return count($this->getAll());
    }
    
    public function countByExample(Descuento $descuento) {
        return count($this->searchByExample($descuento));
    }
    
    public function delete($idDescuento) {
        $this->db->where("idDescuento", $idDescuento);
        $this->db->delete("descuento");
    }
    
    public function getAll() {
        $query = $this->db->get("descuento");
        return $this->_getResult($query->result());
    }
    
    public function getById($idDescuento) {
        $this->db->where("idDescuento", $idDescuento);
        $query = $this->db->get("descuento");
        $descuentos = $this->_getResult($query->result());
        
        if(count($descuentos > 0)) {
            return $descuentos[0];
        } else {
            return null;
        }
    }
    
    public function save(Descuento $descuento) {
        $params = array(
            "monto" => $descuento->getMonto(),
            "porcentaje" => $descuento->getPorcentaje()
        );
        
        if($descuento->getIdDescuento() == null){
            $this->db->insert("descuento", $params);
        } else {
            $this->db->where("idDescuento", $descuento->getIdDescuento());
            $this->db->update("descuento", $params);
        }
    }
    
    public function searchByExample(Descuento $descuento) {
        $this->db->like("monto", $descuento->getMonto(), LIKE_AFTER);
        $this->db->like("porcentaje", $descuento->getPorcentaje(), LIKE_AFTER);
        $query = $this->db->get("descuento");
        return $this->_getResult($query->result());
    }
    
    public function searchByExamplePaged(Descuento $descuento, $orderBy = "idDescuento", $order = "asc", $limit = 20, $offset = 0) {
        $this->db->like("monto", $descuento->getMonto(), LIKE_AFTER);
        $this->db->like("porcentaje", $descuento->getPorcentaje(), LIKE_AFTER);
        $this->db->order_by($orderBy, $order);
        $query = $this->db->get("descuento", $limit, $offset);
        return $this->_getResult($query->result());
    }
    
    private function _getResult($result) {
        $descuentos = array();
        foreach($result as $key => $row) {
            $descuentos[$key] = new Descuento($row->idDescuento, $row->monto, $row->porcentaje);
        }
        return $descuentos;
    }
    
    public function getDescuetoMonto($monto) {
        $this->db->where("monto <=", $monto);
        $this->db->order_by("monto", "desc");
        $query = $this->db->get("descuento", 1, 0);
        $descuento = $this->_getResult($query->result());
        if(count($descuento) > 0) {
            return $descuento[0];
        } else {
            return new Descuento(null, 0.0, 0.0);
        }
    }
}
