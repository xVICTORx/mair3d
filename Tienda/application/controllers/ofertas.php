<?php


class Ofertas extends CI_Controller {

    private $productoService;
    private $categoriaService;
    private $subcategoriaService;
    private $producto_colorService;
    private $producto_tallaService;
    private $cartService;

    public function __construct() {
        parent::__construct();
        $this->productoService = new ProductoService();
        $this->categoriaService = new CategoriaService();
        $this->subcategoriaService = new SubCategoriaService();
        $this->producto_colorService = new Producto_ColorService();
        $this->producto_tallaService = new Producto_TallaService();
        $this->cartService = new CartService();
    }

    public function index() {
        $pagina = $this->uri->segment(3);
        $pagina = $pagina != false ? $pagina : 1;
        $grid = $this->productoService->loadShopProductosOfertasPaged("SI", "", "", "SI", "", "", "", "", "idProducto", ORDER_DESC, $pagina, 6);
        $vars = array();
        $vars["titulo"] = "Ofertas";
        $vars["totalPages"] = $grid->getTotal();
        $vars["module"] = "ofertas/index/";
        $vars["productos"] = $grid->getRows();
        $productos = $this->cartService->getContenido();
        $vars["productosCarrito"] = $productos;
        $vars["categoria"] = 0;
        $this->load->view("productos/ofertas_view", $vars);
    }
}

?>
