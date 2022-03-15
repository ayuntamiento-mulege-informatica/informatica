<?php
require_once '../connect.php';
require_once 'class_entrega_toner_tinta.php';

$entrega_toner_tinta = new entrega_toner_tinta;

session_start();

if (isset($_POST['accion'])) {
  $_SESSION['msg'] = $entrega_toner_tinta -> nuevaEntregaTonerTinta($connect, $_POST['id'], $_POST['fecha_cambio'], $_POST['area'], $_POST['impresora'], $_POST['tipo'], $_POST['especificaciones'], $_POST['cantidad'], $_POST['recibe']);
}

header('location: /entrega_toner_tinta');
?>
