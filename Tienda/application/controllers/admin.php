<?php

class Admin extends CI_Controller {
    
    private $usuarioService;

    public function __construct() {
        parent::__construct();
        $this->usuarioService = new UsuarioService();
    }

    public function tree() {
        $this->load->view(VIEW_ADMIN_TREE);
    }
    
    public function index() {
        $adminLoginId = $this->session->userdata("adminLoginId");
        if($adminLoginId == false){
            $this->load->view(VIEW_ADMIN_LOGIN);
        } else {
            $this->load->view(VIEW_ADMIN_WELCOME);   
        }
    }
    
    public function authenticate() {
        $login = isset($_POST[TABLE_USUARIO_LOGIN])? $_POST[TABLE_USUARIO_LOGIN] : "";
        $pass = isset($_POST[TABLE_USUARIO_PASS])? $_POST[TABLE_USUARIO_PASS] : "";
        echo json_encode($this->usuarioService->authenticate($login, $pass));
    }
    
    public function logOut() {
        $this->session->unset_userdata("adminLoginId");
        redirect(base_url("/admin"));
    }

}

?>
