<?php

class Producto_TallaService extends CI_Model {
    
    private $producto_tallaDao;
    private $productoDao;
    private $tallaDao;
    
    public function __construct() {
        parent::__construct();
        $this->producto_tallaDao = new Producto_TallaDao();
        $this->productoDao = new ProductoDao();
        $this->tallaDao = new TallaDao();
    }
    
    public function loadProducto_TallaPaged($idProducto, $idTalla, $orderBy, $order, $page, $rows) {
        $producto_talla = new Producto_Talla($idTalla, $idProducto);
        $cuenta = $this->producto_tallaDao->countByExample($producto_talla);
        $totalPages = $cuenta > 0? ceil($cuenta/$rows) : 0;
        $page = $page > $totalPages? $totalPages : $page;
        $offset = $rows*$page - $rows; 
        $producto_tallas = $this->producto_tallaDao->searchByExamplePaged($producto_talla, $orderBy, $order, $rows, $offset);
        $gridRows = array();
        foreach($producto_tallas as $key => $producto_talla){
            $gridRows[$key] = array();
            $producto = $this->productoDao->getById($producto_talla->getIdProducto());
            $talla = $this->tallaDao->getById($producto_talla->getIdTalla());
            $gridRows[$key]["id"] = $producto_talla->getIdTalla();
            $gridRows[$key][TABLE_PRODUCTO_TALLA_ID_TALLA] = $talla->getTalla();
        }
        
        $gridModel =  new jqGridModel();
        $gridModel->rows = $gridRows;
        $gridModel->page = $page;
        $gridModel->records = count($gridRows);
        $gridModel->total = $totalPages;
        
        return $gridModel;
    }
    
    public function save($idProducto, $idTalla){
        $producto_talla = new Producto_Talla($idTalla, $idProducto);
        $this->producto_tallaDao->save($producto_talla);
    }
    
    public function delete($idProducto, $idTalla) {
        $this->producto_tallaDao->delete($idProducto, $idTalla);
    }
    
    public function getTallasByProducto($idProducto) {
        $producto_tallas = $this->producto_tallaDao->getByProducto($idProducto);
        $tallas = array();
        foreach($producto_tallas as $key => $producto_talla){
            $talla = $this->tallaDao->getById($producto_talla->getIdTalla());
            $tallas[$key]["talla"] = $talla->getTalla();
            $tallas[$key]["idTalla"] = $talla->getIdTalla();
        }
        return $tallas;
    }
    
}