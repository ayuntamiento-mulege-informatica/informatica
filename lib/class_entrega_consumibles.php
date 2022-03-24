<?php
/**
*
*/
class entrega_consumibles {
  // Listado de todas las entregas de toner y tinta.
  function listaConsumibles($connect, $pag, $noReg) {
    $sql = "SELECT * FROM bitacora_entrega_consumibles ORDER BY id ASC LIMIT ".($pag-1)*$noReg.",$noReg";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $tt[] = array(
        'id' => $row['id'],
        'fecha_cambio' => $row['fecha_cambio'],
        'area' => $row['area'],
        'impresora' => $row['impresora'],
        'tipo' => $row['tipo'],
        'especificaciones' => $row['especificaciones'],
        'cantidad' => $row['cantidad'],
        'recibe' => $row['recibe'],
        'evidencia' => $row['evidencia']
      );
    }

    if (isset($tt)) { return $tt; }
    else { return null; }
  }

  // Listado del resultado de la búsqueda de entregas de toner y tinta.
  function listaConsumiblesBuscar($connect, $fecha_cambio, $area, $impresora, $tipo, $especificaciones, $pag, $noReg) {
    $sql = "SELECT * FROM bitacora_entrega_consumibles WHERE fecha_cambio LIKE '%$fecha_cambio%' AND area LIKE '%$area%' AND impresora LIKE '%$impresora%' AND tipo LIKE '%$tipo%' AND especificaciones LIKE '%$especificaciones%' ORDER BY id ASC LIMIT ".($pag-1)*$noReg.",$noReg";

    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $tt[] = array(
        'id' => $row['id'],
        'fecha_cambio' => $row['fecha_cambio'],
        'area' => $row['area'],
        'impresora' => $row['impresora'],
        'tipo' => $row['tipo'],
        'especificaciones' => $row['especificaciones'],
        'cantidad' => $row['cantidad'],
        'recibe' => $row['recibe'],
        'evidencia' => $row['evidencia']
      );
    }

    if (isset($tt)) { return $tt; }
    else { return null; }
  }

  function infoReporte($connect, $id){
    $sql = "SELECT * FROM bitacora_entrega_consumibles WHERE id = $id";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    return array(
      'id' => $row['id'],
      'fecha_cambio' => $row['fecha_cambio'],
      'area' => $row['area'],
      'impresora' => $row['impresora'],
      'tipo' => $row['tipo'],
      'especificaciones' => $row['especificaciones'],
      'cantidad' => $row['cantidad'],
      'recibe' => $row['recibe'],
      'evidencia' => $row['evidencia']
    );
  }

  // Función para obtener registros de entrega de toner o tinta más reciente.
  function registroRecienteTonerTinta($connect) {
    $sql = "SELECT MAX(id) AS maximo FROM bitacora_entrega_consumibles";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    return $row['maximo'];
  }

  // Función para registrar nueva entrega de toner o tinta.
  function nuevaEntregaTonerTinta($connect, $id, $fecha_cambio, $area, $impresora, $tipo, $especificaciones, $cantidad, $recibe, $evidencia) {
    if (isset($evidencia)) {
      $ruta_evidencia = $this -> procesarEvidencia($evidencia, $id);
    }

    $sql = "INSERT INTO bitacora_entrega_consumibles (id, fecha_cambio, area, impresora, tipo, especificaciones, cantidad, recibe, evidencia) VALUES ($id, '$fecha_cambio', '$area', '$impresora', '$tipo', '$especificaciones', '$cantidad', '$recibe', '$ruta_evidencia')";

    mysqli_query($connect, $sql) or die($connect -> error.' No se ha podido realizar el registro.');

    return 'El registro se ha realizado correctamente.';
  }

  // Función para registrar nueva entrega de toner o tinta.
  function actualizarEntregaTonerTinta($connect, $id, $fecha_cambio, $area, $impresora, $tipo, $especificaciones, $cantidad, $recibe, $evidencia) {
    if (isset($evidencia)) {
      $ruta_evidencia = $this -> procesarEvidencia($evidencia, $id);

      $sql = "UPDATE bitacora_entrega_consumibles SET fecha_cambio = '$fecha_cambio', area = '$area', impresora = '$impresora', tipo = '$tipo', especificaciones = '$especificaciones', cantidad = '$cantidad', recibe = '$recibe', evidencia = '$ruta_evidencia' WHERE id = $id";
    }
    else {
      $sql = "UPDATE bitacora_entrega_consumibles SET fecha_cambio = '$fecha_cambio', area = '$area', impresora = '$impresora', tipo = '$tipo', especificaciones = '$especificaciones', cantidad = '$cantidad', recibe = '$recibe' WHERE id = $id";
    }

    mysqli_query($connect, $sql) or die($connect -> error.' No se ha podido actualizar el registro '.$id.'.');

    return 'El registro '.$id.' se ha actualizado correctamente.';
  }

  // Procesamiento de evidencia.
  private function procesarEvidencia($evidencia, $id) {
    $directorio = '../evidencia/'.$id.'.jpg';
    $thumbnail = '../evidencia/thumbnail_'.$id.'.jpg';
    if(move_uploaded_file($evidencia, $directorio)){
      // Redimensiona la imagen asociada a la evidencia para ahorrar espacio de almacenamiento y evitar en lo posible el uso excesivo de RAM y CPU.
      passthru("convert -resize 1024x1024 -background white -alpha remove -alpha off -quality 80 $directorio $directorio");

      // Crea una vista en miniatura de la imagen asociada a la evidencia.
      passthru("convert -thumbnail 256x256 -background white -alpha remove -alpha off -quality 80 $directorio $thumbnail");

      return $id.'.jpg';
    }
    else {
      echo 'No fue posible subir la imagen.';
    }
  }

  // Lista de impresoras.
  function listaImpresoras($connect) {
    $sql = "SELECT impresora FROM bitacora_entrega_consumibles GROUP BY impresora";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $impresora[] = array( 'impresora' => $row['impresora'] );
    }

    if (isset($impresora)) { return $impresora; }
    else { return null; }
  }

  // Lista de tipos de impresora.
  function listaTipoImpresora($connect) {
    $sql = "SELECT tipo FROM bitacora_entrega_consumibles GROUP BY tipo";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $tipo[] = array( 'tipo' => $row['tipo'] );
    }

    if (isset($tipo)) { return $tipo; }
    else { return null; }
  }

  // Lista de especificaciones de tinta o toner.
  function listaEspecificaciones($connect) {
    $sql = "SELECT especificaciones FROM bitacora_entrega_consumibles GROUP BY especificaciones";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $especificaciones[] = array( 'especificaciones' => $row['especificaciones'] );
    }

    if (isset($especificaciones)) { return $especificaciones; }
    else { return null; }
  }
}

?>
