<?php
require_once '../connect.php';
require_once 'class_titulos.php';

session_start();

if (isset($_POST['accion'])) {
  $titulos = new titulos;

  $_SESSION['msg'] = $titulos -> nuevoTitulo($connect, $_POST['admin'], $_POST['num_titulo'], $_POST['nombre_adquiriente'], $_POST['lote'], $_POST['manzana'], $_POST['clave_catastral'], $_POST['ubicacion_lote'], $_POST['fundo_legal'], $_POST['superficie_total'], $_POST['colindancias'], $_POST['precio_total'], $_POST['precio_m2'], $_POST['recibos_pago'], $_POST['dia_letra'], $_POST['mes_letra'], $_POST['ano_letra'], $_POST['leyenda_titulo'], $_SESSION['nombre_usuario']);

  header('location: /registrar_titulo');
}
else {
  header('location: /');
}
?>
