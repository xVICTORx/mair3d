<?php

class ProductoService extends CI_Model {

    private $productoDao;
    private $subcategoriaDao;
    private $categoriaDao;
    private $colorDao;

    public function __construct() {
        parent::__construct();
        $this->productoDao = new ProductoDao();
        $this->categoriaDao = new CategoriaDao();
        $this->subcategoriaDao = new SubcategoriaDao();
        $this->colorDao = new ColorDao();
    }

    public function loadProductosPaged($activo, $descripcion, $descuento, $destacado, $idColor, $idSubcategoria, $modelo, $precio, $orderBy, $order, $page, $rows) {

        $producto = new Producto(null,
                        $modelo,
                        $descripcion,
                        $idSubcategoria,
                        "",
                        $idColor,
                        $precio,
                        $destacado,
                        $descuento,
                        $activo);

        $cuenta = $this->productoDao->countByExample($producto);

        $totalPages = $cuenta > 0 ? ceil($cuenta / $rows) : 0;
        $page = $page > $totalPages ? $totalPages : $page;
        $offset = $rows * $page - $rows;

        $productos = $this->productoDao->searchByExamplePaged($producto, $orderBy, $order, $rows, $offset);

        $gridRows = array();
        foreach ($productos as $key => $producto) {
            $gridRows[$key] = array();
            $gridRows[$key]["id"] = $producto->getIdProducto();
            $gridRows[$key][TABLE_PRODUCTO_MODELO] = $producto->getModelo();
            $gridRows[$key][TABLE_PRODUCTO_DESCRIPCION] = $producto->getDescripcion();
            $subcategoria = $this->subcategoriaDao->getById($producto->getIdSubcategoria());
            if ($subcategoria != null) {
                $gridRows[$key][TABLE_PRODUCTO_ID_SUBCATEGORIA] = $subcategoria->getNombre();
            } else {
                $gridRows[$key][TABLE_PRODUCTO_ID_SUBCATEGORIA] = "";
            }
            $gridRows[$key][TABLE_PRODUCTO_PRECIO] = $producto->getPrecio();
            $gridRows[$key][TABLE_PRODUCTO_DESCUENTO] = $producto->getDescuento();
            $gridRows[$key][TABLE_PRODUCTO_DESTACADO] = $producto->getDestacado();
            $gridRows[$key][TABLE_PRODUCTO_ACTIVO] = $producto->getActivo();
            $color = $this->colorDao->getById($producto->getIdColor());
            if ($color != null) {
                $gridRows[$key][TABLE_PRODUCTO_ID_COLOR] = $color->getNombre();
            } else {
                $gridRows[$key][TABLE_PRODUCTO_ID_COLOR] = "";
            }
            $gridRows[$key]["subirImagenProducto"] = "";
            $gridRows[$key][TABLE_PRODUCTO_IMAGEN . "Producto"] = $producto->getImagen();
            if ($producto->getImagen() != "" && filter_var($producto->getImagen(), FILTER_VALIDATE_URL)) {
                $image_properties = array(
                    "src" => $producto->getImagen(),
                    "width" => "80",
                    "height" => "80",
                );
                $gridRows[$key]["imagenHtmlProducto"] = img($image_properties);
            } else {
                $gridRows[$key]["imagenHtmlProducto"] = "<strong>Imagen no disponible</strong>";
            }
        }

        $gridModel = new jqGridModel();
        $gridModel->rows = $gridRows;
        $gridModel->page = $page;
        $gridModel->records = count($gridRows);
        $gridModel->total = $totalPages;

        return $gridModel;
    }

    public function save($activo, $descripcion, $descuento, $destacado, $idColor, $idSubcategoria, $imagen, $modelo, $precio, $idProducto = null) {
        $producto = new Producto($idProducto, $modelo, $descripcion, $idSubcategoria, $imagen, $idColor, $precio, $destacado, $descuento, $activo);
        $this->productoDao->save($producto);
    }

    public function delete($idProducto) {
        $this->productoDao->delete($idProducto);
    }

    public function getAll() {
        return $this->productoDao->getAll();
    }

