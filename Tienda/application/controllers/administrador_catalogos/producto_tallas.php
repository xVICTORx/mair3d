<?php

class Producto_Tallas extends CI_Controller {
    
    private $producto_tallaService;
    
    public function __construct() {
        parent::__construct();
        $this->producto_tallaService = new Producto_TallaService();
    }
    
    public function operations() {
        $oper = isset($_POST["oper"])? $_POST["oper"] : "";
        $oper = $oper == ""? $_GET["oper"] : $oper;
        switch($oper) {
            case GRID_LOAD:
                $this->_load();
                break;
            case GRID_ADD:
                $this->_add();
                break;
            case GRID_EDIT:
                $this->_edit();
                break;
            case GRID_DEL:
                $this->_del();
                break;
        }
    }
    
    private function _load() {
        $idProducto = isset($_GET[TABLE_PRODUCTO_ID_PRODUCTO])? $_GET[TABLE_PRODUCTO_ID_PRODUCTO] : null;
        $idTalla = isset($_GET[TABLE_PRODUCTO_TALLA_ID_TALLA])? $_GET[TABLE_PRODUCTO_TALLA_ID_TALLA] : null;
        $response = $this->producto_tallaService->loadProducto_TallaPaged($idProducto, $idTalla, $_GET["sidx"], $_GET["sord"], $_GET["page"], $_GET["rows"]);
        echo json_encode($response);
    }
    
    private function _add() {
        $idProducto = isset($_GET["idProducto"])? $_GET["idProducto"] : null;
        $idTalla = isset($_POST[TABLE_PRODUCTO_TALLA_ID_TALLA])? $_POST[TABLE_PRODUCTO_TALLA_ID_TALLA] : null;
        $this->producto_tallaService->save($idProducto, $idTalla);
    }
    
    
    private function _del() {
        $idTalla = isset($_POST["id"])? $_POST["id"] : 0;
        $idProducto = isset($_GET[TABLE_PRODUCTO_ID_PRODUCTO])? $_GET[TABLE_PRODUCTO_ID_PRODUCTO] : null;
        $this->producto_tallaService->delete($idProducto, $idTalla);
    }
    
    
}