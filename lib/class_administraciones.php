<?php
/**
 *
 */
class administraciones {
  // Función para obtener el número de la administración actual.
  function administracionActual($connect) {
    $sql = "SELECT admin FROM administraciones ORDER BY id DESC LIMIT 1";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    if (isset($row)) { return $row['admin']; }
    else { return null; }
  }

  // Función para listar las administraciones.
  function listaAdministraciones($connect) {
    $sql = "SELECT * FROM administraciones ORDER BY id ASC";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $admin[] = array(
        'id' => $row['id'],
        'admin' => $row['admin']
      );
    }

    if (isset($admin)) { return $admin; }
    else { return null; }
  }

  // Registro de funcionarios
  function registrarAdministracion($connect, $admin, $presidente_municipal, $sindico_municipal, $secretario_general, $director_catastro, $tesorero_municipal) {
    $sql = "INSERT INTO administraciones (id, admin, presidente_municipal, sindico_municipal, secretario_general, director_catastro, tesorero_municipal) VALUES (null, '$admin', '$presidente_municipal', '$sindico_municipal', '$secretario_general', '$director_catastro', '$tesorero_municipal')";

    mysqli_query($connect, $sql) or die ($connect -> error);

    return 'Administración registrada exitosamente.';
  }

  // Actualización de datos de funcionarios
  function actualizarAdministracion($connect, $admin, $presidente_municipal, $sindico_municipal, $secretario_general, $director_catastro, $tesorero_municipal) {
    $sql = "UPDATE administraciones SET presidente_municipal = '$presidente_municipal', sindico_municipal = '$sindico_municipal', secretario_general = '$secretario_general', director_catastro = '$director_catastro', tesorero_municipal = '$tesorero_municipal' WHERE admin = '$admin'";

    mysqli_query($connect, $sql) or die ($connect -> error);

    return 'Funcionarios actualizados exitosamente.';
  }

  function contarFuncionarios($connect) {
    $sql = "SELECT COUNT(*) AS contar FROM administraciones";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    if(isset($row)){ return $row['contar']; }
    else { return null; }
  }

  function listaFuncionarios($connect, $admin) {
    $sql = "SELECT * FROM administraciones WHERE admin = '$admin'";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    if (isset($row)) {
      return array(
        'presidente_municipal' => $row['presidente_municipal'],
        'sindico_municipal' => $row['sindico_municipal'],
        'secretario_general' => $row['secretario_general'],
        'director_catastro' => $row['director_catastro'],
        'tesorero_municipal' => $row['tesorero_municipal']
      );
    }
    else { return null; }
  }

  function imprimirFuncionarios($connect, $admin) {
    $sql = "SELECT * FROM administraciones WHERE admin = '$admin'";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    if (isset($row)) {
      return array(
        'admin' => $row['admin'],
        'presidente_municipal' => $row['presidente_municipal'],
        'sindico_municipal' => $row['sindico_municipal'],
        'secretario_general' => $row['secretario_general'],
        'director_catastro' => $row['director_catastro'],
        'tesorero_municipal' => $row['tesorero_municipal']
      );
    }
    else { return null; }
  }
}

?>
