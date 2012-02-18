<?php


class Registro extends CI_Controller {
    
    private $cartService;
    private $clienteService;
    
    public function __construct() {
        parent::__construct();
        $this->cartService = new CartService();
        $this->clienteService = new ClienteService();
    }
    
    public function index() {
        $productos = $this->cartService->getContenido();
        $vars["productos"] = $productos;
        $vars["categoria"] = 0;
        $this->load->view(VIEW_REGISTRO_WELCOME, $vars);
    }
    
    public function nuevo() {
        $this->clienteService->save(null, $_POST["nombre"], $_POST["apPaterno"], $_POST["apMaterno"], $_POST["telefono"], $_POST["calle"], $_POST["colonia"], $_POST["municipio"], $_POST["estado"], $_POST["pais"], $_POST["cp"], $_POST["login"], md5($_POST["pass"]), $_POST["calleEnvio"], $_POST["coloniaEnvio"], $_POST["municipioEnvio"], $_POST["estadoEnvio"], $_POST["paisEnvio"], $_POST["cpEnvio"]);
        echo json_encode($this->clienteService->login($_POST["login"], $_POST["pass"]));
    }
    
    public function login() {
        $login = isset($_POST["login"])? $_POST["login"] : "";
        $pass = isset($_POST["pass"])? $_POST["pass"] : "";
        echo json_encode($this->clienteService->login($login, $pass));
    }
    
    public function logout() {
        $this->clienteService->logout();
    }
    
    public function checkCorreo() {
        $response = $this->clienteService->validateCorreo($_POST["correo"]);
        echo json_encode($response);
    }
}

?>
