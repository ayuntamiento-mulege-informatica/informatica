<?php
/**
 *
 */
class lista_usuarios {
  // Lista de usuarios registrados en el sistema.
  function listaDeUsuarios($connect) {
    $sql = "SELECT id, usuario, nombre, area FROM usuarios";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $usuarios[] = array(
        'id' => $row['id'],
        'usuario' => $row['usuario'],
        'nombre' => $row['nombre'],
        'area' => $row['area']
      );
    }

    if (isset($usuarios)) { return $usuarios; }
    else { return null; }
  }

  // Información de usuario individual.
  function usuarioIndividual($connect, $id) {
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    if (isset($row)) { return $row; }
    else { return null; }
  }
}

?>
