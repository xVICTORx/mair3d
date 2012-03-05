<?php

class ClienteDao extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function countAll() {
        $query = $this->db->get("cliente");
        return count($query->result());
    }

    public function countByExample($cliente) {
        return count($this->searchByExample($cliente));
    }

    public function delete($id) {
        $this->db->where("idCliente", $id);
        $this->db->delete("cliente");
    }

    public function getAll() {
        $query = $this->db->get("cliente");
        return $this->_getResult($query->result());
    }

    public function getById($id) {
        $this->db->where("idCliente", $id);
        $query = $this->db->get("cliente");
        $clientes = $this->_getResult($query->result());
        if (count($clientes > 0)) {
            return $clientes[0];
        } else {
            return null;
        }
    }

    public function getByLogin($login) {
        $this->db->where("login", $login);
        $query = $this->db->get("cliente");
        $clientes = $this->_getResult($query->result());
        if (count($clientes) > 0) {
            return $clientes[0];
        } else {
            return null;
        }
    }

    public function save(Cliente $cliente) {
        $params = array(
            "login" => $cliente->getLogin(),
            "pass" => $cliente->getPass(),
            "nombre" => $cliente->getNombre(),
            "apPaterno" => $cliente->getApPaterno(),
            "apMaterno" => $cliente->getApMaterno(),
            "nombreEmpresa" => $cliente->getNombreEmpresa(),
            "telefono" => $cliente->getTelefono(),
            "email" => $cliente->getEmail(),
            "razonSocial" => $cliente->getRazonSocial(),
            "rfc" => $cliente->getRfc(),
            "calle" => $cliente->getCalle(),
            "numero" => $cliente->getNumero(),
            "colonia" => $cliente->getColonia(),
            "municipio" => $cliente->getMunicipio(),
            "estado" => $cliente->getEstado(),
            "cp" => $cliente->getCp(),
            "email2" => $cliente->getEmail2(),
            "calleEnvio" => $cliente->getCalleEnvio(),
            "numeroExtEnvio" => $cliente->getNumeroExtEnvio(),
            "numeroIntEnvio" => $cliente->getNumeroIntEnvio(),
            "coloniaEnvio" => $cliente->getColoniaEnvio(),
            "municipioEnvio" => $cliente->getMunicipioEnvio(),
            "estadoEnvio" => $cliente->getEstadoEnvio(),
            "cpEnvio" => $cliente->getCpEnvio()
        );

        if ($cliente->getIdCliente() == null) {
            $this->db->insert("cliente", $params);
        } else {
            $this->db->where("idCliente", $cliente->getIdCliente());
            $this->db->update("cliente", $params);
        }
    }

    public function searchByExample(Cliente $cliente) {
        $this->db->like("login", $cliente->getLogin(), ORDER_ASC);
        $this->db->like("pass", $cliente->getPass(), ORDER_ASC);
        $this->db->like("nombre", $cliente->getNombre(), ORDER_ASC);
        $this->db->like("apPaterno", $cliente->getApPaterno(), ORDER_ASC);
        $this->db->like("apMaterno", $cliente->getApMaterno(), ORDER_ASC);
        $this->db->like("nombreEmpresa", $cliente->getNombreEmpresa(), ORDER_ASC);
        $this->db->like("telefono", $cliente->getTelefono(), ORDER_ASC);
        $this->db->like("email", $cliente->getEmail(), ORDER_ASC);
        $this->db->like("razonSocial", $cliente->getRazonSocial(), ORDER_ASC);
        $this->db->like("rfc", $cliente->getRfc(), ORDER_ASC);
        $this->db->like("calle", $cliente->getCalle(), ORDER_ASC);
        $this->db->like("numero", $cliente->getNumero(), ORDER_ASC);
        $this->db->like("colonia", $cliente->getColonia(), ORDER_ASC);
        $this->db->like("municipio", $cliente->getMunicipio(), ORDER_ASC);
        $this->db->like("estado", $cliente->getEstado(), ORDER_ASC);
        $this->db->like("cp", $cliente->getCp(), ORDER_ASC);
        $this->db->like("email2", $cliente->getEmail2(), ORDER_ASC);
        $this->db->like("calleEnvio", $cliente->getCalle(), ORDER_ASC);
        $this->db->like("numeroExtEnvio", $cliente->getNumeroExtEnvio(), ORDER_ASC);
        $this->db->like("numeroIntEnvio", $cliente->getNumeroIntEnvio(), ORDER_ASC);
        $this->db->like("coloniaEnvio", $cliente->getColoniaEnvio(), ORDER_ASC);
        $this->db->like("municipioEnvio", $cliente->getMunicipioEnvio(), ORDER_ASC);
        $this->db->like("estadoEnvio", $cliente->getEstadoEnvio(), ORDER_ASC);
        $this->db->like("cpEnvio", $cliente->getCpEnvio(), ORDER_ASC);

        $query = $this->db->get("cliente");
        return $this->_getResult($query->result());
    }

    public function searchByExamplePaged($cliente, $orderBy = "idCliente", $order = "asc", $limit = 20, $offset = 0) {
        $this->db->like("login", $cliente->getLogin(), $order);
        $this->db->like("pass", $cliente->getPass(), $order);
        $this->db->like("nombre", $cliente->getNombre(), $order);
        $this->db->like("apPaterno", $cliente->getApPaterno(), $order);
        $this->db->like("apMaterno", $cliente->getApMaterno(), $order);
        $this->db->like("nombreEmpresa", $cliente->getNombreEmpresa(), $order);
        $this->db->like("telefono", $cliente->getTelefono(), $order);
        $this->db->like("email", $cliente->getEmail(), $order);
        $this->db->like("razonSocial", $cliente->getRazonSocial(), $order);
        $this->db->like("rfc", $cliente->getRfc(), $order);
        $this->db->like("calle", $cliente->getCalle(), $order);
        $this->db->like("numero", $cliente->getNumero(), $order);
        $this->db->like("colonia", $cliente->getColonia(), $order);
        $this->db->like("municipio", $cliente->getMunicipio(), $order);
        $this->db->like("estado", $cliente->getEstado(), $order);
        $this->db->like("cp", $cliente->getCp(), $order);
        $this->db->like("email2", $cliente->getEmail2(), $order);
        $this->db->like("calleEnvio", $cliente->getCalle(), $order);
        $this->db->like("numeroExtEnvio", $cliente->getNumeroExtEnvio(), $order);
        $this->db->like("numeroIntEnvio", $cliente->getNumeroIntEnvio(), $order);
        $this->db->like("coloniaEnvio", $cliente->getColoniaEnvio(), $order);
        $this->db->like("municipioEnvio", $cliente->getMunicipioEnvio(), $order);
        $this->db->like("estadoEnvio", $cliente->getEstadoEnvio(), $order);
        $this->db->like("cpEnvio", $cliente->getCpEnvio(), $order);
        $this->db->order_by($orderBy, $order);

        $query = $this->db->get("cliente", $limit, $offset);
        return $this->_getResult($query->result());
    }

    private function _getResult($result) {
        $clientes = array();
        foreach ($result as $key => $row) {
            $clientes[$key] = new Cliente($row->idCliente, $row->login, $row->pass, $row->nombre, $row->apPaterno, $row->apMaterno, $row->nombreEmpresa, $row->telefono, $row->email, $row->razonSocial, $row->rfc, $row->calle, $row->numero, $row->colonia, $row->municipio, $row->estado, $row->cp, $row->email2, $row->calleEnvio, $row->numeroExtEnvio, $row->numeroIntEnvio, $row->coloniaEnvio, $row->municipioEnvio, $row->estadoEnvio, $row->cpEnvio);
        }
        return $clientes;
    }

    public function validateLogin($login) {
        $this->db->where("login", $login);
        $query = $this->db->get("cliente");
        $clientes = $this->_getResult($query->result());
        if (count($clientes) > 0) {
            return false;
        } else {
            return true;
        }
    }

}
