<?php
require 'connect.php';

session_start();

if (!isset($_SESSION['area'])) { $area = null; }
else { $area = $_SESSION['area']; }

// Separa la URI en un arreglo utilizando las diagonales (/) como separador.
$aux = substr($_SERVER['REQUEST_URI'], strlen('/'));
if( substr($aux, -1) == '/'){ $aux = substr($aux, 0, -1); }
$url_array = explode('/', $aux);

// VALORES A UTILIZAR.
if (isset($url_array[0])) { $parametro_1 = $url_array[0]; }
else { $parametro_1 = null; }

if (isset($url_array[1])) { $parametro_2 = $url_array[1]; }
else { $parametro_2 = null; }

if (isset($url_array[2])) { $parametro_3 = $url_array[2]; }
else { $parametro_3 = null; }

if (isset($url_array[3])) { $parametro_4 = $url_array[3]; }
else { $parametro_4 = null; }

if (isset($url_array[4])) { $parametro_5 = $url_array[4]; }
else { $parametro_5 = null; }

if (isset($url_array[5])) { $parametro_6 = $url_array[5]; }
else { $parametro_6 = null; }

/* URI DE LA SECCIÓN. */
$seccion = $_SERVER['REQUEST_URI'];

switch ($area) {
  case 'Informática':
		switch ($seccion) {
      case '/':
        include_once 'inicio_informatica.php';
				break;

      // GESTIÓN DE USUARIOS.

			case '/registrar_usuario':
				include_once 'registrar_usuario.php';
				break;

      case '/modificar_usuario/'.$parametro_2:
        include_once 'modificar_usuario.php';
        break;

      case '/lista_usuarios':
        include_once 'lista_usuarios.php';
        break;

      // GESTIÓN DE LAS ADMINISTRACIONES.

      case '/actualizar_administracion':
				include_once 'actualizar_administracion.php';
				break;

      case '/registrar_administracion':
				include_once 'registrar_administracion.php';
				break;

      // GESTIÓN DE BITÁCORA DE MANTENIMIENTO DE EQUIPO INFORMÁTICA Y DE IMPRESIÓN.

      case '/bitacora_mantenimiento':
        include_once 'bitacora_mantenimiento.php';
        break;

      case '/lista_reportes_mantenimiento':
      case '/lista_reportes_mantenimiento/'.$parametro_2:
        include_once 'lista_reportes_mantenimiento.php';
        break;

      case '/nuevo_reporte_mantenimiento':
        include_once 'nuevo_reporte_mantenimiento.php';
        break;

      case '/editar_reporte_mantenimiento/'.$parametro_2:
        include_once 'editar_reporte_mantenimiento.php';
        break;

      case '/imprimir_reporte_mantenimiento/'.$parametro_2:
        include_once 'imprimir_reporte_mantenimiento.php';
        break;

      // BITÁCORA DE ENTREGA DE TONER Y TINTA.
      case '/entrega_toner_tinta':
      case '/entrega_toner_tinta/'.$parametro_2:
        include_once 'entrega_toner_tinta.php';
        break;

      case '/nuevo_registro_toner_tinta':
        include_once 'nuevo_registro_toner_tinta.php';
        break;

      case '/lista_entrega_toner_tinta':
      case '/lista_entrega_toner_tinta/'.$parametro_2:
        include_once 'lista_entrega_toner_tinta.php';
        break;

      // GESTIÓN DE TICKETS

      case '/revisar_tickets':
				include_once 'revisar_tickets.php';
				break;

      case '/logout':
        include_once 'logout.php';
        break;

			default:
        include_once '404.php';
				break;
		}
    break;

  // INICIO DE SESIÓN
  default:
    include_once 'login.php';
    break;
}
?>
