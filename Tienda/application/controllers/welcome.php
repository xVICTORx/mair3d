<?php

class Welcome extends CI_Controller {

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

    public function tree() {
        $vars = array();
        if (isset($_GET["categoria"])) {
            $vars["menuNodes"] = $this->productoService->getMenuNodes($_GET["categoria"]);
        } else {
            $vars["menuNodes"] = $this->productoService->getMenuNodes();
        }
        $this->load->view(VIEW_PRODUCTOS_TREE, $vars);
    }

    public function index() {
        $pagina = $this->uri->segment(3);
        $pagina = $pagina != false ? $pagina : 1;
        $grid = $this->productoService->loadShopProductosPaged("SI", "", "", "SI", "", "", "", "", "idProducto", ORDER_DESC, $pagina, 6);
        $vars = array();
        $vars["titulo"] = "Productos destacados";
        $vars["totalPages"] = $grid->getTotal();
        $vars["module"] = MODULE_PRODUCTOS;
        $vars["productos"] = $grid->getRows();
        $productos = $this->cartService->getContenido();
        $vars["productosCarrito"] = $productos;
        $vars["categoria"] = 0;
        $this->load->view(VIEW_PRODUCTOS_WELCOME, $vars);
    }

    public function categoria() {
        $idCategoria = $this->uri->segment(3);
        $pagina = $this->uri->segment(4);
        $pagina = $pagina != false ? $pagina : 1;
        if ($idCategoria && is_numeric($idCategoria)) {
            $categoria = $this->categoriaService->getById($idCategoria);
            $grid = $this->productoService->loadShopProductosPaged("SI", "", "", "SI", "", "", "", "", "idProducto", ORDER_DESC, $pagina, 12, $idCategoria);
            $vars = array();
            $vars["productos"] = $grid->getRows();
            $vars["totalPages"] = $grid->getTotal();
            $vars["module"] = MODULE_PRODUCTOS_CATEGORIA . $idCategoria . "/";
            $vars["titulo"] = "Productos destacados en la categoria " . $categoria->getNombre();
            $productos = $this->cartService->getContenido();
            $vars["productosCarrito"] = $productos;
            $vars["categoria"] = $idCategoria;
            $this->load->view(VIEW_PRODUCTOS_WELCOME, $vars);
        }
    }

    public function subCategoria() {
        $idSubcategoria = $this->uri->segment(3);
        $pagina = $this->uri->segment(4);
        $pagina = $pagina != false ? $pagina : 1;
        if ($idSubcategoria) {
            $subcategoria = $this->subcategoriaService->getById($idSubcategoria);
            $categoria = $this->categoriaService->getById($subcategoria->getIdCategoria());
            $grid = $this->productoService->loadShopProductosPaged("SI", "", "", "", "", $idSubcategoria, "", "", "idProducto", ORDER_DESC, $pagina, 12, null);
            $vars = array();
            $vars["productos"] = $grid->getRows();
            $vars["totalPages"] = $grid->getTotal();
            $vars["module"] = MODULE_PRODUCTOS_SUBCATEGORIA . $idSubcategoria . "/";
            $vars["titulo"] = "Productos en la subcategoria " . $categoria->getNombre() . " - " . $subcategoria->getNombre();
            $productos = $this->cartService->getContenido();
            $vars["productosCarrito"] = $productos;
            $vars["categoria"] = $categoria->getIdCategoria();
            $this->load->view(VIEW_PRODUCTOS_WELCOME, $vars);
        }
    }

    public function ver() {
        $vars = array();
        $idProducto = $this->uri->segment(3);
        $producto = $this->productoService->getById($idProducto);
        if ($producto != null) {
            $subcategoria = $this->subcategoriaService->getById($producto->getIdSubcategoria());
            $categoria = $this->categoriaService->getById($subcategoria->getIdCategoria());
            $vars["titulo"] = $categoria->getNombre() . " - " . $subcategoria->getNombre() . " - " . $producto->getModelo();
            $vars["idProducto"] = $producto->getIdProducto();
            $vars["modelo"] = $producto->getModelo();
            $vars["descripcion"] = $producto->getDescripcion();
            $vars["precio"] = $producto->getPrecio();
            $vars["descuento"] = $producto->getDescuento();
            $vars["categoria"] = anchor(base_url(MODULE_PRODUCTOS_CATEGORIA . $categoria->getIdCategoria()), $categoria->getNombre());
            $vars["subcategoria"] = anchor(base_url(MODULE_PRODUCTOS_SUBCATEGORIA . $subcategoria->getIdSubcategoria()), $subcategoria->getNombre());
            $vars["precioFinal"] = $producto->getPrecio() - ($producto->getPrecio() * ($producto->getDescuento() / 100));
            if ($producto->getImagen() != "" && filter_var($producto->getImagen(), FILTER_VALIDATE_URL)) {
                $image_properties = array(
                    "src" => $producto->getImagen(),
                    "width" => "350",
                    "height" => "auto",
                    "class" => "imagenProductoGrande ui-corner-all"
                );
                $vars["imagenProducto"] = img($image_properties);
            } else {
                $vars["imagenProducto"] = "<strong>Imagen no disponible</strong>";
            }
            $colores = $this->producto_colorService->getColoresByProducto($producto->getIdProducto());
            $vars["colores"] = array();
            foreach ($colores as $key => $color) {
                $vars["colores"][$key] = array();
                if ($color["imagen"] != null) {
                    $image_properties = array(
                        "src" => $color["imagen"],
                        "width" => "80",
                        "height" => "80",
                        "class" => "imagenColorAgrandable ui-corner-all"
                    );
                    $vars["colores"][$key]["imagen"] = img($image_properties);
                } else {
                    $vars["colores"][$key]["imagen"] = null;
                }
                $image_properties = array(
                    "src" => $color["imagenColor"],
                    "width" => "40",
                    "height" => "20",
                    "alt" => $color["nombre"]
                );
                $vars["categoria"] = $categoria->getIdCategoria();
                $vars["colores"][$key]["imagenLink"] = $color["imagen"];
                $vars["colores"][$key]["imagenColor"] = img($image_properties);
                $vars["colores"][$key]["idColor"] = $color["idColor"];
                $vars["colores"][$key]["nombre"] = $color["nombre"];
            }
            $vars["tallas"] = $this->producto_tallaService->getTallasByProducto($idProducto);
            $productos = $this->cartService->getContenido();
            $vars["productos"] = $productos;
            $this->load->view(VIEW_PRODUCTOS_VER, $vars);
        }
    }

    public function buscar() {
        $term = urldecode($this->uri->segment(3));
        $page = $this->uri->segment(4);
        $response = $this->productoService->searchByTerm($term, $page, 6);
        $vars["productos"] = $response["productos"];
        $vars["totalPages"] = $response["totalPages"];
        $vars["module"] = "welcome/buscar/". $term . "/";
        $vars["titulo"] = "Busqueda " . $term;
        $productos = $this->cartService->getContenido();
        $vars["productosCarrito"] = $productos;
        $vars["categoria"] = 0;
        $this->load->view(VIEW_PRODUCTOS_WELCOME, $vars);
    }

}
