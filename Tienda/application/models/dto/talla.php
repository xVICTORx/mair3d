<?php

class Talla {
    private $idTalla;
    private $talla;
    private $descripcion;
    
    function __construct($idTalla = null, $talla = "", $descripcion = "") {
        $this->idTalla = $idTalla;
        $this->talla = $talla;
        $this->descripcion = $descripcion;
    }

    
    public function getIdTalla() {
        return $this->idTalla;
    }

    public function setIdTalla($idTalla) {
        $this->idTalla = $idTalla;
    }

    public function getTalla() {
        return $this->talla;
    }

    public function setTalla($talla) {
        $this->talla = $talla;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}
