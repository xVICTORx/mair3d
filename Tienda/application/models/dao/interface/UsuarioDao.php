<?php

require_once dirname(__FILE__) . "/Dao.php";

/**
 * Interfaz para el DAO de la entidad Usuario
 * 
 * @author Victor
 */
interface UsuarioDao extends Dao {

    /**
      * Recupera un usuario por el login
      * 
      * @param String $login Login del usuario
      * @return Usuario Usuario encontrado o null si no existe
      */
    public function getByLogin($login);
}
