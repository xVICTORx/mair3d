<?php

class Producto_ColorService extends CI_Model {

    private $producto_colorDao;
    private $productoDao;
    private $colorDao;

    public function __construct() {
        parent::__construct();
        $this->producto_colorDao = new Producto_ColorDao();
        $this->productoDao = new ProductoDao();
        $this->colorDao = new ColorDao();
    }

    public function loadProducto_ColorPaged($idProducto, $idColor, $orderBy, $order, $page, $rows) {
        $producto_color = new Producto_Color($idColor, $idProducto);
        $cuenta = $this->producto_colorDao->countByExample($producto_color);

        $totalPages = $cuenta > 0 ? ceil($cuenta / $rows) : 0;
        $page = $page > $totalPages ? $totalPages : $page;
        $offset = $rows * $page - $rows;

        $producto_colores = $this->producto_colorDao->searchByExamplePaged($producto_color, $orderBy, $order, $rows, $offset);
        $gridRows = array();
        foreach ($producto_colores as $key => $producto_color) {
            $gridRows[$key] = array();
            $producto = $this->productoDao->getById($producto_color->getIdProducto());
            $color = $this->colorDao->getById($producto_color->getIdColor());
            $gridRows[$key]["id"] = $producto_color->getIdColor();
            $gridRows[$key][TABLE_PRODUCTO_COLOR_ID_COLOR] = $color->getNombre();
            $gridRows[$key]["subirImagenProductoColor"] = "";
            $gridRows[$key][TABLE_PRODUCTO_IMAGEN . "ProductoColor"] = $producto->getImagen();
            if ($producto_color->getImagen() != "" && filter_var($producto_color->getImagen(), FILTER_VALIDATE_URL)) {
                $image_properties = array(
                    "src" => $producto_color->getImagen(),
                    "width" => "80",
                    "height" => "70",
                );
                $gridRows[$key]["imagenHtmlProductoColor"] = img($image_properties);
            } else {
                $gridRows[$key]["imagenHtmlProductoColor"] = "<strong>Imagen no disponible</strong>";
            }
        }

        $gridModel = new jqGridModel();
        $gridModel->rows = $gridRows;
        $gridModel->page = $page;
        $gridModel->records = count($gridRows);
        $gridModel->total = $totalPages;

        return $gridModel;
    }

    public function save($idProducto, $idColor, $imagen) {
        $producto_color = new Producto_Color($idColor, $idProducto, $imagen);
        $this->producto_colorDao->save($producto_color);
    }

    public function delete($idProducto, $idColor) {
        $this->producto_colorDao->delete($idProducto, $idColor);
    }

    public function getColoresByProducto($idProducto) {
        $producto_colores = $this->producto_colorDao->getByProducto($idProducto);
        $producto = $this->productoDao->getById($idProducto);
        $color = $this->colorDao->getById($producto->getIdColor());
        $colorDefault = array();
        $colorDefault["idColor"] = $color->getIdColor();
        $colorDefault["nombre"] = $color->getNombre();
        $colorDefault["imagen"] = $producto->getImagen() != "" ? $producto->getImagen() : null;
        $colorDefault["imagenColor"] = $color->getImagen();
        $colores = array();
        array_push($colores, $colorDefault);
        foreach ($producto_colores as $key => $producto_color) {
            $color = $this->colorDao->getById($producto_color->getIdColor());
            $colores[$key + 1]["idColor"] = $color->getIdColor();
            $colores[$key + 1]["nombre"] = $color->getNombre();
            $imagen = $producto_color->getImagen();
            $colores[$key + 1]["indicador"] = false;
            $colores[$key + 1]["imagen"] = $imagen != "" ? $imagen : null;
            $colores[$key + 1]["imagenColor"] = $color->getImagen();
        }
        return $colores;
    }
    
    /**
     *
     * @param type $idColor
     * @param type $idProducto
     * @return Producto_Color 
     */
    public function getById($idColor, $idProducto) {
        return $this->producto_colorDao->getById($idProducto, $idColor);
    }

}