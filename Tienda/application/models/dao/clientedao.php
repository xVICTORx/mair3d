<?php


class ClienteDao extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function countAll() {
        $query = $this->db->get(TABLE_CLIENTE);
        return count($query->result());
    }
    
    public function countByExample($cliente) {
        return count($this->searchByExample($cliente));
    }
    
    
    public function delete($id) {
        $this->db->where(TABLE_CLIENTE_ID_CLIENTE, $id);
        $this->db->delete(TABLE_CLIENTE);
    }
    
    public function getAll() {
        $query = $this->db->get(TABLE_CLIENTE);
        return $this->_getResult($query->result());
    }
    
    public function getById($id) {
        $this->db->where(TABLE_CLIENTE_ID_CLIENTE, $id);
        $query = $this->db->get(TABLE_CLIENTE);
        $clientes = $this->_getResult($query->result());
        if(count($clientes > 0)){
            return $clientes[0];
        } else {
            return null;
        }
    }
    
    public function getByLogin($login) {
        $this->db->where(TABLE_CLIENTE_LOGIN, $login);
        $query = $this->db->get(TABLE_CLIENTE);
        $clientes = $this->_getResult($query->result());
        if(count($clientes) > 0){
            return $clientes[0];
        } else {
            return null;
        }
    }
    
    public function save(Cliente $cliente) {
        $params = array(
            TABLE_CLIENTE_AP_MATERNO => $cliente->getApMaterno(),
            TABLE_CLIENTE_AP_PATERNO => $cliente->getApPaterno(),
            TABLE_CLIENTE_CALLE_NUMERO => $cliente->getCalleNumero(),
            TABLE_CLIENTE_COLONIA => $cliente->getColonia(),
            TABLE_CLIENTE_CP => $cliente->getCp(),
            TABLE_CLIENTE_ESTADO => $cliente->getEstado(),
            TABLE_CLIENTE_LOGIN => $cliente->getLogin(),
            TABLE_CLIENTE_MUNICIPIO => $cliente->getMunicipio(),
            TABLE_CLIENTE_NOMBRE => $cliente->getNombre(),
            TABLE_CLIENTE_PAIS => $cliente->getPais(),
            TABLE_CLIENTE_PASS => $cliente->getPassword(),
            TABLE_CLIENTE_TELEFONO => $cliente->getTelefono(),
        );
        
        if($cliente->getIdCliente() == null){
            $this->db->insert(TABLE_CLIENTE, $params);
        } else {
            $this->db->where(TABLE_CLIENTE_ID_CLIENTE, $cliente->getIdCliente());
            $this->db->update(TABLE_CLIENTE, $params);
        }
    }
    
    public function searchByExample(Cliente $cliente) {
        $this->db->like(TABLE_CLIENTE_AP_MATERNO, $cliente->getApMaterno(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_AP_PATERNO, $cliente->getApPaterno(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_CALLE_NUMERO, $cliente->getCalleNumero(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_COLONIA, $cliente->getColonia(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_CP, $cliente->getCp(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_ESTADO, $cliente->getEstado(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_LOGIN, $cliente->getLogin(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_MUNICIPIO, $cliente->getMunicipio(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_NOMBRE, $cliente->getNombre(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_PAIS, $cliente->getPais(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_PASS, $cliente->getPassword(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_TELEFONO, $cliente->getTelefono(), ORDER_ASC);
        
        $query = $this->db->get(TABLE_CLIENTE);
        return $this->_getResult($query->result());
    }
    
    public function searchByExamplePaged($cliente, $orderBy = "idCliente", $order = "asc", $limit = 20, $offset = 0) {
        $this->db->like(TABLE_CLIENTE_AP_MATERNO, $cliente->getApMaterno(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_AP_PATERNO, $cliente->getApPaterno(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_CALLE_NUMERO, $cliente->getCalleNumero(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_COLONIA, $cliente->getColonia(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_CP, $cliente->getCp(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_ESTADO, $cliente->getEstado(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_LOGIN, $cliente->getLogin(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_MUNICIPIO, $cliente->getMunicipio(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_NOMBRE, $cliente->getNombre(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_PAIS, $cliente->getPais(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_PASS, $cliente->getPassword(), ORDER_ASC);
        $this->db->like(TABLE_CLIENTE_TELEFONO, $cliente->getTelefono(), ORDER_ASC);
        $this->db->order_by($orderBy, $order);
        
        $query = $this->db->get(TABLE_CLIENTE, $limit, $offset);
        return $this->_getResult($query->result());
    }
    
    private function _getResult($result) {
        $clientes = array();
        foreach($result as $key => $row){
            $clientes[$key] = new Cliente($row->idCliente, $row->nombre, $row->apPaterno, $row->apMaterno, $row->telefono, $row->calleNumero, $row->colonia, $row->municipio, $row->estado, $row->pais, $row->cp, $row->login, $row->pass);
        }
        return $clientes;
    }
    
    public function validateCorreo($correo) {
        $this->db->where("login", $correo);
        $query = $this->db->get("cliente");
        $clientes = $this->_getResult($query->result());
        if(count($clientes) > 0) {
            return false;
        } else {
            return true;
        }
    }
}
