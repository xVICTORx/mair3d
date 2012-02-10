<?php

/**
 * 
 *
 * @author Victor
 */
class CategoriaDao extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function countAll() {
        return count($this->getAll());
    }
    
    public function countByExample($categoria) {
        return count($this->searchByExample($categoria));
    }
    
    public function delete($idCategoria) {
        $this->db->where(TABLE_CATEGORIA_ID_CATEGORIA, $idCategoria);
        $this->db->delete(TABLE_CATEGORIA);
    }
    
    public function getAll() {
        $query = $this->db->get(TABLE_CATEGORIA);
        return $this->_getResult($query->result());
    }
    
    public function getById($idCategoria) {
        $this->db->where(TABLE_CATEGORIA_ID_CATEGORIA, $idCategoria);
        $query = $this->db->get(TABLE_CATEGORIA);
        $categorias = $this->_getResult($query->result());
        if(count($categorias) > 0){
            return $categorias[0];
        } else {
            return null;
        }
    }
    
    public function save($categoria) {
        $params = array(
            TABLE_CATEGORIA_DESCRIPCION => $categoria->getDescripcion(),
            TABLE_CATEGORIA_NOMBRE => $categoria->getNombre()
        );
        if($categoria->getIdCategoria() == null){
            $this->db->insert(TABLE_CATEGORIA, $params);
        } else {
            $this->db->where(TABLE_CATEGORIA_ID_CATEGORIA, $categoria->getIdCategoria());
            $this->db->update(TABLE_CATEGORIA, $params);
        }
    }
    
    public function searchByExample($categoria) {
        $this->db->like(TABLE_CATEGORIA_NOMBRE, $categoria->getNombre(), LIKE_AFTER);
        $this->db->like(TABLE_CATEGORIA_DESCRIPCION, $categoria->getDescripcion(), LIKE_AFTER);
        $query = $this->db->get(TABLE_CATEGORIA);
        
        return $this->_getResult($query->result());
    }
    
    public function searchByExamplePaged($categoria, $orderBy = "idCategoria", $order = "asc", $limit = 20, $offset = 0) {
        $this->db->like(TABLE_CATEGORIA_NOMBRE, $categoria->getNombre(), LIKE_AFTER);
        $this->db->like(TABLE_CATEGORIA_DESCRIPCION, $categoria->getDescripcion(), LIKE_AFTER);
        $this->db->order_by($orderBy, $order);
        $query = $this->db->get(TABLE_CATEGORIA, $limit, $offset);
        
        return $this->_getResult($query->result());
    }
    
    private function _getResult($result) {
        $categorias = array();
        foreach($result as $key => $row){
            $categorias[$key] = new Categoria($row->idCategoria, 
                                              $row->nombre, 
                                              $row->descripcion);
        }
        return $categorias;
    }
    
}
