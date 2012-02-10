<?php

class Producto_TallaDao extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function countAll() {
        return count($this->getAll());
    }

    public function countByExample($producto_talla) {
        return count($this->searchByExample($producto_talla));
    }

    public function delete($idProducto, $idTalla) {
        $this->db->where(TABLE_PRODUCTO_TALLA_ID_PRODUCTO, $idProducto);
        $this->db->where(TABLE_PRODUCTO_TALLA_ID_TALLA, $idTalla);
        $this->db->delete(TABLE_PRODUCTO_TALLA);
    }

    public function getAll() {
        $query = $this->db->get(TABLE_PRODUCTO_TALLA);
        return $this->_getResult($query->result());
    }

    public function getById($idProducto, $idTalla) {
        $this->db->where(TABLE_PRODUCTO_TALLA_ID_PRODUCTO, $idProducto);
        $this->db->where(TABLE_PRODUCTO_TALLA_ID_TALLA, $idTalla);
        $query = $this->db->get(TABLE_PRODUCTO_TALLA);
        $producto_tallas = $this->_getResult($query->result());

        if (count($producto_tallas > 0)) {
            return $producto_tallas[0];
        } else {
            return null;
        }
    }

    public function save(Producto_Talla $producto_talla) {
        if ($this->getById($producto_talla->getIdProducto(), $producto_talla->getIdTalla()) == null) {
            $params = array(
                TABLE_PRODUCTO_TALLA_ID_PRODUCTO => $producto_talla->getIdProducto(),
                TABLE_PRODUCTO_TALLA_ID_TALLA => $producto_talla->getIdTalla()
            );

            $this->db->insert(TABLE_PRODUCTO_TALLA, $params);
        }
    }

    public function searchByExample(Producto_Talla $producto_talla) {
        if ($producto_talla->getIdProducto() != null) {
            $this->db->where(TABLE_PRODUCTO_TALLA_ID_PRODUCTO, $producto_talla->getIdProducto());
        }
        if ($producto_talla->getIdTalla() != null) {
            $this->db->where(TABLE_PRODUCTO_TALLA_ID_TALLA, $producto_talla->getIdTalla());
        }

        $query = $this->db->get(TABLE_PRODUCTO_TALLA);

        return $this->_getResult($query->result());
    }

    public function searchByExamplePaged($producto_talla, $orderBy = "idProducto", $order = "asc", $limit = 20, $offset = 0) {
        if ($producto_talla->getIdProducto() != null) {
            $this->db->where(TABLE_PRODUCTO_TALLA_ID_PRODUCTO, $producto_talla->getIdProducto());
        }
        if ($producto_talla->getIdTalla() != null) {
            $this->db->where(TABLE_PRODUCTO_TALLA_ID_TALLA, $producto_talla->getIdTalla());
        }

        $this->db->order_by($orderBy, $order);
        $query = $this->db->get(TABLE_PRODUCTO_TALLA, $limit, $offset);

        return $this->_getResult($query->result());
    }

    private function _getResult($result) {
        $producto_tallas = array();
        foreach ($result as $key => $row) {
            $producto_tallas[$key] = new Producto_Talla($row->idTalla, $row->idProducto);
        }
        return $producto_tallas;
    }
    
    public function getByProducto($idProducto) {
        $this->db->where(TABLE_PRODUCTO_TALLA_ID_PRODUCTO, $idProducto);
        $query = $this->db->get(TABLE_PRODUCTO_TALLA);
        return $this->_getResult($query->result());
    }

}
