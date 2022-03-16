<?php
/**
*
*/
class entrega_toner_tinta {
  // Listado de todas las entregas de toner y tinta.
  function listaTonerTinta($connect, $pag, $noReg) {
    $sql = "SELECT * FROM bitacora_entrega_tinta_toner ORDER BY id ASC LIMIT ".($pag-1)*$noReg.",$noReg";
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
        'recibe' => $row['recibe']
      );
    }

    if (isset($tt)) { return $tt; }
    else { return null; }
  }

  // Listado del resultado de la búsqueda de entregas de toner y tinta.
  function listaTonerTintaBuscar($connect, $fecha_cambio, $area, $impresora, $tipo, $especificaciones, $pag, $noReg) {
    $sql = "SELECT * FROM bitacora_entrega_tinta_toner WHERE fecha_cambio LIKE '%$fecha_cambio%' AND area LIKE '%$area%' AND impresora LIKE '%$impresora%' AND tipo LIKE '%$tipo%' AND especificaciones LIKE '%$especificaciones%' ORDER BY id ASC LIMIT ".($pag-1)*$noReg.",$noReg";

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
        'recibe' => $row['recibe']
      );
    }

    if (isset($tt)) { return $tt; }
    else { return null; }
  }


  // Función para obtener registros de entrega de toner o tinta más reciente.
  function registroRecienteTonerTinta($connect) {
    $sql = "SELECT MAX(id) AS maximo FROM bitacora_entrega_tinta_toner";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    return $row['maximo'];
  }

  // Función para registrar nueva entrega de toner o tinta.
  function nuevaEntregaTonerTinta($connect, $id, $fecha_cambio, $area, $impresora, $tipo, $especificaciones, $cantidad, $recibe) {
    $sql = "INSERT INTO bitacora_entrega_tinta_toner (id, fecha_cambio, area, impresora, tipo, especificaciones, cantidad, recibe) VALUES ($id, '$fecha_cambio', '$area', '$impresora', '$tipo', '$especificaciones', '$cantidad', '$recibe')";

    mysqli_query($connect, $sql) or die($connect -> error.' No se ha podido realizar el registro.');

    return 'El registro se ha realizado correctamente.';
  }

  // Lista de impresoras.
  function listaImpresoras($connect) {
    $sql = "SELECT impresora FROM bitacora_entrega_tinta_toner GROUP BY impresora";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $impresora[] = array( 'impresora' => $row['impresora'] );
    }

    if (isset($impresora)) { return $impresora; }
    else { return null; }
  }

  // Lista de tipos de impresora.
  function listaTipoImpresora($connect) {
    $sql = "SELECT tipo FROM bitacora_entrega_tinta_toner GROUP BY tipo";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $tipo[] = array( 'tipo' => $row['tipo'] );
    }

    if (isset($tipo)) { return $tipo; }
    else { return null; }
  }

  // Lista de especificaciones de tinta o toner.
  function listaEspecificaciones($connect) {
    $sql = "SELECT especificaciones FROM bitacora_entrega_tinta_toner GROUP BY especificaciones";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $especificaciones[] = array( 'especificaciones' => $row['especificaciones'] );
    }

    if (isset($especificaciones)) { return $especificaciones; }
    else { return null; }
  }
}

?>
