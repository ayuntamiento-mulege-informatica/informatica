<?php
class registrar_usuario {
  // Esta función realiza todo el procedimiento para registro de usuario.
  function registrarUsuario($connect, $contrasena, $nombre, $area) {
    $nombre_usuario = $this -> generarNombreUsuario($connect, $area);

    $sql = "INSERT INTO usuarios (id, usuario, contrasena, nombre, area) VALUES (null, '$nombre_usuario', '$contrasena', '$nombre', '$area')";

    mysqli_query($connect, $sql) or die ($connect -> error);

    return 'Usuario registrado exitosamente\n\nUSUARIO: '.$nombre_usuario.'\nCONTRASEÑA: ';
  }

  // Esta función genera nombres de usuario de acuerdo al área a la que pertenece.
  private function generarNombreUsuario($connect, $area) {
		$sql = "SELECT COUNT(*) AS contar FROM usuarios WHERE area = '$area'";
		$query = mysqli_query($connect, $sql);
		$row = mysqli_fetch_array($query);

		return $area.' '.($row['contar']+1);
	}
}
?>
