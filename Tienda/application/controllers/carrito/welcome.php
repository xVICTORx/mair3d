<?php

class Welcome extends CI_Controller {

    private $productoService;
    private $usuarioService;
    private $descuentoDao;
    private $cartService;

    public function __construct() {
        parent::__construct();
        $this->productoService = new ProductoService();
        $this->cartService = new CartService();
        $this->clienteService = new ClienteService();
        $this->descuentoDao = new DescuentoDao();
    }

    public function add() {
        $producto = $this->productoService->getById($_POST['idProducto']);
        $this->cartService->addProducto($_POST['idProducto'], $_POST['cantidad'], $producto->getDescripcion(), $_POST['precio'], $producto->getModelo(), $_POST['talla'], $_POST['color'], $_POST['idColor'], $_POST['idTalla'], $producto->getImagen());
    }

    public function load() {
        $vars = array();
        $vars["productos"] = $this->cartService->getContenido();
        $this->load->view(VIEW_CARRITO_LOAD, $vars);
    }

    public function index() {
        $vars = array();
        $vars["productos"] = $this->cartService->getContenido();
        $this->load->view(VIEW_CARRITO_WELCOME, $vars);
    }

    public function updateProducto() {
        $this->cartService->updateProducto($this->uri->segment(4), $_POST['cantidad']);
    }

    public function removeProducto() {
        $this->cartService->removeProducto($this->uri->segment(4));
        $this->load();
    }

    public function checkout() {
        if ($this->session->userdata("idCliente") == false) {
            $this->load->view(VIEW_CARRITO_LOGIN);
        } else {
            $vars = array();
            $vars["productos"] = $this->cartService->getContenido();
            $vars["cliente"] = $this->clienteService->getById($this->session->userdata("idCliente"));
            $subtotal = 0;
            foreach ($vars["productos"] as $key => $producto):
                $subtotal += $producto["price"] * $producto["qty"];
            endforeach;
            $descuento = $this->descuentoDao->getDescuetoMonto($subtotal);
            $vars["descuento"] = $descuento->getPorcentaje();
            $this->load->view(VIEW_CARRITO_CHECKOUT, $vars);
        }
    }


    public function process() {
        $this->cartService->process();
    }

}