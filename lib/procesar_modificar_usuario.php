<?php
require_once '../connect.php';
require_once 'class_modificar_usuarios.php';

session_start();

$modificar_usuario = new modificar_usuario;

if (isset($_POST['accion'])) {
  if ($_POST['accion'] == 'Guardar nombre') {
    $_SESSION['msg'] = $modificar_usuario -> actualizarNombreUsuario($connect, $_POST['nombre'], $_POST['id']);
  }
  elseif ($_POST['accion'] == 'Generar contraseña') {
    $_SESSION['msg'] = $modificar_usuario -> generarContrasena($connect, $_POST['id']);
  }
  header('location: /modificar_usuario/'.$_POST['id']);
}
?>
