<?php

class EstatusDao extends CI_Model {
    public function getAll() {
        $query = $this->db->get("estatus");
        return $this->_getResult($query->result());
    }
    
    public function _getResult($result){
        $estatus = array();
        foreach($result as $key => $row){
            $estatus[$key] = new Estatus($row->idEstatus, $row->nombre, $row->descripcion);
        }
        return $estatus;
    }

}