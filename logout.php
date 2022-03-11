<?php
// session_start();

unset($_SESSION['id']);
unset($_SESSION['usuario']);
unset($_SESSION['nombre']);
unset($_SESSION['area']);

$_SESSION = array(); // Destruye todas las variables de sesión.

session_destroy(); // Destruye la Sesión
?>

<script type="text/javascript"> window.location = "/"; </script>
