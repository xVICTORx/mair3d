<?php

class Cliente {

    private $idCliente;
    private $login;
    private $pass;
    private $nombre;
    private $apPaterno;
    private $apMaterno;
    private $nombreEmpresa;
    private $telefono;
    private $email;
    private $razonSocial;
    private $rfc;
    private $calle;
    private $numero;
    private $colonia;
    private $municipio;
    private $estado;
    private $cp;
    private $email2;
    private $calleEnvio;
    private $numeroExtEnvio;
    private $numeroIntEnvio;
    private $coloniaEnvio;
    private $municipioEnvio;
    private $estadoEnvio;
    private $cpEnvio;

    function __construct($idCliente = null, $login = "", $pass = "", $nombre = "", $apPaterno = "", $apMaterno = "", $nombreEmpresa = "", $telefono = "", $email = "", $razonSocial = "", $rfc = "", $calle = "", $numero = "", $colonia = "", $municipio = "", $estado = "", $cp = "", $email2 = "", $calleEnvio = "", $numeroExtEnvio = "", $numeroIntEnvio = "", $coloniaEnvio = "", $municipioEnvio = "", $estadoEnvio = "", $cpEnvio = "") {
        $this->idCliente = $idCliente;
        $this->login = $login;
        $this->pass = $pass;
        $this->nombre = $nombre;
        $this->apPaterno = $apPaterno;
        $this->apMaterno = $apMaterno;
        $this->nombreEmpresa = $nombreEmpresa;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->razonSocial = $razonSocial;
        $this->rfc = $rfc;
        $this->calle = $calle;
        $this->numero = $numero;
        $this->colonia = $colonia;
        $this->municipio = $municipio;
        $this->estado = $estado;
        $this->cp = $cp;
        $this->email2 = $email2;
        $this->calleEnvio = $calleEnvio;
        $this->numeroExtEnvio = $numeroExtEnvio;
        $this->numeroIntEnvio = $numeroIntEnvio;
        $this->coloniaEnvio = $coloniaEnvio;
        $this->municipioEnvio = $municipioEnvio;
        $this->estadoEnvio = $estadoEnvio;
        $this->cpEnvio = $cpEnvio;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
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

    public function getNombreEmpresa() {
        return $this->nombreEmpresa;
    }

    public function setNombreEmpresa($nombreEmpresa) {
        $this->nombreEmpresa = $nombreEmpresa;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getRazonSocial() {
        return $this->razonSocial;
    }

    public function setRazonSocial($razonSocial) {
        $this->razonSocial = $razonSocial;
    }

    public function getRfc() {
        return $this->rfc;
    }

    public function setRfc($rfc) {
        $this->rfc = $rfc;
    }

    public function getCalle() {
        return $this->calle;
    }

    public function setCalle($calle) {
        $this->calle = $calle;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getColonia() {
        return $this->colonia;
    }

    public function setColonia($colonia) {
        $this->colonia = $colonia;
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

    public function getCp() {
        return $this->cp;
    }

    public function setCp($cp) {
        $this->cp = $cp;
    }

    public function getEmail2() {
        return $this->email2;
    }

    public function setEmail2($email2) {
        $this->email2 = $email2;
    }

    public function getCalleEnvio() {
        return $this->calleEnvio;
    }

    public function setCalleEnvio($calleEnvio) {
        $this->calleEnvio = $calleEnvio;
    }

    public function getNumeroExtEnvio() {
        return $this->numeroExtEnvio;
    }

    public function setNumeroExtEnvio($numeroExtEnvio) {
        $this->numeroExtEnvio = $numeroExtEnvio;
    }

    public function getNumeroIntEnvio() {
        return $this->numeroIntEnvio;
    }

    public function setNumeroIntEnvio($numeroIntEnvio) {
        $this->numeroIntEnvio = $numeroIntEnvio;
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

    public function getCpEnvio() {
        return $this->cpEnvio;
    }

    public function setCpEnvio($cpEnvio) {
        $this->cpEnvio = $cpEnvio;
    }

}