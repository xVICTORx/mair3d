<?php

/**
 * Description of DaoTest
 *
 * @author Victor
 */
class DaoTest extends CI_Controller {
    
    private $usuarioDAO;
    
    public function __construct() {
        parent::__construct();
        $this->usuarioDAO = new UsuarioDaoImpl();
    }
    
    public function index() {
        echo anchor("test/daoTest/usuarioDAO", "Test del DAO de Usuarios");
    }
    
    public function usuarioDAO() {
        $resultado = $this->usuarioDAO->countAll();
        
        $vars = array();
        $vars["dao"] = "UsuarioDAO";
        
        $vars["pruebas"] = array();
        $vars["pruebas"][0] = new stdClass();
        $vars["pruebas"][0]->metodo = "countAll";
        $vars["pruebas"][0]->query = $this->db->last_query();
        $vars["pruebas"][0]->resultado = $resultado;
        
        $usuario = new Usuario(null, "Vi", "");
        $resultado = $this->usuarioDAO->countByExample($usuario);
        $vars["pruebas"][1] = new stdClass();
        $vars["pruebas"][1]->metodo = "countByExample";
        $vars["pruebas"][1]->query = $this->db->last_query();
        $vars["pruebas"][1]->resultado = $resultado;
        
        $resultado = $this->usuarioDAO->delete(1);
        $vars["pruebas"][2] = new stdClass();
        $vars["pruebas"][2]->metodo = "delete";
        $vars["pruebas"][2]->query = $this->db->last_query();
        $vars["pruebas"][2]->resultado = "No devuelve nada";
        
        $resultado = $this->usuarioDAO->getAll();
        $vars["pruebas"][3] = new stdClass();
        $vars["pruebas"][3]->metodo = "getAll";
        $vars["pruebas"][3]->query = $this->db->last_query();
        $vars["pruebas"][3]->resultado = $resultado;
        
        $this->load->view("test/daoTest", $vars);
    }
    
}

?>