<?php
require_once '../connect.php';
require_once 'class_inventario_impresoras.php';

$inventario_impresoras = new inventario_impresoras;

session_start();

if (isset($_POST['accion'])) {
  $_SESSION['msg'] = $inventario_impresoras -> registrarImpresora($connect, $_POST['id'], $_POST['area'], $_POST['cantidad'], $_POST['marca'], $_POST['modelo'], $_POST['tipo'], $_POST['modelo_tinta_toner']);

  header('location: /inventario_impresoras');
}
?>
