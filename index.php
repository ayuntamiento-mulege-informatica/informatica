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
  case 'Sindicatura':
    switch ($seccion) {
      case '/':
        include_once 'inicio_sindicatura.php';
    		break;

      case '/registrar_titulo':
      case '/registrar_titulo/admin_anterior':
        include_once 'registrar_titulo.php';
    		break;

      case '/modificar_titulo/'.$parametro_2:
      case '/modificar_titulo/'.$parametro_2.'/'.$parametro_3:
        include_once 'modificar_titulo.php';
    		break;

      case '/crear_leyenda':
        include_once 'crear_leyenda.php';
    		break;

      case '/lista_leyendas':
        include_once 'lista_leyendas.php';
        break;

      case '/consultar_titulo':
        include_once 'consultar_titulo.php';
    		break;

      case '/resumen_general':
      case '/resumen_general/'.$parametro_2.'/'.$parametro_3:
        include_once 'resumen_general.php';
    		break;

      case '/lista_funcionarios':
        include_once 'lista_funcionarios.php';
    		break;

      case '/levantar_ticket':
        include_once 'levantar_ticket.php';
    		break;

      case '/logout':
        include_once 'logout.php';
        break;

    	default:
        include_once '404.php';
    		break;
    }
    break;

  case 'Informática':
		switch ($seccion) {
      case '/':
        include_once 'inicio_informatica.php';
				break;
			case '/registrar_usuario':
				include_once 'registrar_usuario.php';
				break;

      case '/modificar_usuario/'.$parametro_2:
        include_once 'modificar_usuario.php';
        break;

      case '/lista_usuarios':
        include_once 'lista_usuarios.php';
        break;

      case '/registrar_leyenda':
				include_once 'crear_leyenda.php';
				break;

      case '/lista_leyendas':
				include_once 'lista_leyendas.php';
				break;

      case '/actualizar_administracion':
				include_once 'actualizar_administracion.php';
				break;

      case '/registrar_administracion':
				include_once 'registrar_administracion.php';
				break;

      case '/desbloquear_titulo':
				include_once 'desbloquear_titulo.php';
				break;

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

  default:
    include_once 'login.php';
    break;
}
?>
