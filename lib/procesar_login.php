<?php
// Esta sección del fichero solo funcionará cuando la variable global $_POST tenga algún valor.
if (isset($_POST['login'])) {
  require_once '../connect.php';
  include_once 'class_login.php';// Clase para inicio de sesión.
  include_once 'class_crypt.php'; //Cifra la contraseña ingresada por el usuario.

  $log = new login;//Llamada a class_login.php
  $crypt = new crypt;//Llamada a class_crypt.php;

  // Captura de datos enviados desde "login.php" mediante el metodo POST para almacenarlos en variables.
  $usuario = $_POST['usuario'];//Almacena el dato "usuario" enviado desde "login.php".
  $psswrd = $_POST['pass'];//Almacena el dato "contrasena" enviado desde "login.php".

  // Selecciona datos del usuario desde la tabla "funcionarios".
  $usr_query = $log -> usrQuery($connect, $usuario);
  $usr_id = $usr_query['id'];
  $usr_usuario = $usr_query['usuario'];
  $usr_nombre = $usr_query['nombre'];
  $usr_area = $usr_query['area'];
  $usr_pass = $usr_query['contrasena'];

  // Suma de verificación del nombre dado por el usuario.
  $usuario_sha = hash('sha512', $usuario);
  $usr_usuario_sha = hash('sha512', $usr_usuario);
  //Se encripta la contraseña ingresada por el usuario.
  $passCrypt = $crypt -> pass($psswrd);
  // Verificación de contraseña del usuario.
  $pass_verificado = $crypt -> passVerify($psswrd, $usr_pass);

  // Verificación de nombre de usuario
  if($usuario_sha === $usr_usuario_sha){
    //Si el usuario es correcto se valida su contraseña.
    if($pass_verificado == 1) {
      //Se crea la sesión.
      session_start();

      //Establecen las variables superglobales para sesion.
      $_SESSION['id'] = $usr_id;
      $_SESSION['usuario'] = $usr_usuario;
      $_SESSION['nombre_usuario'] = $usr_nombre;
      $_SESSION['area'] = $usr_area;

      // Destrucción de variables $usr_pass.
      unset($usr_pass);

      if ($_SESSION['area'] === 'Sindicatura') {
        header('location: /');
      }
      elseif ($_SESSION['area'] === 'Informática') {
        header('location: /');
      }
    }
    else {
      //En caso que la contraseña sea incorrecta se envía el mensaje "¡Contraseña incorrecta!" y redirecciona a login.
      echo '<script>alert("ERROR:\n\n¡Contraseña incorrecta!"); location.href = "/login";</script>';
    }
  }
  else {
    //En caso que el usuario sea incorrecto se envía el mensaje "¡Nombre de usuario incorrecto!" y redirecciona a login.
    echo '<script>alert("ERROR:\n\n¡Nombre de usuario incorrecto!"); location.href = "/login";</script>';
  }

  // Se cierra conexión a base de datos.
  mysqli_close($connect);
}
?>
