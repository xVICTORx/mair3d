<?php

class productos extends CI_Controller {

    private $productoService;

    public function __construct() {
        parent::__construct();
        $this->productoService = new ProductoService();
    }

    public function index() {
        $this->load->view(VIEW_ADMIN_CATALOGO_PRODUCTO);
    }

    public function operations() {
        $oper = isset($_POST["oper"]) ? $_POST["oper"] : "";
        $oper = $oper == "" ? $_GET["oper"] : $oper;
        switch ($oper) {
            case GRID_LOAD:
                $this->_loadProducto();
                break;
            case GRID_ADD:
                $this->_addProducto();
                break;
            case GRID_EDIT:
                $this->_editProducto();
                break;
            case GRID_DEL:
                $this->_delProducto();
                break;
        }
    }

    private function _loadProducto() {
        $activo = isset($_GET[TABLE_PRODUCTO_ACTIVO]) ? $_GET[TABLE_PRODUCTO_ACTIVO] : "";
        $descripcion = isset($_GET[TABLE_PRODUCTO_DESCRIPCION]) ? $_GET[TABLE_PRODUCTO_DESCRIPCION] : "";
        $descuento = isset($_GET[TABLE_PRODUCTO_DESCUENTO]) ? $_GET[TABLE_PRODUCTO_DESCUENTO] : "";
        $destacado = isset($_GET[TABLE_PRODUCTO_DESTACADO]) ? $_GET[TABLE_PRODUCTO_DESTACADO] : "";
        $idColor = isset($_GET[TABLE_PRODUCTO_ID_COLOR]) ? $_GET[TABLE_PRODUCTO_ID_COLOR] : null;
        $idSubcategoria = isset($_GET[TABLE_PRODUCTO_ID_SUBCATEGORIA]) ? $_GET[TABLE_PRODUCTO_ID_SUBCATEGORIA] : null;
        $modelo = isset($_GET[TABLE_PRODUCTO_MODELO]) ? $_GET[TABLE_PRODUCTO_MODELO] : "";
        $precio = isset($_GET[TABLE_PRODUCTO_PRECIO]) ? $_GET[TABLE_PRODUCTO_PRECIO] : "";
        $response = $this->productoService->loadProductosPaged($activo, $descripcion, $descuento, $destacado, $idColor, $idSubcategoria, $modelo, $precio, $_GET["sidx"], $_GET["sord"], $_GET["page"], $_GET["rows"]);
        echo json_encode($response);
    }

    private function _addProducto() {
        $activo = isset($_POST[TABLE_PRODUCTO_ACTIVO]) ? $_POST[TABLE_PRODUCTO_ACTIVO] : "";
        $descripcion = isset($_POST[TABLE_PRODUCTO_DESCRIPCION]) ? $_POST[TABLE_PRODUCTO_DESCRIPCION] : "";
        $descuento = isset($_POST[TABLE_PRODUCTO_DESCUENTO]) ? $_POST[TABLE_PRODUCTO_DESCUENTO] : "";
        $destacado = isset($_POST[TABLE_PRODUCTO_DESTACADO]) ? $_POST[TABLE_PRODUCTO_DESTACADO] : "";
        $idColor = isset($_POST[TABLE_PRODUCTO_ID_COLOR]) ? $_POST[TABLE_PRODUCTO_ID_COLOR] : null;
        $idSubcategoria = isset($_POST[TABLE_PRODUCTO_ID_SUBCATEGORIA]) ? $_POST[TABLE_PRODUCTO_ID_SUBCATEGORIA] : null;
        $modelo = isset($_POST[TABLE_PRODUCTO_MODELO]) ? $_POST[TABLE_PRODUCTO_MODELO] : "";
        $precio = isset($_POST[TABLE_PRODUCTO_PRECIO]) ? $_POST[TABLE_PRODUCTO_PRECIO] : "";
        $imagen = isset($_POST[TABLE_PRODUCTO_IMAGEN . "Producto"]) ? $_POST[TABLE_PRODUCTO_IMAGEN . "Producto"] : "";

        $this->productoService->save($activo, $descripcion, $descuento, $destacado, $idColor, $idSubcategoria, $imagen, $modelo, $precio);
    }

    private function _editProducto() {
        $idProducto = isset($_POST["id"]) ? $_POST["id"] : "";
        $activo = isset($_POST[TABLE_PRODUCTO_ACTIVO]) ? $_POST[TABLE_PRODUCTO_ACTIVO] : "";
        $descripcion = isset($_POST[TABLE_PRODUCTO_DESCRIPCION]) ? $_POST[TABLE_PRODUCTO_DESCRIPCION] : "";
        $descuento = isset($_POST[TABLE_PRODUCTO_DESCUENTO]) ? $_POST[TABLE_PRODUCTO_DESCUENTO] : "";
        $destacado = isset($_POST[TABLE_PRODUCTO_DESTACADO]) ? $_POST[TABLE_PRODUCTO_DESTACADO] : "";
        $idColor = isset($_POST[TABLE_PRODUCTO_ID_COLOR]) ? $_POST[TABLE_PRODUCTO_ID_COLOR] : null;
        $idSubcategoria = isset($_POST[TABLE_PRODUCTO_ID_SUBCATEGORIA]) ? $_POST[TABLE_PRODUCTO_ID_SUBCATEGORIA] : null;
        $modelo = isset($_POST[TABLE_PRODUCTO_MODELO]) ? $_POST[TABLE_PRODUCTO_MODELO] : "";
        $precio = isset($_POST[TABLE_PRODUCTO_PRECIO]) ? $_POST[TABLE_PRODUCTO_PRECIO] : "";
        $imagen = isset($_POST["imagenProducto"]) ? $_POST["imagenProducto"] : "";
        $this->productoService->save($activo, $descripcion, $descuento, $destacado, $idColor, $idSubcategoria, $imagen, $modelo, $precio, $idProducto);
    }

    private function _delProducto() {
        $idProducto = isset($_POST["id"]) ? $_POST["id"] : "";
        $this->productoService->delete($idProducto);
    }

}

?>
