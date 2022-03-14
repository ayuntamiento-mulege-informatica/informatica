<?php
/**
 *
 */
class entrega_toner_tinta {

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
}

?>
