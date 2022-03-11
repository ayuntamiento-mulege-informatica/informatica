<?php
require_once '../connect.php';
require_once 'class_titulos.php';

session_start();

$titulos = new titulos;

if (isset($_POST['accion'])) {
  if ($_POST['num_titulo'] != '' && $_POST['nombre'] == '') {
    header('location: /modificar_titulo/'.$_POST['admin'].'/'.$_POST['num_titulo']);
  }
  elseif ($_POST['num_titulo'] == '' && $_POST['nombre'] != '') {
    // Sustitución de espacios en blanco por %20
    $espacios = array(" ");
    $remplazo = array("%20");

    $nombre = str_replace($espacios, $remplazo, $parametro_2);
    header('location: /resumen_general/'.$_POST['admin'].'/'.$_POST['nombre']);
  }
  elseif ($_POST['num_titulo'] == '' && $_POST['nombre'] == '') {
    $_SESSION['msg'] = 'Debe llenar uno de los campos.';
    header('location: /consultar_titulo');
  }
  elseif ($_POST['num_titulo'] != '' && $_POST['nombre'] != '') {
    $_SESSION['msg'] = 'Solo está permitido llenar uno de los campos a la vez.';
    header('location: /consultar_titulo');
  }
}
else {
  header('location: /consultar_titulo');
}
?>
