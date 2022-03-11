<?php
require_once '../connect.php';
require_once 'class_tickets.php';

$tickets = new tickets;

session_start();

if (isset($_POST['accion'])) {
  $_SESSION['msg'] = $tickets -> abrirTicket($connect, $_SESSION['nombre_usuario'], $_POST['admin'], $_POST['titulo'], $_POST['motivo']);

  header('location: /levantar_ticket');
}
?>
