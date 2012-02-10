<?php

class Welcome extends CI_Controller {
    
    private $descuentoService;
    
    public function __construct() {
        parent::__construct();
        $this->descuentoService = new DescuentoService();
    }
    
    public function index() {
        $this->load->view(VIEW_DESCUENTOS_WELCOME);
    }
    
    public function operations() {
        $oper = isset($_POST["oper"]) ? $_POST["oper"] : "";
        $oper = $oper == "" ? $_GET["oper"] : $oper;
        switch ($oper) {
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
        $monto = isset($_GET["monto"]) ? $_GET["monto"] : "";
        $porcentaje = isset($_GET["porcentaje"]) ? $_GET["porcentaje"] : "";
        $response = $this->descuentoService->loadDescuentoPaged($monto, $porcentaje, $_GET["sidx"], $_GET["sord"], $_GET["page"], $_GET["rows"]);
        echo json_encode($response);
    }

    private function _add() {
        $monto = isset($_POST["monto"]) ? $_POST["monto"] : "";
        $porcentaje = isset($_POST["porcentaje"]) ? $_POST["porcentaje"] : "";
        $this->descuentoService->save($monto, $porcentaje);
    }

    private function _edit() {
        $idDescuento = isset($_POST["id"]) ? $_POST["id"] : null;
        $monto = isset($_POST["monto"]) ? $_POST["monto"] : "";
        $porcentaje = isset($_POST["porcentaje"]) ? $_POST["porcentaje"] : "";
        $this->descuentoService->save($monto, $porcentaje, $idPorcentaje);
    }

    private function _del() {
        $idDescuento = isset($_POST["id"]) ? $_POST["id"] : 0;
        $this->descuentoService->delete($idDescuento);
    }
}
