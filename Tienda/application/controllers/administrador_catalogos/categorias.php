<?php

/**
 * Controlador para el catalogo de categorias
 * 
 * @author Victor
 */
class Categorias extends CI_Controller {

    private $categoriaService;

    public function __construct() {
        parent::__construct();
        $this->categoriaService = new CategoriaService();
    }

    public function index() {
        $this->load->view(VIEW_ADMIN_CATALOGO_CATEGORIA);
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
        $nombre = isset($_GET[TABLE_CATEGORIA_NOMBRE]) ? $_GET[TABLE_CATEGORIA_NOMBRE] : "";
        $descripcion = isset($_GET[TABLE_CATEGORIA_DESCRIPCION]) ? $_GET[TABLE_CATEGORIA_DESCRIPCION] : "";
        $response = $this->categoriaService->loadCategoriaPaged($nombre, $descripcion, $_GET["sidx"], $_GET["sord"], $_GET["page"], $_GET["rows"]);
        echo json_encode($response);
    }

    private function _add() {
        $nombre = isset($_POST[TABLE_CATEGORIA_NOMBRE]) ? $_POST[TABLE_CATEGORIA_NOMBRE] : "";
        $descripcion = isset($_POST[TABLE_CATEGORIA_DESCRIPCION]) ? $_POST[TABLE_CATEGORIA_DESCRIPCION] : "";
        $this->categoriaService->save($nombre, $descripcion);
    }

    private function _edit() {
        $idCategoria = isset($_POST["id"]) ? $_POST["id"] : null;
        $nombre = isset($_POST[TABLE_CATEGORIA_NOMBRE]) ? $_POST[TABLE_CATEGORIA_NOMBRE] : "";
        $descripcion = isset($_POST[TABLE_CATEGORIA_DESCRIPCION]) ? $_POST[TABLE_CATEGORIA_DESCRIPCION] : "";
        $this->categoriaService->save($nombre, $descripcion, $idCategoria);
    }

    private function _del() {
        $idCategoria = isset($_POST["id"]) ? $_POST["id"] : 0;
        $this->categoriaService->delete($idCategoria);
    }

}