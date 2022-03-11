<?php
require_once '../connect.php';
require_once 'class_leyendas.php';

$leyenda = [];

if (isset($_GET['id_leyenda'])) {
  $leyendas = new leyendas;

  $leyenda = $leyendas -> listaLeyendasTexto($connect, $_GET['id_leyenda']);
}

echo json_encode(['data' => $leyenda]);
?>
