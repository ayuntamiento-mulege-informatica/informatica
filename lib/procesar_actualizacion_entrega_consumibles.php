<?php
require_once '../connect.php';
require_once 'class_entrega_consumibles.php';

$entrega_consumibles = new entrega_consumibles;

session_start();

if (isset($_POST['accion'])) {
  // Almacenamiento de las imágenes.
  if (!empty($_FILES['evidencia']['tmp_name'])) {
    if ($_FILES['evidencia']['type'] == 'image/jpeg') {
      if (is_uploaded_file($_FILES['evidencia']['tmp_name'])){
        $evidencia = $_FILES['evidencia']['tmp_name'];
      }
      else {
        $_SESSION['msg'] = 'La imagen proporcionada no pudo ser almacenada.';
        header('location: /editar_consumibles/'.$_POST['id']);
      }
    }
    else {
      $_SESSION['msg'] = 'Solo se aceptan imágenes en formato JPG.';
      header('location: /editar_consumibles/'.$_POST['id']);
    }
  }
  else {
    $evidencia = null;
  }

  $_SESSION['msg'] = $entrega_consumibles -> actualizarEntregaConsumibles($connect, $_POST['id'], $_POST['fecha_cambio'], $_POST['area'], $_POST['impresora'], $_POST['tipo'], $_POST['especificaciones'], $_POST['cantidad'], $_POST['recibe'], $evidencia);

  header('location: /editar_consumibles/'.$_POST['id']);
}

?>
