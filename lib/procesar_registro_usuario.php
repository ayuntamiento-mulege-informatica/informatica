<?php
require_once '../connect.php';
require_once 'class_crypt.php';
require_once 'class_registrar_usuario.php';

session_start();

if (isset($_POST['accion'])) {
  $crypt = new crypt;
  $reg_usr = new registrar_usuario;

  // $sal = $crypt -> genPass(8);
  $pass = $crypt -> genPass(8);
  $pass_crypt = $crypt -> pass($pass);

  $msg = $reg_usr -> registrarUsuario($connect, $pass_crypt, $_POST['nombre'], $_POST['area']);
  $_SESSION['msg'] = $msg.$pass;

  header('location: /registrar_usuario');
}
else {
	header('location: /registrar_usuario');
}
?>
