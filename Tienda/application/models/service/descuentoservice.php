<?php

class DescuentoService extends CI_Model {
    private $descuentoDao;
    
    public function __construct() {
        parent::__construct();
        $this->descuentoDao = new DescuentoDao;
    }
    
    public function loadDescuentoPaged($monto, $porcentaje, $orderBy, $order, $page, $rows) {
        $descuento = new Descuento(null, $monto, $porcentaje);
        
        $cuenta = $this->descuentoDao->countByExample($descuento);
        
        $totalPages = $cuenta > 0? ceil($cuenta/$rows) : 0;
        $page = $page > $totalPages? $totalPages : $page;
        $offset = $rows*$page - $rows; 
        
        $descuentos = $this->descuentoDao->searchByExamplePaged($descuento, $orderBy, $order, $rows, $offset);
        $gridRows = array();
        foreach($descuentos as $key => $descuento) {
            $gridRows[$key] = array();
            $gridRows[$key]["id"] = $descuento->getIdDescuento();
            $gridRows[$key]["monto"] = $descuento->getMonto();
            $gridRows[$key]["porcentaje"] = $descuento->getPorcentaje();
        }
        
        $gridModel =  new jqGridModel();
        $gridModel->rows = $gridRows;
        $gridModel->page = $page;
        $gridModel->records = count($gridRows);
        $gridModel->total = $totalPages;
        
        return $gridModel;
    }
    
    public function save($monto, $porcentaje, $idDescuento = null) {
        $descuento = new Descuento($idDescuento, $monto, $porcentaje);
        $this->descuentoDao->save($descuento);
    }
    
    public function delete($idDescuento) {
        $this->descuentoDao->delete($idDescuento);
    }
    
    public function getAll() {
        
    }
    
    public function getDescuetoMonto($monto) {
        return $this->descuentoDao->getDescuetoMonto($monto);
    }
}
