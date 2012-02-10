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
 * Tabla categoria
 */
define("TABLE_CATEGORIA", "categoria");

/**
 * Campos de la tabla de categoria
 */
define("TABLE_CATEGORIA_ID_CATEGORIA", "idCategoria");
define("TABLE_CATEGORIA_NOMBRE", "nombre");
define("TABLE_CATEGORIA_DESCRIPCION", "descripcion");

/**
 * Tabla subcategoria
 */
define("TABLE_SUBCATEGORIA", "subcategoria");

/**
 * Campos de la tabla de subcategoria
 */
define("TABLE_SUBCATEGORIA_ID_SUBCATEGORIA", "idSubcategoria");
define("TABLE_SUBCATEGORIA_NOMBRE", "nombre");
define("TABLE_SUBCATEGORIA_DESCRIPCION", "descripcion");
define("TABLE_SUBCATEGORIA_ID_CATEGORIA", "idCategoria");

/**
 * Tabla talla
 */
define("TABLE_TALLA", "talla");

/**
 * Campos de la tabla de talla
 */
define("TABLE_TALLA_ID_TALLA", "idTalla");
define("TABLE_TALLA_TALLA", "talla");
define("TABLE_TALLA_DESCRIPCION", "descripcion");

/**
 * Tabla producto
 */
define("TABLE_PRODUCTO", "producto");

/**
 * Campos tabla producto
 */
define("TABLE_PRODUCTO_ID_PRODUCTO", "idProducto");
define("TABLE_PRODUCTO_MODELO", "modelo");
define("TABLE_PRODUCTO_DESCRIPCION", "descripcion");
define("TABLE_PRODUCTO_ID_SUBCATEGORIA", "idSubcategoria");
define("TABLE_PRODUCTO_IMAGEN", "imagen");
define("TABLE_PRODUCTO_ID_COLOR", "idColor");
define("TABLE_PRODUCTO_PRECIO", "precio");
define("TABLE_PRODUCTO_DESTACADO", "destacado");
define("TABLE_PRODUCTO_DESCUENTO", "descuento");
define("TABLE_PRODUCTO_ACTIVO", "activo");

/**
 * Tabla producto talla
 */

define("TABLE_PRODUCTO_TALLA", "producto_talla");

/**
 * Campos tabla producto_talla
 */
define("TABLE_PRODUCTO_TALLA_ID_PRODUCTO", "idProducto");
define("TABLE_PRODUCTO_TALLA_ID_TALLA", "idTalla");

/**
 * Tabla producto color
 */
define("TABLE_PRODUCTO_COLOR", "producto_color");

/**
 * Campos tabla producto_talla
 */
define("TABLE_PRODUCTO_COLOR_ID_PRODUCTO", "idProducto");
define("TABLE_PRODUCTO_COLOR_ID_COLOR", "idColor");
define("TABLE_PRODUCTO_COLOR_IMAGEN", "imagen");

define("TABLE_CLIENTE", "cliente");

define("TABLE_CLIENTE_ID_CLIENTE", "idCliente");
define("TABLE_CLIENTE_NOMBRE", "nombre");
define("TABLE_CLIENTE_AP_PATERNO", "apPaterno");
define("TABLE_CLIENTE_AP_MATERNO", "apMaterno");
define("TABLE_CLIENTE_TELEFONO", "telefono");
define("TABLE_CLIENTE_CALLE_NUMERO", "calleNumero");
define("TABLE_CLIENTE_COLONIA", "colonia");
define("TABLE_CLIENTE_MUNICIPIO", "municipio");
define("TABLE_CLIENTE_ESTADO", "estado");
define("TABLE_CLIENTE_PAIS", "pais");
define("TABLE_CLIENTE_CP", "cp");
define("TABLE_CLIENTE_LOGIN", "login");
define("TABLE_CLIENTE_PASS", "pass");

define("TABLE_PEDIDO_PRODUCTO", "pedido_producto");

define("TABLE_PEDIDO_PRODUCTO_ID_PEDIDO", "idPedido");
define("TABLE_PEDIDO_PRODUCTO_ID_PRODUCTO", "idProducto");
define("TABLE_PEDIDO_PRODUCTO_ID_COLOR", "idColor");
define("TABLE_PEDIDO_PRODUCTO_ID_TALLA", "idTalla");
define("TABLE_PEDIDO_PRODUCTO_PRECIO", "precio");
define("TABLE_PEDIDO_PRODUCTO_CANTIDAD", "cantidad");
define("TABLE_PEDIDO_PRODUCTO_SUBTOTAL", "subtotal");

define("TABLE_PEDIDO", "pedido");

define("TABLE_PEDIDO_ID_PEDIDO", "idPedido");
define("TABLE_PEDIDO_FECHA", "fecha");
define("TABLE_PEDIDO_ID_CLIENTE", "idCliente");
define("TABLE_PEDIDO_ID_ESTATUS", "idEstatus");
define("TABLE_PEDIDO_ENVIO", "envio");
define("TABLE_PEDIDO_TOTAL", "total");

/**
 * Constantes de operacion del grid
 */
define("GRID_ADD", "add");
define("GRID_DEL", "del");
define("GRID_EDIT", "edit");
define("GRID_LOAD", "load");
