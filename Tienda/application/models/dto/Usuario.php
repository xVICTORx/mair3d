<?php

/**
 * Clase mapeo de la tabla usuario
 * 
 * @author Victor Huerta
 */
class Usuario {

    private $idUsuario = null;
    private $login = "";
    private $pass = "";

    public function __construct($idUsuario = null, $login = "", $pass = "") {
        $this->idUsuario = $idUsuario;
        $this->login = $login;
        $this->pass = $pass;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getPass() {
        return $this->pass;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

}