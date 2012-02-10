<?php

/**
 * Description of Categoria
 *
 * @author Victor
 */
class Categoria {
    
    private $idCategoria;
    private $nombre;
    private $descripcion;
    
    function __construct($idCategoria = null, $nombre = "", $decripcion = "") {
        $this->idCategoria = $idCategoria;
        $this->nombre = $nombre;
        $this->descripcion = $decripcion;
    }

    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
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

    public function setDescripcion($decripcion) {
        $this->descripcion = $decripcion;
    }

}
