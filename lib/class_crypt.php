<?php
class crypt {
	// Función para generar contraseñas aleatorias.
	public function genPass($longitud) {
		$opcLetra = TRUE;
		$opcNumero = TRUE;
		$opcMayus = TRUE;
		$opcEspecial = FALSE;
		$letras = "abcdefghijklmnopqrstuvwxyz";
		$numeros = "1234567890";
		$letrasMayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$especiales = "|@#~$%()=^*+[]{}-_";
		$listado = "";
		$password = "";

		if($opcLetra == TRUE) {$listado .= $letras;}
		if($opcNumero == TRUE) {$listado .= $numeros;}
		if($opcMayus == TRUE) {$listado .= $letrasMayus;}
		if($opcEspecial == TRUE) {$listado .= $especiales;}

		for($i = 1; $i <= $longitud; $i++) {
			$caracter = $listado[rand(0,strlen($listado)-1)];
			$password .= $caracter;
			$listado = str_shuffle($listado);
		}
		return $password;
	}

	// Esta función cifra la contraseña del usuario.
	public function pass($password) {
		$password_crypt = password_hash($password, PASSWORD_DEFAULT, ['cost' => 15]);

		return $password_crypt;
	}

	// Verificación de contraseñas
	public function passVerify($password, $hash){
		return password_verify($password, $hash);
	}
}
?>
