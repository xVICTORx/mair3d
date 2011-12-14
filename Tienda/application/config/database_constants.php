<?php

/**
 * Archivo de constantes para los nombres de las tablas, de los campos etc.
 */

/**
 * Constantes de ordenamiento
 */

/**
 * Orden descendente
 */
define("ORDER_ASC", "asc");

/**
 * Orden Ascendente
 */
define("ORDER_DESC", "desc");

/**
 * Constantes para comodines
 */

/**
 * Constante para usar comodin antes de la palabra (%palabra)
 */
define("LIKE_BEFORE", "before");

/**
 * Constante para usar comodin despues de la palabra (palabra%)
 */
define("LIKE_AFTER", "after");

/**
 * Constante para usar comodin antes y despues de la palabra (%comodin%)
 */
define("LIKE_BOTH", "both");

/**
 * Tabla de usuario
 */
define("TABLE_USUARIO" , "usuario");
/**
 * Campos de la tabla de usuario
 */
define("TABLE_USUARIO_ID_USUARIO", "idUsuario");
define("TABLE_USUARIO_LOGIN", "login");
define("TABLE_USUARIO_PASS", "pass");