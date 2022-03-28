<?php
/**
 *
 */
class responsables {
  // Lista de responsables.
  function listaResponsables($connect, $pag, $noReg) {
    // CODIGO AQUÍ
  }

  function listaResponsablesBuscar($connect) {
    $sql = "SELECT * FROM responsables ORDER BY nombre ASC";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $responsable[] = array(
        'id' => $row['id'],
        'nombre' => $row['nombre'],
        'area' => $row['area']
      );
    }
  }

  // Responsable de individual
  function responsableIndividual($connect, $id) {
    $sql = "SELECT * FROM responsables WHERE id = $id";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    return array(
      'id' => $row['id'],
      'nombre' => $row['nombre'],
      'area' => $row['area']
    );
  }
}

?>
