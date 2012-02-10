<?php

/**
 * Controlador para el catalogo de colores
 * 
 * @author Victor
 */
class Colores extends CI_Controller {

    private $colorService;

    public function __construct() {
        parent::__construct();
        $this->colorService = new ColorService();
    }

    public function index() {
        $this->load->view(VIEW_ADMIN_CATALOGO_COLOR);
    }

    public function operations() {
        $oper = isset($_POST["oper"]) ? $_POST["oper"] : "";
        $oper = $oper == "" ? $_GET["oper"] : $oper;
        switch ($oper) {
            case GRID_LOAD:
                $this->_load();
                break;
            case GRID_ADD:
                $this->_add();
                break;
            case GRID_EDIT:
                $this->_edit();
                break;
            case GRID_DEL:
                $this->_del();
                break;
        }
    }

    private function _load() {
        $nombre = isset($_GET[TABLE_COLOR_NOMBRE]) ? $_GET[TABLE_COLOR_NOMBRE] : "";
        $descripcion = isset($_GET[TABLE_COLOR_DESCRIPCION]) ? $_GET[TABLE_COLOR_DESCRIPCION] : "";
        $response = $this->colorService->loadColoresPaged($nombre, $descripcion, $_GET["sidx"], $_GET["sord"], $_GET["page"], $_GET["rows"]);
        echo json_encode($response);
    }

    private function _add() {
        $nombre = isset($_POST[TABLE_COLOR_NOMBRE]) ? $_POST[TABLE_COLOR_NOMBRE] : "";
        $descripcion = isset($_POST[TABLE_COLOR_DESCRIPCION]) ? $_POST[TABLE_COLOR_DESCRIPCION] : "";
        $imagen = isset($_POST["imagenColor"]) ? $_POST["imagenColor"] : "";
        $this->colorService->save($nombre, $imagen, $descripcion);
    }

    private function _edit() {
        $idColor = isset($_POST["id"]) ? $_POST["id"] : null;
        $nombre = isset($_POST[TABLE_COLOR_NOMBRE]) ? $_POST[TABLE_COLOR_NOMBRE] : "";
        $descripcion = isset($_POST[TABLE_COLOR_DESCRIPCION]) ? $_POST[TABLE_COLOR_DESCRIPCION] : "";
        $imagen = isset($_POST[TABLE_COLOR_IMAGEN . "Color"]) ? $_POST[TABLE_COLOR_IMAGEN . "Color"] : "";
        $this->colorService->save($nombre, $imagen, $descripcion, $idColor);
    }

    private function _del() {
        $idColor = isset($_POST["id"]) ? $_POST["id"] : 0;
        $this->colorService->delete($idColor);
    }

}