<?php
class pages{
	/* Función para recorrer páginas */
	public function paginador($pag, $nPag, $extra){
		// Muestra el enlace a la primera página.
		if($pag > 3){
			echo '<li><a href="'.$extra.'">1</a></li>';
			echo'<li class="inactive"><span>«</span></li>';//Enlace a la primer página.
		}
		else echo NULL;
		// Retrocede 10 páginas.
		if($pag > 11){
			echo '<li><a href="'.($pag-10).'">'.($pag-10).'</a></li>';
			echo'<li class="inactive"><span>«</span></li>';// Regresa 10 páginas.
		}
		else echo NULL;
		// Muestra el total de páginas que conforman la galería.
		for($i=1; $i < $nPag+1; $i++){
			if($i >= $pag-2 && $i <= $pag+2){
				if($i == $pag){ echo '<li class="active"><span>'.$i.'</span></li>';}// Impide que la página actual tenga enlace.
				else{ echo '<li><a href="'.$extra.$i.'">'.$i.'</a></li>'; }
			}
		}
		// Avanza 10 páginas.
		if($pag >= $i-11) echo NULL;
		else{
			echo '<li class="inactive"><span>»</span></li>';
			echo '<li><a href="'.$extra.($pag+10).'">'.($pag+10).'</a></li>';// Avanza 10 páginas
		}
		// Muestra el enlace a la última página.
		if($pag >= $i-3) echo NULL;
		else{
			echo '<li class="inactive"><span>»</span></li>';
			echo '<li><a href="'.$extra.($i-1).'">'.($i-1).'</a></li>';// Enlace a la última página.
		}
	}

	/* Función para obtener los registros totales en la tabla solicitada. */
	public function registrosTotales($connect, $tabla){
		$sql = "SELECT COUNT(*) AS contar FROM $tabla";
		$query = mysqli_query($connect, $sql);
		$row = mysqli_fetch_array($query);
		return $row['contar'];
	}

	/* Función que calcula el número de páginas. */
	public function nPag($registros_totales, $noReg){
		return ceil($registros_totales/$noReg);
	}

	/* Función para obtener los registros totales en la tabla solicitada. */
	public function registrosTotalesCurp($connect, $curp){
		$sql = "SELECT COUNT(*) AS contar FROM nomina WHERE curp = '$curp'";
		$query = mysqli_query($connect, $sql);
		$row = mysqli_fetch_array($query);
		return $row['contar'];
	}

	/* Función para obtener los registros totales en la tabla solicitada. */
	public function registrosTotalesRfc($connect, $rfc){
		$sql = "SELECT COUNT(*) AS contar FROM nomina WHERE rfc = '$rfc'";
		$query = mysqli_query($connect, $sql);
		$row = mysqli_fetch_array($query);
		return $row['contar'];
	}

	/* Función para obtener los registros totales en la tabla solicitada. */
	public function registrosTotalesBimestre($connect, $bimestre){
		$sql = "SELECT COUNT(*) AS contar FROM nomina WHERE bimestre = '$bimestre'";
		$query = mysqli_query($connect, $sql);
		$row = mysqli_fetch_array($query);
		return $row['contar'];
	}

	/* Función para obtener los registros totales en la tabla solicitada. */
	public function registrosTotalesQuincena($connect, $quincena){
		$sql = "SELECT COUNT(*) AS contar FROM nomina WHERE quincena = '$quincena'";
		$query = mysqli_query($connect, $sql);
		$row = mysqli_fetch_array($query);
		return $row['contar'];
	}

	/* Función para obtener los registros totales en la tabla solicitada. */
	public function registrosTotalesNombre($connect, $a_paterno, $a_materno, $nombre){
		$sql = "SELECT COUNT(*) AS contar FROM nomina WHERE a_paterno LIKE '%$a_paterno%' AND a_materno LIKE '%$a_materno%' AND nombre LIKE '%$nombre%'";
		$query = mysqli_query($connect, $sql);
		$row = mysqli_fetch_array($query);
		return $row['contar'];
	}
}
?>