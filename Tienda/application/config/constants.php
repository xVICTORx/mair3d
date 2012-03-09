<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* Incluyo archivo de constantes de la base de datos y direcciones de las views */

require_once dirname(__FILE__) . "/database_constants.php";
require_once dirname(__FILE__) . "/view_name_constants.php";

/* Constantes del sistema */

define("TITLE_ADMIN", "Administrador Tienda Virtual");
define("TITLE_TIENDA", "Raklyn de México S.A. de C.V");
define("COSTO_ENVIO", "50");
define("ADMIN_CORREO", "direccion@mair3d.com.mx");
define("COPIA_CORREO", "papo.o@hotmail.com");

/* Constantes para la conexion a la base de datos */

define("DB_HOSTNAME", "localhost");
define("DB_USER"    , "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "tienda");

/* End of file constants.php */
/* Location: ./application/config/constants.php */