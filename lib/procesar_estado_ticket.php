<?php
require_once '../connect.php';
require_once 'class_tickets.php';

$tickets = new tickets;

session_start();

$_SESSION['msg'] = $tickets -> estadoTicket($connect, $_POST['id'], $_POST['estado']);

header('location: /revisar_tickets');
?>
