<?php

class Producto_Talla {
    private $idTalla;
    private $idProducto;
    
    function __construct($idTalla = null, $idProducto = null) {
        $this->idTalla = $idTalla;
        $this->idProducto = $idProducto;
    }

    
    public function getIdTalla() {
        return $this->idTalla;
    }

    public function setIdTalla($idTalla) {
        $this->idTalla = $idTalla;
    }

    public function getIdProducto() {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }


}