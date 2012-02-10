<?php

class Producto {
    
    private $idProducto;
    private $modelo;
    private $descripcion;
    private $idSubcategoria;
    private $imagen;
    private $idColor;
    private $precio;
    private $destacado;
    private $descuento;
    private $activo;
    
    function __construct($idProducto = null, $modelo = "", $descripcion = "", 
            $idSubcategoria = null, $imagen = "", $idColor = null, $precio = 0.0, 
            $destacado = "NO", $descuento = 0.0, $activo = "NO") {
        $this->idProducto = $idProducto;
        $this->modelo = $modelo;
        $this->descripcion = $descripcion;
        $this->idSubcategoria = $idSubcategoria;
        $this->imagen = $imagen;
        $this->idColor = $idColor;
        $this->precio = $precio;
        $this->destacado = $destacado;
        $this->descuento = $descuento;
        $this->activo = $activo;
    }

    
    public function getIdProducto() {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getIdSubcategoria() {
        return $this->idSubcategoria;
    }

    public function setIdSubcategoria($idSubcategoria) {
        $this->idSubcategoria = $idSubcategoria;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function getIdColor() {
        return $this->idColor;
    }

    public function setIdColor($idColor) {
        $this->idColor = $idColor;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getDestacado() {
        return $this->destacado;
    }

    public function setDestacado($destacado) {
        $this->destacado = $destacado;
    }

    public function getDescuento() {
        return $this->descuento;
    }

    public function setDescuento($descuento) {
        $this->descuento = $descuento;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

}
