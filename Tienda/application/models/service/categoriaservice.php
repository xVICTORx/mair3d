<?php

/**
 * 
 *
 * @author Victor
 */
class CategoriaService extends CI_Model {
    
    private $categoriaDao;
    
    public function __construct() {
        parent::__construct();
        $this->categoriaDao = new CategoriaDao();
    }
    
    public function loadCategoriaPaged($nombre, $descripcion, $orderBy, $order, $page, $rows) {
        $categoria = new Categoria();
        $categoria->setNombre($nombre);
        $categoria->setDescripcion($descripcion);
        
        $cuenta = $this->categoriaDao->countByExample($categoria);
        
        $totalPages = $cuenta > 0? ceil($cuenta/$rows) : 0;
        $page = $page > $totalPages? $totalPages : $page;
        $offset = $rows*$page - $rows; 
        
        $categorias = $this->categoriaDao->searchByExamplePaged($categoria, $orderBy, $order, $rows, $offset);
        
        $gridRows = array();
        foreach($categorias as $key => $categoria){
            $gridRows[$key] = array();
            $gridRows[$key]["id"] = $categoria->getIdCategoria();
            $gridRows[$key][TABLE_CATEGORIA_NOMBRE] = $categoria->getNombre();
            $gridRows[$key][TABLE_CATEGORIA_DESCRIPCION] = $categoria->getDescripcion();
        }
        
        $gridModel =  new jqGridModel();
        $gridModel->rows = $gridRows;
        $gridModel->page = $page;
        $gridModel->records = count($gridRows);
        $gridModel->total = $totalPages;
        
        return $gridModel;
    }
    
    /**
     * Guardar una categoria ya se nuevo o existente
     * 
     * @param type $nombre
     * @param type $imagen
     * @param type $descripcion
     * @param type $idCategoria
     */
    public function save($nombre, $descripcion, $idCategoria = null){
        $categoria = new Categoria($idCategoria, $nombre, $descripcion);
        $this->categoriaDao->save($categoria);
    }
    
    /**
     * Borrar una categoria
     * 
     * @param type $idCategoria
     */
    public function delete($idCategoria) {
        $this->categoriaDao->delete($idCategoria);
    }
    
    public function getAll() {
        return $this->categoriaDao->getAll();
    }
    
    public function getById($idCategoria) {
        return $this->categoriaDao->getById($idCategoria);
    }
}

?>
