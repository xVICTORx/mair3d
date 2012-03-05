<?php

class ProductoDao extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function countAll() {
        return count($this->getAll());
    }

    public function countByExample(Producto $producto) {
        return count($this->searchByExample($producto));
    }

    public function delete($idProducto) {
        $this->db->where(TABLE_PRODUCTO_ID_PRODUCTO, $idProducto);
        $this->db->delete(TABLE_PRODUCTO);
        echo $this->db->last_query();
    }

    public function getAll() {
       $query = $this->db->get(TABLE_PRODUCTO);
       return $this->_getResult($query->result());
    }

    public function getById($idProducto) {
        $this->db->where(TABLE_PRODUCTO_ID_PRODUCTO, $idProducto);
        $query = $this->db->get(TABLE_PRODUCTO);
        $productos = $this->_getResult($query->result());
        if(count($productos) > 0){
            return $productos[0];
        } else {
            return null;
        }
    }

    public function save(Producto $producto) {
        $params = array(
            TABLE_PRODUCTO_ACTIVO => $producto->getActivo(),
            TABLE_PRODUCTO_DESCRIPCION => $producto->getDescripcion(),
            TABLE_PRODUCTO_DESCUENTO => $producto->getDescuento(),
            TABLE_PRODUCTO_DESTACADO => $producto->getDestacado(),
            TABLE_PRODUCTO_ID_COLOR => $producto->getIdColor(),
            TABLE_PRODUCTO_ID_SUBCATEGORIA => $producto->getIdSubcategoria(),
            TABLE_PRODUCTO_IMAGEN => $producto->getImagen(),
            TABLE_PRODUCTO_MODELO => $producto->getModelo(),
            TABLE_PRODUCTO_PRECIO => $producto->getPrecio()
        );

        if($producto->getIdProducto() == null){
            $this->db->insert(TABLE_PRODUCTO, $params);
        } else {
            $this->db->where(TABLE_PRODUCTO_ID_PRODUCTO, $producto->getIdProducto());
            $this->db->update(TABLE_PRODUCTO, $params);
        }
    }

    public function searchByExample(Producto $producto) {
        $this->db->like(TABLE_PRODUCTO_DESCRIPCION, $producto->getDescripcion(), LIKE_AFTER);
        if($producto->getActivo() != "" && $producto->getActivo() != null){
            $this->db->like(TABLE_PRODUCTO_ACTIVO, $producto->getActivo(), LIKE_AFTER);
        }
        if($producto->getDescuento() != null && filter_var($producto->getDescuento(), FILTER_VALIDATE_FLOAT)){
            $this->db->like(TABLE_PRODUCTO_DESCUENTO, $producto->getDescuento(), LIKE_AFTER);
        }
        if($producto->getDestacado() != "" && $producto->getDestacado() != null){
            $this->db->like(TABLE_PRODUCTO_DESTACADO, $producto->getDestacado(), LIKE_AFTER);
        }
        if($producto->getIdColor() != null && filter_var($producto->getIdColor(), FILTER_VALIDATE_INT)){
            $this->db->where(TABLE_PRODUCTO_ID_COLOR, $producto->getIdColor());
        }
        if($producto->getIdSubcategoria() != null && filter_var($producto->getIdSubcategoria(), FILTER_VALIDATE_INT)){
            $this->db->where(TABLE_PRODUCTO_ID_SUBCATEGORIA, $producto->getIdSubcategoria());
        }
        $this->db->like(TABLE_PRODUCTO_IMAGEN, $producto->getImagen(), LIKE_AFTER);
        $this->db->like(TABLE_PRODUCTO_MODELO, $producto->getModelo(), LIKE_AFTER);
        if($producto->getPrecio() != null && filter_var($producto->getPrecio(), FILTER_VALIDATE_FLOAT)){
            $this->db->like(TABLE_PRODUCTO_PRECIO, $producto->getPrecio(), LIKE_AFTER);
        }

        $query = $this->db->get(TABLE_PRODUCTO);
        return $this->_getResult($query->result());
    }

    public function searchByExamplePaged(Producto $producto,
            $orderBy = "idProducto", $order = "asc", $limit = 20, $offset = 0) {

        $this->db->like(TABLE_PRODUCTO_DESCRIPCION, $producto->getDescripcion(), LIKE_AFTER);
        if($producto->getActivo() != "" && $producto->getActivo() != null){
            $this->db->like(TABLE_PRODUCTO_ACTIVO, $producto->getActivo(), LIKE_AFTER);
        }
        if($producto->getDescuento() != null && filter_var($producto->getDescuento(), FILTER_VALIDATE_FLOAT)){
            $this->db->like(TABLE_PRODUCTO_DESCUENTO, $producto->getDescuento(), LIKE_AFTER);
        }
        if($producto->getDestacado() != "" && $producto->getDestacado() != null){
            $this->db->like(TABLE_PRODUCTO_DESTACADO, $producto->getDestacado(), LIKE_AFTER);
        }
        if($producto->getIdColor() != null && filter_var($producto->getIdColor(), FILTER_VALIDATE_INT)){
            $this->db->where(TABLE_PRODUCTO_ID_COLOR, $producto->getIdColor());
        }
        if($producto->getIdSubcategoria() != null && filter_var($producto->getIdSubcategoria(), FILTER_VALIDATE_INT)){
            $this->db->where(TABLE_PRODUCTO_ID_SUBCATEGORIA, $producto->getIdSubcategoria());
        }
        $this->db->like(TABLE_PRODUCTO_IMAGEN, $producto->getImagen(), LIKE_AFTER);
        $this->db->like(TABLE_PRODUCTO_MODELO, $producto->getModelo(), LIKE_AFTER);
        if($producto->getPrecio() != null && filter_var($producto->getPrecio(), FILTER_VALIDATE_FLOAT)){
            $this->db->like(TABLE_PRODUCTO_PRECIO, $producto->getPrecio(), LIKE_AFTER);
        }

        $this->db->order_by($orderBy, $order);

        $query = $this->db->get(TABLE_PRODUCTO, $limit, $offset);
        return $this->_getResult($query->result());

    }

    public function searchByExampleOfertasPaged(Producto $producto,
            $orderBy = "idProducto", $order = "asc", $limit = 20, $offset = 0) {

        $this->db->like(TABLE_PRODUCTO_DESCRIPCION, $producto->getDescripcion(), LIKE_AFTER);
        if($producto->getActivo() != "" && $producto->getActivo() != null){
            $this->db->like(TABLE_PRODUCTO_ACTIVO, $producto->getActivo(), LIKE_AFTER);
        }
        if($producto->getDescuento() != null && filter_var($producto->getDescuento(), FILTER_VALIDATE_FLOAT)){
            $this->db->like(TABLE_PRODUCTO_DESCUENTO, $producto->getDescuento(), LIKE_AFTER);
        }
        if($producto->getDestacado() != "" && $producto->getDestacado() != null){
            $this->db->like(TABLE_PRODUCTO_DESTACADO, $producto->getDestacado(), LIKE_AFTER);
        }
        if($producto->getIdColor() != null && filter_var($producto->getIdColor(), FILTER_VALIDATE_INT)){
            $this->db->where(TABLE_PRODUCTO_ID_COLOR, $producto->getIdColor());
        }
        if($producto->getIdSubcategoria() != null && filter_var($producto->getIdSubcategoria(), FILTER_VALIDATE_INT)){
            $this->db->where(TABLE_PRODUCTO_ID_SUBCATEGORIA, $producto->getIdSubcategoria());
        }
        $this->db->like(TABLE_PRODUCTO_IMAGEN, $producto->getImagen(), LIKE_AFTER);
        $this->db->like(TABLE_PRODUCTO_MODELO, $producto->getModelo(), LIKE_AFTER);
        if($producto->getPrecio() != null && filter_var($producto->getPrecio(), FILTER_VALIDATE_FLOAT)){
            $this->db->like(TABLE_PRODUCTO_PRECIO, $producto->getPrecio(), LIKE_AFTER);
        }
        $this->db->where(TABLE_PRODUCTO_DESCUENTO . " >", 0);
        $this->db->order_by($orderBy, $order);

        $query = $this->db->get(TABLE_PRODUCTO, $limit, $offset);
        //echo $this->db->last_query();
        return $this->_getResult($query->result());

    }

    public function searchByTerm($term, $limit, $offset) {
        $this->db->join("subcategoria as s", "p.idSubcategoria = s.idSubcategoria");
        $this->db->join("categoria as c", "s.idCategoria = c.idCategoria");
        $this->db->like("p.modelo", $term, "both");
        $this->db->or_like('s.nombre', $term, "both");
        $this->db->or_like('c.nombre', $term, "both");
        $this->db->select("
            DISTINCT(p.idProducto) AS idProducto,
            p.modelo AS modelo,
            p.descripcion AS descripcion,
            p.idSubcategoria AS idSubcategoria,
            p.imagen AS imagen,
            p.idColor AS idColor,
            p.Precio AS precio,
            p.destacado AS destacado,
            p.descuento AS descuento,
            p.activo AS activo
        ", false);
        $query = $this->db->get("producto AS p", $limit, $offset);
		//echo $this->db->last_query();
        return $this->_getResult($query->result());

    }

    public function countByTerm($term) {
        $this->db->join("subcategoria as s", "p.idSubcategoria = s.idSubcategoria");
        $this->db->join("categoria as c", "s.idCategoria = s.idCategoria");
        $this->db->like("p.modelo", $term, "both");
        $this->db->or_like('s.nombre', $term, "both");
        $this->db->or_like('c.nombre', $term, "both");
        $this->db->select("
            p.idProducto AS idProducto,
            p.modelo AS modelo,
            p.descripcion AS descripcion,
            p.idSubcategoria AS idSubcategoria,
            p.imagen AS imagen,
            p.idColor AS idColor,
            p.Precio AS precio,
            p.destacado AS destacado,
            p.descuento AS descuento,
            p.activo AS activo
        ", false);
        $query = $this->db->get("producto AS p");
        return count($this->_getResult($query->result()));
    }

    public function searchByExamplePagedCategoria($idCategoria, Producto $producto,
            $orderBy = "idProducto", $order = "asc", $limit = 20, $offset = 0) {

        $this->db->join("subcategoria as s", "p.idSubcategoria = s.idSubcategoria");
        $this->db->join("categoria as c", "s.idCategoria = c.idCategoria");
        $this->db->where("c.idCategoria", $idCategoria);

        $this->db->like("p.descripcion", $producto->getDescripcion(), LIKE_AFTER);
        if($producto->getActivo() != "" && $producto->getActivo() != null){
            $this->db->like("p.activo", $producto->getActivo(), LIKE_AFTER);
        }
        if($producto->getDescuento() != null && filter_var($producto->getDescuento(), FILTER_VALIDATE_FLOAT)){
            $this->db->like("p.descuento", $producto->getDescuento(), LIKE_AFTER);
        }
        if($producto->getDestacado() != "" && $producto->getDestacado() != null){
            $this->db->like("p.destacado", $producto->getDestacado(), LIKE_AFTER);
        }
        if($producto->getIdColor() != null && filter_var($producto->getIdColor(), FILTER_VALIDATE_INT)){
            $this->db->where("p.idColor", $producto->getIdColor());
        }
        if($producto->getIdSubcategoria() != null && filter_var($producto->getIdSubcategoria(), FILTER_VALIDATE_INT)){
            $this->db->where("p.idSubcategoria", $producto->getIdSubcategoria());
        }
        $this->db->like("p.imagen", $producto->getImagen(), LIKE_AFTER);
        $this->db->like("p.modelo", $producto->getModelo(), LIKE_AFTER);
        if($producto->getPrecio() != null && filter_var($producto->getPrecio(), FILTER_VALIDATE_FLOAT)){
            $this->db->like("p.precio", $producto->getPrecio(), LIKE_AFTER);
        }

        $this->db->order_by($orderBy, $order);

        $this->db->select("
            p.idProducto AS idProducto,
            p.modelo AS modelo,
            p.descripcion AS descripcion,
            p.idSubcategoria AS idSubcategoria,
            p.imagen AS imagen,
            p.idColor AS idColor,
            p.Precio AS precio,
            p.destacado AS destacado,
            p.descuento AS descuento,
            p.activo AS activo
        ", false);
        $query = $this->db->get("producto AS p", $limit, $offset);
		//echo $this->db->last_query();
        return $this->_getResult($query->result());

    }

    private function _getResult($result) {
        $productos = array();
        foreach($result as $key => $row) {
            $productos[$key] = new Producto($row->idProducto,
                                            $row->modelo,
                                            $row->descripcion,
                                            $row->idSubcategoria,
                                            $row->imagen,
                                            $row->idColor,
                                            $row->precio,
                                            $row->destacado,
                                            $row->descuento,
                                            $row->activo);
        }
        return $productos;
    }
}
