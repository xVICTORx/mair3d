<?php

/**
 * Description of listas
 *
 * @author Victor
 */
class Listas extends CI_Controller{
    
    private $categoriaService;
    private $subcategoriaService;
    private $colorService;
    private $tallaService;
    private $productoService;
    private $estatusService;
    private $clienteService;


    public function __construct() {
        parent::__construct();
        $this->categoriaService = new CategoriaService();
        $this->subcategoriaService = new SubCategoriaService();
        $this->colorService = new ColorService();
        $this->tallaService = new TallaService();
        $this->productoService = new ProductoService();
        $this->estatusService = new EstatusService();
        $this->clienteService = new ClienteService;
    }
    public function categorias() {
        $categorias = $this->categoriaService->getAll();
        $options = array();
        foreach($categorias as $key => $categoria){
            $options[$key] = new stdClass();
            $options[$key]->label = $categoria->getNombre();
            $options[$key]->value = $categoria->getIdCategoria();
        }
        $vars = array(
            "options" => $options
        );
        $this->load->view(VIEW_LISTA, $vars);
    }
    
    public function subcategorias() {
        $subcategorias = $this->subcategoriaService->getAll();
        $options = array();
        foreach($subcategorias as $key => $subcategoria){
			$categoria = $this->categoriaService->getById($subcategoria->getIdCategoria());
            $options[$key] = new stdClass();
            $options[$key]->label = $categoria->getNombre() . " - " .$subcategoria->getNombre();
            $options[$key]->value = $subcategoria->getIdSubCategoria();
        }
        $vars = array(
            "options" => $options
        );
        $this->load->view(VIEW_LISTA, $vars);
    }
    
    public function colores() {
        $colores = $this->colorService->getAll();
        
        $options = array();
        foreach($colores as $key => $color){
            $options[$key] = new stdClass();
            $options[$key]->label = $color->getNombre();
            $options[$key]->value = $color->getIdColor();
        }
        $vars = array(
            "options" => $options
        );
        $this->load->view(VIEW_LISTA, $vars);
    }
    
    public function tallas() {
        $tallas = $this->tallaService->getAll();
        
        
        $options = array();
        foreach($tallas as $key => $talla){
            $options[$key] = new stdClass();
            $options[$key]->label = $talla->getTalla();
            $options[$key]->value = $talla->getIdTalla();
        }
        $vars = array(
            "options" => $options
        );
        $this->load->view(VIEW_LISTA, $vars);
    }
    
    public function estatus() {
        $estatus = $this->estatusService->getAll();
        
        
        $options = array();
        foreach($estatus as $key => $esta){
            $options[$key] = new stdClass();
            $options[$key]->label = $esta->getNombre();
            $options[$key]->value = $esta->getIdEstatus();
        }
        $vars = array(
            "options" => $options
        );
        $this->load->view(VIEW_LISTA, $vars);
    }
    
    public function destacado() {
        $si = new stdClass();
        $si->label = "SI";
        $si->value = "SI";
        $no = new stdClass();
        $no->value = "NO";
        $no->label = "NO";
        $options = array($si, $no);
        $vars = array(
            "options" => $options
        );
        $this->load->view(VIEW_LISTA, $vars);
    }
    
    public function activo() {
        $si = new stdClass();
        $si->label = "SI";
        $si->value = "SI";
        $no = new stdClass();
        $no->value = "NO";
        $no->label = "NO";
        $options = array($si, $no);
        $vars = array(
            "options" => $options
        );
        $this->load->view(VIEW_LISTA, $vars);
    }
    
    public function productos() {
        $productos = $this->productoService->getAll();
        foreach($productos as $key => $producto) {
            $options[$key] = new stdClass();
            $options[$key]->label = $producto->getModelo();
            $options[$key]->value = $producto->getIdProducto();
        }
        $vars = array(
            "options" => $options
        );
        $this->load->view(VIEW_LISTA, $vars);
    }
    
    public function clientes() {
        $clientes = $this->clienteService->getAll();
        foreach($clientes as $key => $cliente) {
            $options[$key] = new stdClass();
            $options[$key]->label = $cliente->getNombre() . " " . $cliente->getApPaterno() . " " . $cliente->getApMaterno();
            $options[$key]->value = $cliente->getIdCliente();
        }
        $vars = array(
            "options" => $options
        );
        $this->load->view(VIEW_LISTA, $vars);
    }
}

?>
