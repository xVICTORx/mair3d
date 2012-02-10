<?php

class Producto_Color {
    private $idColor;
    private $idProducto;
    private $imagen;
    
    function __construct($idColor = null, $idProducto = null, $imagen = "") {
        $this->idColor = $idColor;
        $this->idProducto = $idProducto;
        $this->imagen = $imagen;
    }
    
    public function getIdColor() {
        return $this->idColor;
    }

    public function setIdColor($idColor) {
        $this->idColor = $idColor;
    }

    public function getIdProducto() {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

}