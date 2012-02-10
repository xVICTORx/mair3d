<?php

/**
 * Controlador para el catalogo de categorias
 * 
 * @author Victor
 */
class Subcategorias extends CI_Controller {
    
    private $subcategoriaService;
    
    public function __construct() {
        parent::__construct();
        $this->subcategoriaService = new SubCategoriaService();
    }
    
    public function index() {
        $this->load->view(VIEW_ADMIN_CATALOGO_SUBCATEGORIA);
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
        $nombre = isset($_GET[TABLE_SUBCATEGORIA_NOMBRE])? $_GET[TABLE_SUBCATEGORIA_NOMBRE] : "";
        $descripcion = isset($_GET[TABLE_SUBCATEGORIA_DESCRIPCION])? $_GET[TABLE_SUBCATEGORIA_DESCRIPCION] : "";
        $idCategoria = isset($_GET[TABLE_SUBCATEGORIA_ID_CATEGORIA])? $_GET[TABLE_SUBCATEGORIA_ID_CATEGORIA] : null;
        $response = $this->subcategoriaService->loadSubcategoriaPaged($nombre, $descripcion, $idCategoria, $_GET["sidx"], $_GET["sord"], $_GET["page"], $_GET["rows"]);
        echo json_encode($response);
    }
    
    private function _add() {
        $nombre = isset($_POST[TABLE_SUBCATEGORIA_NOMBRE])? $_POST[TABLE_SUBCATEGORIA_NOMBRE] : "";
        $descripcion = isset($_POST[TABLE_SUBCATEGORIA_DESCRIPCION])? $_POST[TABLE_SUBCATEGORIA_DESCRIPCION] : "";
        $idCategoria = isset($_POST[TABLE_SUBCATEGORIA_ID_CATEGORIA])? $_POST[TABLE_SUBCATEGORIA_ID_CATEGORIA] : null;
        $this->subcategoriaService->save($nombre, $descripcion, $idCategoria);
    }
    
    private function _edit() {
        $idSubcategoria = isset($_POST["id"])? $_POST["id"] : null;
        $nombre = isset($_POST[TABLE_SUBCATEGORIA_NOMBRE])? $_POST[TABLE_SUBCATEGORIA_NOMBRE] : "";
        $descripcion = isset($_POST[TABLE_SUBCATEGORIA_DESCRIPCION])? $_POST[TABLE_SUBCATEGORIA_DESCRIPCION] : "";
        $idCategoria = isset($_POST[TABLE_SUBCATEGORIA_ID_CATEGORIA])? $_POST[TABLE_SUBCATEGORIA_ID_CATEGORIA] : null;
        $this->subcategoriaService->save($nombre, $descripcion, $idCategoria, $idSubcategoria);
    }
    
    private function _del() {
        $idSubcategoria = isset($_POST["id"])? $_POST["id"] : 0;
        $this->subcategoriaService->delete($idSubcategoria);
    }
}