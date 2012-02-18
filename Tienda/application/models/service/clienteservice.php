<?php

class ClienteService extends CI_Model {

    private $clienteDao;

    public function __construct() {
        parent::__construct();
        $this->clienteDao = new ClienteDao();
    }

    public function save($idCliente, $nombre, $apPaterno, $apMaterno, $telefono, $calleNumero, $colonia, $municipio, $estado, $pais, $cp, $login, $password, $calleNumeroEnvio, $coloniaEnvio, $municipioEnvio, $estadoEnvio, $paisEnvio, $cpEnvio) {
        $cliente = new Cliente($idCliente, $nombre, $apPaterno, $apMaterno, $telefono, $calleNumero, $colonia, $municipio, $estado, $pais, $cp, $login, $password, $calleNumeroEnvio, $coloniaEnvio, $municipioEnvio, $estadoEnvio, $paisEnvio, $cpEnvio);
        $this->clienteDao->save($cliente);
        $this->session->set_userdata('idCliente', $cliente->getIdCliente());
        $this->session->set_userdata('login', $cliente->getLogin());
        $this->session->set_userdata('nombre', $cliente->getNombre());
        $this->session->set_userdata('apPaterno', $cliente->getApPaterno());
        $this->session->set_userdata('apMaterno', $cliente->getApMaterno());
    }

    public function login($login, $pass) {
        $cliente = $this->clienteDao->getByLogin($login);
        if ($cliente != null) {
            if ($cliente->getPassword() == md5($pass)) {
                $response->estatus = 0;
                $response->mensaje = "Datos correctos";
                $this->session->set_userdata('idCliente', $cliente->getIdCliente());
                $this->session->set_userdata('login', $cliente->getLogin());
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

    public function loadClientesPaged($nombre, $apPaterno, $apMaterno, $telefono, $calleNumero, $colonia, $municipio, $estado, $pais, $cp, $login, $orderBy, $order, $page, $rows) {
        $cliente = new Cliente(null, $nombre, $apPaterno, $apMaterno, $telefono, $calleNumero, $colonia, $municipio, $estado, $pais, $cp, $login, "");

        $cuenta = $this->clienteDao->countByExample($cliente);

        $totalPages = $cuenta > 0 ? ceil($cuenta / $rows) : 0;
        $page = $page > $totalPages ? $totalPages : $page;
        $offset = $rows * $page - $rows;

        $clientes = $this->clienteDao->searchByExamplePaged($cliente, $orderBy, $order, $rows, $offset);

        $gridRows = array();
        foreach ($clientes as $key => $cliente) {
            $gridRows[$key] = array();
            $gridRows[$key]["id"] = $cliente->getIdCliente();
            $gridRows[$key][TABLE_CLIENTE_NOMBRE] = $cliente->getNombre();
            $gridRows[$key][TABLE_CLIENTE_AP_MATERNO] = $cliente->getApMaterno();
            $gridRows[$key][TABLE_CLIENTE_AP_PATERNO] = $cliente->getApPaterno();
            $gridRows[$key][TABLE_CLIENTE_CALLE_NUMERO] = $cliente->getCalleNumero();
            $gridRows[$key][TABLE_CLIENTE_COLONIA] = $cliente->getColonia();
            $gridRows[$key][TABLE_CLIENTE_CP] = $cliente->getCp();
            $gridRows[$key][TABLE_CLIENTE_ESTADO] = $cliente->getEstado();
            $gridRows[$key][TABLE_CLIENTE_LOGIN] = $cliente->getLogin();
            $gridRows[$key][TABLE_CLIENTE_MUNICIPIO] = $cliente->getMunicipio();
            $gridRows[$key][TABLE_CLIENTE_PAIS] = $cliente->getPais();
            $gridRows[$key][TABLE_CLIENTE_TELEFONO] = $cliente->getTelefono();
            $gridRows[$key][TABLE_CLIENTE_CALLE_NUMERO_ENVIO] = $cliente->getCalleNumeroEnvio();
            $gridRows[$key]["otraDireccion"] = ($cliente->getCalleNumeroEnvio() != "")? "SI" : "NO";
            $gridRows[$key][TABLE_CLIENTE_COLONIA_ENVIO] = $cliente->getColoniaEnvio();
            $gridRows[$key][TABLE_CLIENTE_CP_ENVIO] = $cliente->getCpEnvio();
            $gridRows[$key][TABLE_CLIENTE_ESTADO_ENVIO] = $cliente->getEstadoEnvio();
            $gridRows[$key][TABLE_CLIENTE_MUNICIPIO_ENVIO] = $cliente->getMunicipioEnvio();
            $gridRows[$key][TABLE_CLIENTE_PAIS_ENVIO] = $cliente->getPaisEnvio();
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

    public function validateCorreo($correo) {
        if ($this->clienteDao->validateCorreo($correo) == true) {
            $response->estatus = 0;
            $response->mensaje = "Correcto";
        } else {
            $response->estatus = 1;
            $response->mensaje = "Este correo ya esta registrado";
        }
        return $response;
    }

}
