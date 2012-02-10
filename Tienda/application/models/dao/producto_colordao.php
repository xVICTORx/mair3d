<?php

class Producto_ColorDao extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function countAll() {
        return count($this->getAll());
    }

    public function countByExample(Producto_Color $producto_color) {
        return count($this->searchByExample($producto_color));
    }

    public function delete($idProducto, $idColor) {
        $this->db->where(TABLE_PRODUCTO_COLOR_ID_PRODUCTO, $idProducto);
        $this->db->where(TABLE_PRODUCTO_COLOR_ID_COLOR, $idColor);
        $this->db->delete(TABLE_PRODUCTO_COLOR);
    }

    public function getAll() {
        $query = $this->db->get(TABLE_PRODUCTO_COLOR);
        return $this->_getResult($query->result());
    }

    public function getById($idProducto, $idColor) {
        $this->db->where(TABLE_PRODUCTO_COLOR_ID_PRODUCTO, $idProducto);
        $this->db->where(TABLE_PRODUCTO_COLOR_ID_COLOR, $idColor);
        $query = $this->db->get(TABLE_PRODUCTO_COLOR);
        $producto_colores = $this->_getResult($query->result());
        print_r($producto_colores);
        if (count($producto_colores) > 0) {
            return $producto_colores[0];
        } else {
            return null;
        }
    }

    public function save(Producto_Color $producto_color) {
        if ($this->getById($producto_color->getIdProducto(), $producto_color->getIdColor()) == null) {
            $params = array(
                TABLE_PRODUCTO_COLOR_ID_PRODUCTO => $producto_color->getIdProducto(),
                TABLE_PRODUCTO_COLOR_ID_COLOR => $producto_color->getIdColor(),
                TABLE_PRODUCTO_COLOR_IMAGEN => $producto_color->getImagen()
            );

            $this->db->insert(TABLE_PRODUCTO_COLOR, $params);
        }
    }

    public function searchByExample(Producto_Color $producto_color) {
        if ($producto_color->getIdProducto() != null) {
            $this->db->where(TABLE_PRODUCTO_COLOR_ID_PRODUCTO, $producto_color->getIdProducto());
        }
        if ($producto_color->getIdColor() != null) {
            $this->db->where(TABLE_PRODUCTO_COLOR_ID_COLOR, $producto_color->getIdColor());
        }

        $query = $this->db->get(TABLE_PRODUCTO_COLOR);

        return $this->_getResult($query->result());
    }

    public function searchByExamplePaged($producto_color, $orderBy = "idProducto", $order = "asc", $limit = 20, $offset = 0) {
        if ($producto_color->getIdProducto() != null) {
            $this->db->where(TABLE_PRODUCTO_COLOR_ID_PRODUCTO, $producto_color->getIdProducto());
        }
        if ($producto_color->getIdColor() != null) {
            $this->db->where(TABLE_PRODUCTO_COLOR_ID_COLOR, $producto_color->getIdColor());
        }

        $this->db->order_by($orderBy, $order);
        $query = $this->db->get(TABLE_PRODUCTO_COLOR, $limit, $offset);

        return $this->_getResult($query->result());
    }

    private function _getResult($result) {
        $producto_colores = array();
        foreach ($result as $key => $row) {
            $producto_colores[$key] = new Producto_Color($row->idColor, $row->idProducto, $row->imagen);
        }
        return $producto_colores;
    }
    /**
     *
     * @param type $idProducto
     * @return Producto_Color
     */
    public function getByProducto($idProducto) {
        $this->db->where(TABLE_PRODUCTO_COLOR_ID_PRODUCTO, $idProducto);
        $query = $this->db->get(TABLE_PRODUCTO_COLOR);
        return $this->_getResult($query->result());

    }

}
