<?php

class TallaService extends CI_Model {
    private $tallaDao;
    
    public function __construct() {
        parent::__construct();
        $this->tallaDao = new TallaDao();
    }
    
    public function loadTallaPaged($talla, $descripcion, $orderBy, $order, $page, $rows) {
        $talla = new Talla(null, $talla, $descripcion);
        
        $cuenta = $this->tallaDao->countByExample($talla);
        
        $totalPages = $cuenta > 0? ceil($cuenta/$rows) : 0;
        $page = $page > $totalPages? $totalPages : $page;
        $offset = $rows*$page - $rows; 
        
        $tallas = $this->tallaDao->searchByExamplePaged($talla, $orderBy, $order, $rows, $offset);
        
        $gridRows = array();
        foreach($tallas as $key => $talla){
            $gridRows[$key] = array();
            $gridRows[$key]["id"] = $talla->getIdTalla();
            $gridRows[$key][TABLE_TALLA_TALLA] = $talla->getTalla();
            $gridRows[$key][TABLE_TALLA_DESCRIPCION] = $talla->getDescripcion();
        }
        
        $gridModel =  new jqGridModel();
        $gridModel->rows = $gridRows;
        $gridModel->page = $page;
        $gridModel->records = count($gridRows);
        $gridModel->total = $totalPages;
        
        return $gridModel;
    }
    
   
    public function save($talla, $descripcion, $idTalla = null){
        $talla = new Talla($idTalla, $talla, $descripcion);
        $this->tallaDao->save($talla);
    }

    public function delete($idTalla) {
        $this->tallaDao->delete($idTalla);
    }
    
    public function getAll() {
        return $this->tallaDao->getAll();
    }
}
