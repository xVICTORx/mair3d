<?php

class Pedido_Producto {
    private $idPedido;
    private $idProducto;
    private $idColor;
    private $idTalla;
    private $precio;
    private $cantidad;
    private $subtotal;
    
    function __construct($idPedido = null, $idProducto = null, $idColor = null, $idTalla = null, $precio = 0.0, $cantidad = 0, $subtotal = 0.0) {
        $this->idPedido = $idPedido;
        $this->idProducto = $idProducto;
        $this->idColor = $idColor;
        $this->idTalla = $idTalla;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
        $this->subtotal = $subtotal;
    }
    
    public function getIdPedido() {
        return $this->idPedido;
    }

    public function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
    }

    public function getIdProducto() {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    public function getIdColor() {
        return $this->idColor;
    }

    public function setIdColor($idColor) {
        $this->idColor = $idColor;
    }

    public function getIdTalla() {
        return $this->idTalla;
    }

    public function setIdTalla($idTalla) {
        $this->idTalla = $idTalla;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    
    public function getSubtotal() {
        return $this->subtotal;
    }

    public function setSubtotal($subtotal) {
        $this->subtotal = $subtotal;
    }

}
