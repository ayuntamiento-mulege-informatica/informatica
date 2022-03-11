<?php
require_once '../connect.php';
require_once 'class_leyendas.php';

session_start();

$leyendas = new leyendas;

$_SESSION['msg'] = $leyendas -> nuevaLeyenda($connect, $_POST['leyenda']);

header('location: /registrar_leyenda');
?>
