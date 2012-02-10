<?php

class SubCategoriaService extends CI_Model {
    
    private $subcategoriaDao;
    private $categoriaDao;
    
    public function __construct() {
        parent::__construct();
        $this->subcategoriaDao = new SubcategoriaDao();
        $this->categoriaDao = new CategoriaDao();
    }
    
    public function loadSubcategoriaPaged($nombre, $descripcion, $idCategoria ,$orderBy, $order, $page, $rows) {
        $subcategoria = new Subcategoria(null, $nombre, $descripcion, $idCategoria);
        $cuenta = $this->subcategoriaDao->countByExample($subcategoria);
        
        $totalPages = $cuenta > 0? ceil($cuenta/$rows) : 0;
        $page = $page > $totalPages? $totalPages : $page;
        $offset = $rows*$page - $rows; 
        
        $subcategorias = $this->subcategoriaDao->searchByExamplePaged($subcategoria, $orderBy, $order, $rows, $offset);
        
        $gridRows = array();
        foreach($subcategorias as $key => $subcategoria){
            $gridRows[$key] = array();
            $gridRows[$key]["id"] = $subcategoria->getIdSubCategoria();
            $gridRows[$key][TABLE_SUBCATEGORIA_NOMBRE] = $subcategoria->getNombre();
            $gridRows[$key][TABLE_SUBCATEGORIA_DESCRIPCION] = $subcategoria->getDescripcion();
            $categoria = $this->categoriaDao->getById($subcategoria->getIdCategoria());
            $gridRows[$key][TABLE_SUBCATEGORIA_ID_CATEGORIA] = $categoria->getNombre();
        }
        
        $gridModel =  new jqGridModel();
        $gridModel->rows = $gridRows;
        $gridModel->page = $page;
        $gridModel->records = count($gridRows);
        $gridModel->total = $totalPages;
        
        return $gridModel;
    }
    
    public function save($nombre, $descripcion, $idCategoria, $idSubCategoria = null) {
        $subcategoria = new Subcategoria($idSubCategoria, $nombre, $descripcion, $idCategoria);
        $this->subcategoriaDao->save($subcategoria);
    }
    
    public function delete($idSubcategoria) {
        $this->subcategoriaDao->delete($idSubcategoria);
    }
    
    public function getAll() {
        return $this->subcategoriaDao->getAll();
    }
    
    public function getById($idSubcategoria) {
        return $this->subcategoriaDao->getById($idSubcategoria);
    }
    
}
