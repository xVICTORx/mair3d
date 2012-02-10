<?php

class Pedido {

    private $idPedido;
    private $fecha;
    private $idCliente;
    private $idEstatus;
    private $envio;
    private $subtotal;
    private $descuento;
    private $total;

    function __construct($idPedido = null, $fecha = null, $idCliente = null, $idEstatus = null, $envio = 0.0, $total = 0.0, $subtotal = 0.0, $descuento = 0.0) {
        $this->idPedido = $idPedido;
        $this->fecha = $fecha;
        $this->idCliente = $idCliente;
        $this->idEstatus = $idEstatus;
        $this->envio = $envio;
        $this->total = $total;
        $this->subtotal = $subtotal;
        $this->descuento = $descuento;
    }

    public function getIdPedido() {
        return $this->idPedido;
    }

    public function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    public function getIdEstatus() {
        return $this->idEstatus;
    }

    public function setIdEstatus($idEstatus) {
        $this->idEstatus = $idEstatus;
    }

    public function getEnvio() {
        return $this->envio;
    }

    public function setEnvio($envio) {
        $this->envio = $envio;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setTotal($total) {
        $this->total = $total;
    }
    
    public function getSubtotal() {
        return $this->subtotal;
    }

    public function setSubtotal($subtotal) {
        $this->subtotal = $subtotal;
    }

    public function getDescuento() {
        return $this->descuento;
    }

    public function setDescuento($descuento) {
        $this->descuento = $descuento;
    }

}
