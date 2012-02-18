<?php

class Quienes extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->cartService = new CartService();
        $this->clienteService = new ClienteService();
    }
    
    public function index() {
        $productos = $this->cartService->getContenido();
        $vars["productos"] = $productos;
        $vars["categoria"] = 0;
        $this->load->view("quienes/welcome_view", $vars);
    }
    
}

?>
