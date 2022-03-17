<?php
require_once '../connect.php';
require_once 'class_entrega_toner_tinta.php';

$entrega_toner_tinta = new entrega_toner_tinta;

session_start();

if (isset($_POST['accion'])) {
  // Almacenamiento de las imágenes.
  if (!empty($_FILES['evidencia']['tmp_name'])) {
    if ($_FILES['evidencia']['type'] == 'image/jpeg') {
      if (is_uploaded_file($_FILES['evidencia']['tmp_name'])){
        $evidencia = $_FILES['evidencia']['tmp_name'];
      }
    }
  }
  else {
    $evidencia = null;
  }

  $_SESSION['msg'] = $entrega_toner_tinta -> actualizarEntregaTonerTinta($connect, $_POST['id'], $_POST['fecha_cambio'], $_POST['area'], $_POST['impresora'], $_POST['tipo'], $_POST['especificaciones'], $_POST['cantidad'], $_POST['recibe'], $evidencia);
}

header('location: /entrega_toner_tinta');
?>
