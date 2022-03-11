<?php
class login {
	// Se obtienen los datos del usuario que inicia sesión.
	public function usrQuery($connect, $usuario) {
		$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
		$query = mysqli_query($connect, $sql);
		$row = mysqli_fetch_array($query);

		return array(
			'id' => $row['id'],
			'usuario' => $row['usuario'],
			'nombre' => $row['nombre'],
			'area' => $row['area'],
			'contrasena' => $row['contrasena']
		);
	}
}
?>
