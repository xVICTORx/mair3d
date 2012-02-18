<?php

class Cliente {

    private $idCliente;
    private $nombre;
    private $apPaterno;
    private $apMaterno;
    private $calleNumero;
    private $colonia;
    private $telefono;
    private $municipio;
    private $estado;
    private $pais;
    private $cp;
    private $login;
    private $password;
    private $calleNumeroEnvio;
    private $coloniaEnvio;
    private $municipioEnvio;
    private $estadoEnvio;
    private $paisEnvio;
    private $cpEnvio;

    function __construct($idCliente = null, $nombre = "", $apPaterno = "", $apMaterno = "", $calleNumero = "", $colonia = "", $telefono = "", $municipio = "", $estado = "", $pais = "", $cp = "", $login = "", $password = "", $calleNumeroEnvio = "", $coloniaEnvio = "", $municipioEnvio = "", $estadoEnvio = "", $paisEnvio = "", $cpEnvio = "") {
        $this->idCliente = $idCliente;
        $this->nombre = $nombre;
        $this->apPaterno = $apPaterno;
        $this->apMaterno = $apMaterno;
        $this->calleNumero = $calleNumero;
        $this->colonia = $colonia;
        $this->telefono = $telefono;
        $this->municipio = $municipio;
        $this->estado = $estado;
        $this->pais = $pais;
        $this->cp = $cp;
        $this->login = $login;
        $this->password = $password;
        $this->calleNumeroEnvio = $calleNumeroEnvio;
        $this->coloniaEnvio = $coloniaEnvio;
        $this->municipioEnvio = $municipioEnvio;
        $this->estadoEnvio = $estadoEnvio;
        $this->paisEnvio = $paisEnvio;
        $this->cpEnvio = $cpEnvio;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApPaterno() {
        return $this->apPaterno;
    }

    public function setApPaterno($apPaterno) {
        $this->apPaterno = $apPaterno;
    }

    public function getApMaterno() {
        return $this->apMaterno;
    }

    public function setApMaterno($apMaterno) {
        $this->apMaterno = $apMaterno;
    }

    public function getCalleNumero() {
        return $this->calleNumero;
    }

    public function setCalleNumero($calleNumero) {
        $this->calleNumero = $calleNumero;
    }

    public function getColonia() {
        return $this->colonia;
    }

    public function setColonia($colonia) {
        $this->colonia = $colonia;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getMunicipio() {
        return $this->municipio;
    }

    public function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getPais() {
        return $this->pais;
    }

    public function setPais($pais) {
        $this->pais = $pais;
    }

    public function getCp() {
        return $this->cp;
    }

    public function setCp($cp) {
        $this->cp = $cp;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getCalleNumeroEnvio() {
        return $this->calleNumeroEnvio;
    }

    public function setCalleNumeroEnvio($calleNumeroEnvio) {
        $this->calleNumeroEnvio = $calleNumeroEnvio;
    }

    public function getColoniaEnvio() {
        return $this->coloniaEnvio;
    }

    public function setColoniaEnvio($coloniaEnvio) {
        $this->coloniaEnvio = $coloniaEnvio;
    }

    public function getMunicipioEnvio() {
        return $this->municipioEnvio;
    }

    public function setMunicipioEnvio($municipioEnvio) {
        $this->municipioEnvio = $municipioEnvio;
    }

    public function getEstadoEnvio() {
        return $this->estadoEnvio;
    }

    public function setEstadoEnvio($estadoEnvio) {
        $this->estadoEnvio = $estadoEnvio;
    }

    public function getPaisEnvio() {
        return $this->paisEnvio;
    }

    public function setPaisEnvio($paisEnvio) {
        $this->paisEnvio = $paisEnvio;
    }

    public function getCpEnvio() {
        return $this->cpEnvio;
    }

    public function setCpEnvio($cpEnvio) {
        $this->cpEnvio = $cpEnvio;
    }

}