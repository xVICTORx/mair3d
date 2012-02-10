<?php 

class Descuento {
    private $idDescuento;
    private $monto;
    private $porcentaje;
    
    function __construct($idDescuento = null, $monto = 0.0, $porcentaje = 0.0) {
        $this->idDescuento = $idDescuento;
        $this->monto = $monto;
        $this->porcentaje = $porcentaje;
    }

    public function getIdDescuento() {
        return $this->idDescuento;
    }

    public function setIdDescuento($idDescuento) {
        $this->idDescuento = $idDescuento;
    }

    public function getMonto() {
        return $this->monto;
    }

    public function setMonto($monto) {
        $this->monto = $monto;
    }

    public function getPorcentaje() {
        return $this->porcentaje;
    }

    public function setPorcentaje($porcentaje) {
        $this->porcentaje = $porcentaje;
    }

}