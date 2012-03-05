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
        $nombre = isset($_GET["nombre"]) ? $_GET["nombre"] : "";
        $apPaterno = isset($_GET["apPaterno"]) ? $_GET["apPaterno"] : "";
        $apMaterno = isset($_GET["apMaterno"]) ? $_GET["apMaterno"] : "";
        $nombreEmpresa = isset($_GET["nombreEmpresa"]) ? $_GET["nombreEmpresa"] : "";
        $telefono = isset($_GET["telefono"]) ? $_GET["telefono"] : "";
        $email = isset($_GET["email"]) ? $_GET["email"] : "";
        $razonSocial = isset($_GET["razonSocial"]) ? $_GET["razonSocial"] : "";
        $rfc = isset($_GET["rfc"]) ? $_GET["rfc"] : "";
        $calle = isset($_GET["calle"]) ? $_GET["calle"] : "";
        $numero = isset($_GET["numero"]) ? $_GET["numero"] : "";
        $colonia = isset($_GET[TABLE_CLIENTE_COLONIA]) ? $_GET[TABLE_CLIENTE_COLONIA] : "";
        $municipio = isset($_GET[TABLE_CLIENTE_MUNICIPIO]) ? $_GET[TABLE_CLIENTE_MUNICIPIO] : "";
        $estado = isset($_GET[TABLE_CLIENTE_ESTADO]) ? $_GET[TABLE_CLIENTE_ESTADO] : "";
        $cp = isset($_GET[TABLE_CLIENTE_CP]) ? $_GET[TABLE_CLIENTE_CP] : "";
        $login = isset($_GET[TABLE_CLIENTE_LOGIN]) ? $_GET[TABLE_CLIENTE_LOGIN] : "";
        $response = $this->clienteService->loadClientesPaged($login, $nombre, $apPaterno, $apMaterno, $nombreEmpresa, $telefono, $email, $razonSocial, $rfc, $calle, $numero, $colonia, $municipio, $estado, $cp, $_GET["sidx"], $_GET["sord"], $_GET["page"], $_GET["rows"]);
        echo json_encode($response);
    }

    private function _del() {
        $idCliente = isset($_POST["id"]) ? $_POST["id"] : null;
        $this->clienteService->delete($idCliente);
    }

}