<?php

/**
 * Description of SubCategoria
 *
 * @author Victor
 */
class Subcategoria {
    
    private $idSubCategoria;
    private $nombre;
    private $descripcion;
    private $idCategoria;
    
    function __construct($idSubCategoria = null, $nombre = "", $descripcion = "", $idCategoria = "") {
        $this->idSubCategoria = $idSubCategoria;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->idCategoria = $idCategoria;
    }

    
    public function getIdSubCategoria() {
        return $this->idSubCategoria;
    }

    public function setIdSubCategoria($idSubCategoria) {
        $this->idSubCategoria = $idSubCategoria;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

}