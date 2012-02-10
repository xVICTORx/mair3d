<?php

class Estatus {
    private $idEstatus;
    private $nombre;
    private $descripcion;
    
    function __construct($idEstatus = null, $nombre = null, $descripcion = "") {
        $this->idEstatus = $idEstatus;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }
    
    public function getIdEstatus() {
        return $this->idEstatus;
    }

    public function setIdEstatus($idEstatus) {
        $this->idEstatus = $idEstatus;
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

}

?>
