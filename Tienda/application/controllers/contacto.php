<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contacto
 *
 * @author Victor
 */
class Contacto extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->cartService = new CartService();
        $this->clienteService = new ClienteService();
    }
    
    public function index() {
        $productos = $this->cartService->getContenido();
        $vars["productos"] = $productos;
        $vars["categoria"] = 0;
        $this->load->view("contacto/welcome_view", $vars);
    }
    
}

?>
