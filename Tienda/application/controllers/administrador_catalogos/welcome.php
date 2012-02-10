<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author Victor
 */
class Welcome extends CI_Controller {
    
    public function index() {
        $this->load->view(VIEW_ADMIN_CATALOGO_WELCOME);
    }
    
}

?>
