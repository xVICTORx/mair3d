<?php

class Producto_Colores extends CI_Controller {
    
    private $producto_colorService;
    
    public function __construct() {
        parent::__construct();
        $this->producto_colorService = new Producto_ColorService();
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
        $idProducto = isset($_GET[TABLE_PRODUCTO_COLOR_ID_PRODUCTO])? $_GET[TABLE_PRODUCTO_COLOR_ID_PRODUCTO] : null;
        $idColor = isset($_GET[TABLE_PRODUCTO_COLOR_ID_COLOR])? $_GET[TABLE_PRODUCTO_COLOR_ID_COLOR] : null;
        $response = $this->producto_colorService->loadProducto_ColorPaged($idProducto, $idColor, $_GET["sidx"], $_GET["sord"], $_GET["page"], $_GET["rows"]);
        echo json_encode($response);
    }
    
    private function _add() {
        $idProducto = isset($_GET[TABLE_PRODUCTO_COLOR_ID_PRODUCTO])? $_GET[TABLE_PRODUCTO_COLOR_ID_PRODUCTO] : null;
        $idColor = isset($_POST[TABLE_PRODUCTO_COLOR_ID_COLOR])? $_POST[TABLE_PRODUCTO_COLOR_ID_COLOR] : null;
        $imagen = isset($_POST["imagenProductoColor"])? $_POST["imagenProductoColor"] : "";
        $this->producto_colorService->save($idProducto, $idColor, $imagen);
    }
    
    
    private function _del() {
        $idColor = isset($_POST["id"])? $_POST["id"] : 0;
        $idProducto = isset($_GET[TABLE_PRODUCTO_ID_PRODUCTO])? $_GET[TABLE_PRODUCTO_ID_PRODUCTO] : null;
        $this->producto_colorService->delete($idProducto, $idColor);
    }
    
}