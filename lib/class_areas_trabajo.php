<?php
/**
 *
 */
class areas_trabajo {
  // Lista de todas las áreas de trabajo.
  function listaAreasTrabajo($connect) {
    $sql = "SELECT * FROM areas_trabajo ORDER BY area ASC";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $area[] = array(
        'id' => $row['id'],
        'area' => $row['area']
      );
    }

    if (isset($area)) { return $area; }
    else { return null; }
  }

  // Consulta un área de trabajo específica.
  function areaTrabajoEspecifica($connect, $id) {
    $sql = "SELECT * FROM areas_trabajo WHERE id = $id";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    return array(
      'id' => $row['id'],
      'area' => $row['area']
    );
  }
}

?>
