<?php

/**
 * |--------------------------------------------------------------------------
 * | Archivo de constantes para los nombres de las tablas, de los campos etc.
 * |--------------------------------------------------------------------------
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

/**
 * Tabla de color
 */
define("TABLE_COLOR", "color");

/**
 * Campos de la tabla de color
 */
define("TABLE_COLOR_ID_COLOR", "idColor");
define("TABLE_COLOR_NOMBRE", "nombre");
define("TABLE_COLOR_DESCRIPCION", "descripcion");
define("TABLE_COLOR_IMAGEN", "imagen");

/**
 * Constantes de operacion del grid
 */
define("GRID_ADD", "add");
define("GRID_DEL", "del");
define("GRID_EDIT", "edit");
define("GRID_LOAD", "load");
