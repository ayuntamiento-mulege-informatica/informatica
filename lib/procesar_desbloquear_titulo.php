<?php
require_once '../connect.php';
require_once 'class_titulos.php';

session_start();

$titulos = new titulos;

if (isset($_POST['accion'])) {
  $_SESSION['msg'] = $titulos -> desbloquearTitulo($connect, $_POST['admin'], $_POST['num_titulo']);

  header('location: /desbloquear_titulo');
}
else {
  header('location: /desbloquear_titulo');
}
?>
