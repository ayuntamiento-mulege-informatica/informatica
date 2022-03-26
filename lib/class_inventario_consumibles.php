<?php
/**
 *
 */
class inventario_consumibles {
  // Lista de consumibles
  function listaConsumibles($connect, $pag, $noReg) {
    $sql = "SELECT * FROM consumibles ORDER BY id ASC LIMIT ".($pag-1)*$noReg.",$noReg";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $consumibles[] = array(
        'id' => $row['id'],
        'marca' => $row['marca'],
        'modelo' => $row['modelo'],
        'tipo' => $row['tipo'],
        'cantidad' => $row['cantidad']
      );
    }

    if (isset($consumibles)) { return $consumibles; }
    else { return null; }
  }

  // Función para registrar nuevos consumibles
  function registroRecienteConsumible($connect) {
    $sql = "SELECT MAX(id) AS maximo FROM consumibles";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    return $row['maximo'];
  }
}

?>
