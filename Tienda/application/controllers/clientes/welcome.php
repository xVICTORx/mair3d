<?php

class Welcome extends CI_Controller {

    private $clienteService;

    public function __construct() {
        parent::__construct();
        $this->clienteService = new ClienteService();
    }

    public function index() {
        $vars = array();
        $this->load->view(VIEW_CLIENTES_WELCOME, $vars);
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
        $nombre = isset($_GET[TABLE_CLIENTE_NOMBRE]) ? $_GET[TABLE_CLIENTE_NOMBRE] : "";
        $apPaterno = isset($_GET[TABLE_CLIENTE_AP_PATERNO]) ? $_GET[TABLE_CLIENTE_AP_PATERNO] : "";
        $apMaterno = isset($_GET[TABLE_CLIENTE_AP_MATERNO]) ? $_GET[TABLE_CLIENTE_AP_MATERNO] : "";
        $telefono = isset($_GET[TABLE_CLIENTE_TELEFONO]) ? $_GET[TABLE_CLIENTE_TELEFONO] : "";
        $calleNumero = isset($_GET[TABLE_CLIENTE_CALLE_NUMERO]) ? $_GET[TABLE_CLIENTE_CALLE_NUMERO] : "";
        $colonia = isset($_GET[TABLE_CLIENTE_COLONIA]) ? $_GET[TABLE_CLIENTE_COLONIA] : "";
        $municipio = isset($_GET[TABLE_CLIENTE_MUNICIPIO]) ? $_GET[TABLE_CLIENTE_MUNICIPIO] : "";
        $estado = isset($_GET[TABLE_CLIENTE_ESTADO]) ? $_GET[TABLE_CLIENTE_ESTADO] : "";
        $pais = isset($_GET[TABLE_CLIENTE_PAIS]) ? $_GET[TABLE_CLIENTE_PAIS] : "";
        $cp = isset($_GET[TABLE_CLIENTE_CP]) ? $_GET[TABLE_CLIENTE_CP] : "";
        $login = isset($_GET[TABLE_CLIENTE_LOGIN]) ? $_GET[TABLE_CLIENTE_LOGIN] : "";
        $response = $this->clienteService->loadClientesPaged($nombre, $apPaterno, $apMaterno, $telefono, $calleNumero, $colonia, $municipio, $estado, $pais, $cp, $login, $_GET["sidx"], $_GET["sord"], $_GET["page"], $_GET["rows"]);
        echo json_encode($response);
    }

    private function _del() {
        $idCliente = isset($_POST["id"]) ? $_POST["id"] : null;
        $this->clienteService->delete($idCliente);
    }

}