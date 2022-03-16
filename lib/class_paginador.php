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
	public function registrosTotalesListaReportesMantenimiento($connect, $fecha_ingreso, $area_trabajo, $unidad){
		$sql = "SELECT COUNT(*) AS contar FROM bitacora_mantenimiento WHERE fecha_ingreso LIKE '%$fecha_ingreso%' AND area_trabajo LIKE '%$area_trabajo%' AND unidad LIKE '%$unidad%'";
		$query = mysqli_query($connect, $sql);
		$row = mysqli_fetch_array($query);
		return $row['contar'];
	}

	/* Función para obtener los registros totales de la bitácora de entrega de toner y tinta de acuerdo a lo solicitado en el formulario de búsqueda. */
	public function registrosTotaleslistaEntregaTonerTinta($connect, $fecha_cambio, $area, $impresora, $tipo, $especificaciones){
		$sql = "SELECT COUNT(*) AS contar FROM bitacora_entrega_tinta_toner WHERE fecha_cambio LIKE '%$fecha_cambio%' AND area LIKE '%$area%' AND impresora LIKE '%$impresora%' AND tipo LIKE '%$tipo%' AND especificaciones LIKE '%$especificaciones%'";
		$query = mysqli_query($connect, $sql);
		$row = mysqli_fetch_array($query);
		return $row['contar'];
	}
}
?>
