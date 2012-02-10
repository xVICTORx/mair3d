<?php

class Welcome extends CI_Controller {
    
    private $pedidosService;
    
    public function __construct() {
        parent::__construct();
        $this->pedidosService = new PedidosService();
    }
    
    public function index() {
        $vars = array();
        $this->load->view(VIEW_PEDIDOS_WELCOME, $vars);
    }
    
    public function operations() {
        $oper = isset($_POST["oper"]) ? $_POST["oper"] : "";
        $oper = $oper == "" ? $_GET["oper"] : $oper;
        switch ($oper) {
            case GRID_LOAD:
                $this->_load();
                break;
            case GRID_DEL:
                $this->_del();
                break;
            case GRID_EDIT: 
                $this->_edit();
                break;
        }
    }
    
    private function _load() {
        $idPedido = isset($_GET["id"])? $_GET["id"] : null;
        $idCliente = isset($_GET["idCliente"])? $_GET["idCliente"] : null;
        $idEstatus = isset($_GET["idEstatus"])? $_GET["idEstatus"] : null;
        $fecha = isset($_GET["fecha"])? $_GET["fecha"] : null;
        $response = $this->pedidosService->load($idPedido, $idCliente, $idEstatus, $fecha,  $_GET["sidx"], $_GET["sord"], $_GET["page"], $_GET["rows"]);
        echo json_encode($response);
    }
    
    private function _del() {
        $idPedido = isset($_POST["id"])? $_POST["id"] : null;
        $this->pedidosService->delete($idPedido);
    }
    
    public function loadProductos() {
        $idPedido = isset($_GET["id"])? $_GET["id"] : null;
        $response = $this->pedidosService->loadProductosByPedido($idPedido);
        echo json_encode($response);
    }
    
    public function _edit() {
        $idPedido = isset($_POST["id"])? $_POST["id"] : null;
        $idEstatus = isset($_POST[TABLE_PEDIDO_ID_ESTATUS])? $_POST[TABLE_PEDIDO_ID_ESTATUS] : null;
        $this->pedidosService->save($idPedido, $idEstatus);
    }
}