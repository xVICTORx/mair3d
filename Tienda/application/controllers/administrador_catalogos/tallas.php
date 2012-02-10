<?php

class Tallas extends CI_Controller {
    
    private $tallaService;
    
    public function __construct() {
        parent::__construct();
        $this->tallaService = new TallaService();
    }
    
    public function index() {
        $this->load->view(VIEW_ADMIN_CATALOGO_TALLA);
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
        $talla = isset($_GET[TABLE_TALLA_TALLA])? $_GET[TABLE_TALLA_TALLA] : "";
        $descripcion = isset($_GET[TABLE_TALLA_DESCRIPCION])? $_GET[TABLE_TALLA_DESCRIPCION] : "";
        $response = $this->tallaService->loadTallaPaged($talla, $descripcion, $_GET["sidx"], $_GET["sord"], $_GET["page"], $_GET["rows"]);
        echo json_encode($response);
    }
    
    private function _add() {
        $talla = isset($_POST[TABLE_TALLA_TALLA])? $_POST[TABLE_TALLA_TALLA] : "";
        $descripcion = isset($_POST[TABLE_TALLA_DESCRIPCION])? $_POST[TABLE_TALLA_DESCRIPCION] : "";
        $this->tallaService->save($talla, $descripcion);
    }
    
    private function _edit() {
        $idTalla = isset($_POST["id"])? $_POST["id"] : null;
        $talla = isset($_POST[TABLE_TALLA_TALLA])? $_POST[TABLE_TALLA_TALLA] : "";
        $descripcion = isset($_POST[TABLE_TALLA_DESCRIPCION])? $_POST[TABLE_TALLA_DESCRIPCION] : "";
        $this->tallaService->save($talla, $descripcion, $idTalla);
    }
    
    private function _del() {
        $idTalla = isset($_POST["id"])? $_POST["id"] : 0;
        $this->tallaService->delete($idTalla);
    }
}