    public function getMenuNodes($getCategoria = 0) {
        $subcategorias = $this->subcategoriaDao->getAll();
        $menuNodes = array();
        $i = 1;
        foreach ($subcategorias as $subcategoria) {
            $categoria = $this->categoriaDao->getById($subcategoria->getIdCategoria());
            $flag = false;
            $j = $i;
            foreach ($menuNodes as $menuNode) {
                if ($menuNode["type"] == "categoria" && $menuNode["idTable"] == $categoria->getIdCategoria()) {
                    $flag = true;
                    $j = $menuNode["id"];
                }
            }
            if ($flag == false) {
                $menuNodes[$i] = array();
                $menuNodes[$i]["type"] = "categoria";
                $menuNodes[$i]["idTable"] = $categoria->getIdCategoria();
                $menuNodes[$i]["id"] = $i;
                $menuNodes[$i]["text"] = anchor(base_url(MODULE_PRODUCTOS_CATEGORIA . $categoria->getIdCategoria()), $categoria->getNombre());
                $menuNodes[$i]["level"] = 0;
                $menuNodes[$i]["idFather"] = "NULL";
                $menuNodes[$i]["isLeaf"] = "false";
                if($getCategoria == $categoria->getIdCategoria()) {
                    $menuNodes[$i]["expanded"] = "true";   
                } else  {
                    $menuNodes[$i]["expanded"] = "false";   
                }
                $menuNodes[$i]["loaded"] = "true";
                $i++;
            }
            $menuNodes[$i] = array();
            $menuNodes[$i]["type"] = "subcategoria";
            $menuNodes[$i]["id"] = $i;
            $menuNodes[$i]["text"] = anchor(base_url(MODULE_PRODUCTOS_SUBCATEGORIA . $subcategoria->getIdSubCategoria()), $subcategoria->getNombre());
            $menuNodes[$i]["level"] = 1;
            $menuNodes[$i]["idFather"] = $j;
            $menuNodes[$i]["isLeaf"] = "true";
            $menuNodes[$i]["expanded"] = "false";
            $menuNodes[$i]["loaded"] = "true";
            $i++;
        }
        return $menuNodes;
    }

    public function loadShopProductosPaged($activo, $descripcion, $descuento, $destacado, $idColor, $idSubcategoria, $modelo, $precio, $orderBy, $order, $page, $rows, $idCategoria = null) {

        $producto = new Producto(null,
                        $modelo,
                        $descripcion,
                        $idSubcategoria,
                        "",
                        $idColor,
                        $precio,
                        $destacado,
                        $descuento,
                        $activo);

        $cuenta = $this->productoDao->countByExample($producto);
        $totalPages = $cuenta > 0 ? ceil($cuenta / $rows) : 0;
        $page = $page > $totalPages ? $totalPages : $page;
        $offset = $rows * $page - $rows;
        if ($idCategoria != null) {
            $productos = $this->productoDao->searchByExamplePagedCategoria($idCategoria, $producto, $orderBy, $order, $rows, $offset);
        } else {
            $productos = $this->productoDao->searchByExamplePaged($producto, $orderBy, $order, $rows, $offset);
        }
        $gridRows = array();
        foreach ($productos as $key => $producto) {
            $subcategoria = $this->subcategoriaDao->getById($producto->getIdSubcategoria());
            $categoria = $this->categoriaDao->getById($subcategoria->getIdCategoria());
            $color = $this->colorDao->getById($producto->getIdColor());
            $gridRows[$key] = array();
            $gridRows[$key][TABLE_CATEGORIA] = ($categoria != null) ? anchor(MODULE_PRODUCTOS_CATEGORIA . $categoria->getIdCategoria(), $categoria->getNombre()) : "";
            $gridRows[$key][TABLE_PRODUCTO_ID_SUBCATEGORIA] = ($subcategoria != null) ? anchor(MODULE_PRODUCTOS_SUBCATEGORIA . $subcategoria->getIdSubCategoria(), $subcategoria->getNombre()) : "";
            $gridRows[$key][TABLE_PRODUCTO_MODELO] = anchor(base_url(MODULE_PRODUCTOS_VER . $producto->getIdProducto()), $producto->getModelo());
            $gridRows[$key][TABLE_PRODUCTO_DESCRIPCION] = $producto->getDescripcion();
            $gridRows[$key][TABLE_PRODUCTO_PRECIO] = $producto->getPrecio();
            $gridRows[$key][TABLE_PRODUCTO_DESCUENTO] = $producto->getDescuento();
            $gridRows[$key][TABLE_PRODUCTO_ACTIVO] = $producto->getActivo();
            $gridRows[$key]["precioFinal"] = $producto->getPrecio() - ($producto->getDescuento() * ($producto->getPrecio() / 100));
            $gridRows[$key][TABLE_PRODUCTO_ID_COLOR] = ($color != null) ? $color->getNombre() : "";
            if ($producto->getImagen() != "" && filter_var($producto->getImagen(), FILTER_VALIDATE_URL)) {
                $image_properties = array(
                    "src" => $producto->getImagen(),
                    "width" => "150",
                    "height" => "150",
                    "class" => "imagenProductoPreview ui-corner-all"
                );
                $imagenHTML = img($image_properties);
            } else {
                $imagenHTML = "<strong>Imagen no disponible</strong>";
            }
            $gridRows[$key]["imagenHtmlProducto"] = anchor(base_url(MODULE_PRODUCTOS_VER . $producto->getIdProducto()), $imagenHTML);
        }
        if ($idCategoria != null) {
            $cuenta = count($gridRows);
            $totalPages = $cuenta > 0 ? ceil($cuenta / $rows) : 0;
        }
        $gridModel = new jqGridModel();
        $gridModel->rows = $gridRows;
        $gridModel->page = $page;
        $gridModel->records = $cuenta;
        $gridModel->total = $totalPages;

        return $gridModel;
    }

    public function getById($idProducto) {
        return $this->productoDao->getById($idProducto);
    }

}
