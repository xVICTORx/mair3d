<?php


class SubcategoriaDao extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function countAll() {
        return count($this->getAll());
    }
    
    public function countByExample($subCategoria) {
        return count($this->searchByExample($subCategoria));
    }
    
    public function delete($idSubcategoria) {
        $this->db->where(TABLE_SUBCATEGORIA_ID_SUBCATEGORIA, $idSubcategoria);
        $this->db->delete(TABLE_SUBCATEGORIA);
    }
    
    public function getAll() {
        $condition = TABLE_SUBCATEGORIA . "." . TABLE_SUBCATEGORIA_ID_CATEGORIA . " = " . 
                     TABLE_CATEGORIA . "." . TABLE_CATEGORIA_ID_CATEGORIA;
        $this->db->join(TABLE_CATEGORIA, $condition);
        $orderBy = TABLE_CATEGORIA . "." .TABLE_CATEGORIA_NOMBRE . ", " .
                   TABLE_SUBCATEGORIA . "." .TABLE_SUBCATEGORIA_NOMBRE  . ", " .
                   TABLE_SUBCATEGORIA . "." . TABLE_SUBCATEGORIA_ID_CATEGORIA;
        $this->db->order_by($orderBy);
        $select = TABLE_SUBCATEGORIA."." . TABLE_SUBCATEGORIA_ID_SUBCATEGORIA . " AS idSubcategoria, " .
                  TABLE_SUBCATEGORIA."." . TABLE_SUBCATEGORIA_NOMBRE . " AS nombre, " .
                  TABLE_SUBCATEGORIA."." . TABLE_SUBCATEGORIA_DESCRIPCION . " AS descripcion, " .
                  TABLE_SUBCATEGORIA."." . TABLE_SUBCATEGORIA_ID_CATEGORIA . " AS idCategoria";
        $this->db->select($select);
        $query = $this->db->get(TABLE_SUBCATEGORIA);
        return $this->_getResult($query->result());
    }
    
    public function getById($idSubcategoria) {
        $this->db->where(TABLE_SUBCATEGORIA_ID_SUBCATEGORIA, $idSubcategoria);
        $query = $this->db->get(TABLE_SUBCATEGORIA);
        $subCategorias = $this->_getResult($query->result());
        
        if(count($subCategorias > 0)) {
            return $subCategorias[0];
        } else {
            return null;
        }
    }
    
    public function save($subCategoria) {
        $params = array(
            TABLE_SUBCATEGORIA_DESCRIPCION => $subCategoria->getDescripcion(),
            TABLE_SUBCATEGORIA_ID_CATEGORIA => $subCategoria->getIdCategoria(),
            TABLE_SUBCATEGORIA_NOMBRE => $subCategoria->getNombre()
        );
        
        if($subCategoria->getIdSubCategoria() == null){
            $this->db->insert(TABLE_SUBCATEGORIA, $params);
        } else {
            $this->db->where(TABLE_SUBCATEGORIA_ID_SUBCATEGORIA, $subCategoria->getIdSubCategoria());
            $this->db->update(TABLE_SUBCATEGORIA, $params);
        }
    }
    
    public function searchByExample($subCategoria) {
        $this->db->like(TABLE_SUBCATEGORIA_DESCRIPCION, $subCategoria->getDescripcion(), LIKE_AFTER);
        $this->db->like(TABLE_SUBCATEGORIA_NOMBRE, $subCategoria->getNombre(), LIKE_AFTER);
        if($subCategoria->getIdSubCategoria() != null){
            $this->db->where(TABLE_SUBCATEGORIA_ID_SUBCATEGORIA, $subCategoria->getIdSubCategoria());
        }
        
        $query = $this->db->get(TABLE_SUBCATEGORIA);
        
        return $this->_getResult($query->result());
    }
    
    public function searchByExamplePaged($subCategoria, $orderBy = "idSubcategoria", $order = "asc", $limit = 20, $offset = 0) {
        $this->db->like(TABLE_SUBCATEGORIA_DESCRIPCION, $subCategoria->getDescripcion(), LIKE_AFTER);
        $this->db->like(TABLE_SUBCATEGORIA_NOMBRE, $subCategoria->getNombre(), LIKE_AFTER);
        if($subCategoria->getIdCategoria() != null){
            $this->db->where(TABLE_SUBCATEGORIA_ID_CATEGORIA, $subCategoria->getIdCategoria());
        }
        $this->db->order_by($orderBy, $order);
        $query = $this->db->get(TABLE_SUBCATEGORIA, $limit, $offset);
        return $this->_getResult($query->result());
    }
    
    private function _getResult($result) {
        $subCategorias = array();
        foreach($result as $key => $row) {
            $subCategorias[$key] = new Subcategoria($row->idSubcategoria, 
                                                    $row->nombre, 
                                                    $row->descripcion, 
                                                    $row->idCategoria);
        }
        return $subCategorias;
    }
}