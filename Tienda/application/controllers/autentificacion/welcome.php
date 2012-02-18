<?php

class Welcome extends CI_Controller {
    
    private $usuarioService;
    
    public function __construct() {
        parent::__construct();
        $this->usuarioService = new UsuarioService();
    }


    public function index() {
        $vars = array();
        $usuario = $this->usuarioService->getById($this->session->userdata("adminLoginId"));
        $vars["login"] = $usuario->getLogin();
        $vars["pass"] = $usuario->getPass();
        $this->load->view(VIEW_AUTENTIFICACION_WELCOME, $vars);
    }
    
    public function save() {
        $login = isset($_POST[TABLE_USUARIO_LOGIN])? $_POST[TABLE_USUARIO_LOGIN] : "";
        $pass = isset($_POST[TABLE_USUARIO_PASS])? $_POST[TABLE_USUARIO_PASS] : "";
        $this->usuarioService->save($login, $pass);
        $reponse = new stdClass();
        $reponse->mensaje = "Se guardo correctamente";
        echo json_encode($reponse);
    }
}

?>
