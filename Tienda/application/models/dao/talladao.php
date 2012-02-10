<?php

class TallaDao extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function countAll() {
        return count($this->getAll());
    }

    public function countByExample($talla) {
        return count($this->searchByExample($talla));
    }

    public function delete($idTalla) {
        $this->db->where(TABLE_TALLA_ID_TALLA, $idTalla);
        $this->db->delete(TABLE_TALLA);
    }

    public function getAll() {
        $query = $this->db->get(TABLE_TALLA);
        return $this->_getResult($query->result());
    }

    public function getById($idTalla) {
        $this->db->where(TABLE_TALLA_ID_TALLA, $idTalla);
        $query = $this->db->get(TABLE_TALLA);
        $tallas = $this->_getResult($query->result());

        if ($tallas > 0) {
            return $tallas[0];
        } else {
            return null;
        }
    }

    public function save(Talla $talla) {
        $params = array(
            TABLE_TALLA_TALLA => $talla->getTalla(),
            TABLE_TALLA_DESCRIPCION => $talla->getDescripcion()
        );

        if ($talla->getIdTalla() == null) {
            $this->db->insert(TABLE_TALLA, $params);
        } else {
            $this->db->where(TABLE_TALLA_ID_TALLA, $talla->getIdTalla());
            $this->db->update(TABLE_TALLA, $params);
        }
    }

    public function searchByExample(Talla $talla) {
        $this->db->like(TABLE_TALLA_TALLA, $talla->getTalla(), LIKE_AFTER);
        $this->db->like(TABLE_TALLA_DESCRIPCION, $talla->getDescripcion(), LIKE_AFTER);

        $query = $this->db->get(TABLE_TALLA);

        return $this->_getResult($query->result());
    }

    public function searchByExamplePaged($talla, $orderBy = "idTalla", $order = "asc", $limit = 20, $offset = 0) {
        $this->db->like(TABLE_TALLA_TALLA, $talla->getTalla(), LIKE_AFTER);
        $this->db->like(TABLE_TALLA_DESCRIPCION, $talla->getDescripcion(), LIKE_AFTER);
        $this->db->order_by($orderBy, $order);

        $query = $this->db->get(TABLE_TALLA, $limit, $offset);

        return $this->_getResult($query->result());
    }

    private function _getResult($result) {
        $tallas = array();
        foreach ($result as $key => $row) {
            $tallas[$key] = new Talla($row->idTalla, 
                                      $row->talla, 
                                      $row->descripcion);
        }
        return $tallas;
    }

}
