<?php
require_once '../connect.php';
require_once 'class_administraciones.php';

session_start();

$administraciones = new administraciones;

$_SESSION['msg'] = $administraciones -> actualizarAdministracion($connect, $_POST['admin'], $_POST['presidente_municipal'], $_POST['sindico_municipal'], $_POST['secretario_general'], $_POST['director_catastro'], $_POST['tesorero_municipal']);

header('location: /actualizar_administracion');
?>
