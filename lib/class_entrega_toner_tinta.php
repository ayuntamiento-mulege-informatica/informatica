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
    else { return false; }
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
}

?>
