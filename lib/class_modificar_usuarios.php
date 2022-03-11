<?php
require_once 'class_crypt.php';
/**
 *
 */
class modificar_usuario {
  // Actualizar nombre de usuario.
  function actualizarNombreUsuario($connect, $nombre, $id) {
    $sql = "UPDATE usuarios SET nombre = '$nombre' WHERE id = $id";
    mysqli_query($connect, $sql) or die ($connect -> error);

    return 'Nombre cambiado exitosamente.';
  }

  function generarContrasena($connect,$id) {
    $crypt = new crypt;
    $pass = $crypt -> genPass(8);
    $pass_crypt = $crypt -> pass($pass);

    $sql = "UPDATE usuarios SET contrasena = '$pass_crypt' WHERE id = $id";
    mysqli_query($connect, $sql) or die ($connect -> error);

    return 'CONTRASEÑA: '.$pass;
  }
}

?>
