<?php

class ClienteService extends CI_Model {

    private $clienteDao;

    public function __construct() {
        parent::__construct();
        $this->clienteDao = new ClienteDao();
    }

    public function save($idCliente, $login, $pass, $nombre, $apPaterno, $apMaterno, $nombreEmpresa, $telefono, $email, $razonSocial, $rfc, $calle, $numero, $colonia, $municipio, $estado, $cp, $email2, $calleEnvio, $numeroExtEnvio, $numeroIntEnvio, $coloniaEnvio, $municipioEnvio, $estadoEnvio, $cpEnvio) {
        $cliente = new Cliente($idCliente, $login, $pass, $nombre, $apPaterno, $apMaterno, $nombreEmpresa, $telefono, $email, $razonSocial, $rfc, $calle, $numero, $colonia, $municipio, $estado, $cp, $email2, $calleEnvio, $numeroExtEnvio, $numeroIntEnvio, $coloniaEnvio, $municipioEnvio, $estadoEnvio, $cpEnvio);
        $this->clienteDao->save($cliente);
        $this->session->set_userdata('idCliente', $cliente->getIdCliente());
        $this->session->set_userdata('login', $cliente->getLogin());
        $this->session->set_userdata('email', $cliente->getEmail());
        $this->session->set_userdata('email2', $cliente->getEmail2());
        $this->session->set_userdata('nombre', $cliente->getNombre());
        $this->session->set_userdata('apPaterno', $cliente->getApPaterno());
        $this->session->set_userdata('apMaterno', $cliente->getApMaterno());
    }

    public function login($login, $pass) {
        $cliente = $this->clienteDao->getByLogin($login);
        if ($cliente != null) {
            if ($cliente->getPass() == md5($pass)) {
                $response->estatus = 0;
                $response->mensaje = "Datos correctos";
                $this->session->set_userdata('idCliente', $cliente->getIdCliente());
                $this->session->set_userdata('login', $cliente->getLogin());
                $this->session->set_userdata('email', $cliente->getEmail());
                $this->session->set_userdata('email2', $cliente->getEmail2());
                $this->session->set_userdata('nombre', $cliente->getNombre());
                $this->session->set_userdata('apPaterno', $cliente->getApPaterno());
                $this->session->set_userdata('apMaterno', $cliente->getApMaterno());
            } else {
                $response->estatus = 1;
                $response->mensaje = "Datos incorrectos";
            }
        } else {
            $response->estatus = 1;
            $response->mensaje = "Datos incorrectos";
        }
        return $response;
    }

    public function logout() {
        $this->session->destroy();
    }

    public function getById($id) {
        return $this->clienteDao->getById($id);
    }

    public function loadClientesPaged($login, $nombre, $apPaterno, $apMaterno, $nombreEmpresa, $telefono, $email, $razonSocial, $rfc, $calle, $numero, $colonia, $municipio, $estado, $cp, $orderBy, $order, $page, $rows) {
        $cliente = new Cliente(null, $login, "", $nombre, $apPaterno, $apMaterno, $nombreEmpresa, $telefono, $email, $razonSocial, $rfc, $calle, $numero, $colonia, $municipio, $estado, $cp);

        $cuenta = $this->clienteDao->countByExample($cliente);

        $totalPages = $cuenta > 0 ? ceil($cuenta / $rows) : 0;
        $page = $page > $totalPages ? $totalPages : $page;
        $offset = $rows * $page - $rows;

        $clientes = $this->clienteDao->searchByExamplePaged($cliente, $orderBy, $order, $rows, $offset);

        $gridRows = array();
        foreach ($clientes as $key => $cliente) {
            $gridRows[$key] = array();
            $gridRows[$key]["id"] = $cliente->getIdCliente();
            $gridRows[$key]["nombre"] = $cliente->getNombre();
            $gridRows[$key]["apPaterno"] = $cliente->getApPaterno();
            $gridRows[$key]["apMaterno"] = $cliente->getApMaterno();
            $gridRows[$key]["nombreEmpresa"] = $cliente->getNombreEmpresa();
            $gridRows[$key]["telefono"] = $cliente->getTelefono();
            $gridRows[$key]["email"] = $cliente->getEmail();
            $gridRows[$key]["razonSocial"] = $cliente->getRazonSocial();
            $gridRows[$key]["rfc"] = $cliente->getRfc();
            $gridRows[$key]["calle"] = $cliente->getCalle();
            $gridRows[$key]["numero"] = $cliente->getNumero();
            $gridRows[$key]["colonia"] = $cliente->getColonia();
            $gridRows[$key]["municipio"] = $cliente->getMunicipio();
            $gridRows[$key]["estado"] = $cliente->getEstado();
            $gridRows[$key]["cp"] = $cliente->getCp();
            $gridRows[$key]["login"] = $cliente->getLogin();
            $gridRows[$key]["email2"] = $cliente->getEmail2();
            $gridRows[$key]["calleEnvio"] = $cliente->getCalleEnvio();
            $gridRows[$key]["numeroExtEnvio"] = $cliente->getNumeroExtEnvio();
            $gridRows[$key]["numeroIntEnvio"] = $cliente->getNumeroIntEnvio();
            $gridRows[$key]["coloniaEnvio"] = $cliente->getColoniaEnvio();
            $gridRows[$key]["municipioEnvio"] = $cliente->getMunicipioEnvio();
            $gridRows[$key]["estadoEnvio"] = $cliente->getEstadoEnvio();
            $gridRows[$key]["cpEnvio"] = $cliente->getCpEnvio();
        }

        $gridModel = new jqGridModel();
        $gridModel->rows = $gridRows;
        $gridModel->page = $page;
        $gridModel->records = count($gridRows);
        $gridModel->total = $totalPages;

        return $gridModel;
    }

    public function delete($idCliente) {
        $this->clienteDao->delete($idCliente);
    }

    public function getAll() {
        return $this->clienteDao->getAll();
    }

    public function validateLogin($login) {
        if ($this->clienteDao->validateLogin($login) == true) {
            $response->estatus = 0;
            $response->mensaje = "Correcto";
        } else {
            $response->estatus = 1;
            $response->mensaje = "Este nombre de usuario ya esta registrado";
        }
        return $response;
    }

}
