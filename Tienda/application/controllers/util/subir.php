<?php

/**
 * Controlador para subir un archivo 
 * 
 
 */
class Subir extends CI_Controller {
    
    /**
     * La url que se mapea es
     * 
     *      http://host/tienda/index.php/util/subir/index/NOMBRE_CAMPO_ARCHIVO
     * 
     */
    public function index() {
        $config['upload_path'] = "resources/uploaded/";
        $config['allowed_types'] = "gif|jpg|png|jpeg";
        $config['max_size'] = "4096";
        $config['max_width'] = "0";
        $config['overwrite'] = true;
        $config['max_height'] = "0";
        $config['file_name'] = date("YmdHis") . $_FILES[$this->uri->segment(4)]["name"];
        
        $this->load->library('upload', $config);
        
        $response = new stdClass();
        if (!$this->upload->do_upload($this->uri->segment(4))) {
            $response->msg = "";
            $response->error = $this->upload->display_errors("","");
        } else {
            $data = $this->upload->data();
            $response->msg = base_url("resources/uploaded/" . $data["file_name"]);
            $response->error = '';
        }
        echo json_encode($response);
    }

}

?>
