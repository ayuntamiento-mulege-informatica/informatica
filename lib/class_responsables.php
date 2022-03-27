<?php
/**
 *
 */
class responsables {
  // Lista de responsables.
  function listaResponsables($connect, $pag, $noReg) {
    // CODIGO AQUÍ
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
