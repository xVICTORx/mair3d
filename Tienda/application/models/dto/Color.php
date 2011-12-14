<?php

/**
 * Clase mapeo de la tabla color
 * 
 * @author Victor Huerta
 */
class Color {

    private $idColor;
    private $nombre;
    private $descripcion;
    private $imagen;

    function __construct($idColor = null, $nombre = "", $descripcion = "", $imagen = "") {
        $this->idColor = $idColor;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
    }

    public function getIdColor() {
        return $this->idColor;
    }

    public function setIdColor($idColor) {
        $this->idColor = $idColor;
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

    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

}