<?php
/**
*
*/
class inventario_impresoras {
  // Función para listar todas las impresoras del inventario con paginación.
  function listaImpresoras($connect, $pag, $noReg) {
    $sql = "SELECT * FROM impresoras ORDER BY area ASC LIMIT ".($pag-1)*$noReg.",$noReg";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $impresoras[] = array(
        'id' => $row['id'],
        'area' => $row['area'],
        'cantidad' => $row['cantidad'],
        'marca' => $row['marca'],
        'modelo' => $row['modelo'],
        'tipo' => $row['tipo'],
        'modelo_tinta_toner' => $row['modelo_tinta_toner']
      );
    }

    if (isset($impresoras)) { return $impresoras; }
    else { return null; }
  }

  // Función para listar impresoras buscadas.
  function listaImpresorasBuscar($connect, $area, $marca, $modelo, $tipo, $modelo_tinta_toner, $pag, $noReg) {
    $sql = "SELECT * FROM impresoras WHERE area LIKE '%$area%' AND marca LIKE '%$marca%' AND modelo LIKE '%$modelo%' AND tipo LIKE '%$tipo%'  AND modelo_tinta_toner LIKE '%$modelo_tinta_toner%' ORDER BY area ASC LIMIT ".($pag-1)*$noReg.",$noReg";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $impresoras[] = array(
        'id' => $row['id'],
        'area' => $row['area'],
        'cantidad' => $row['cantidad'],
        'marca' => $row['marca'],
        'modelo' => $row['modelo'],
        'tipo' => $row['tipo'],
        'modelo_tinta_toner' => $row['modelo_tinta_toner']
      );
    }

    if (isset($impresoras)) { return $impresoras; }
    else { return null; }
  }

  // Registro más reciente en el inventario de impresoras.
  function registroRecienteImpresora($connect) {
    $sql = "SELECT MAX(id) AS maximo FROM impresoras";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    return $row['maximo'];
  }

  // Función para registrar nueva impresora.
  function registrarImpresora($connect, $id, $area, $cantidad, $marca, $modelo, $tipo, $modelo_tinta_toner) {
    $sql = "INSERT INTO impresoras (id, area, cantidad, marca, modelo, tipo, modelo_tinta_toner) VALUES ($id, '$area', $cantidad, '$marca', '$modelo', '$tipo', '$modelo_tinta_toner')";

    mysqli_query($connect, $sql) or die ($connect -> error.' No se pudo realizar el registro de la impresora.');

    return 'El registro de la impresora ha sido exitoso.';
  }

  // Función para registrar nueva impresora.
  function actualizarImpresora($connect, $id, $area, $cantidad, $marca, $modelo, $tipo, $modelo_tinta_toner) {
    $sql = "UPDATE impresoras SET area = '$area', cantidad = $cantidad, marca = '$marca', modelo = '$modelo', tipo = '$tipo', modelo_tinta_toner = '$modelo_tinta_toner' WHERE id = $id";

    mysqli_query($connect, $sql) or die ($connect -> error.' No se pudo actualizar la impresora.');

    return 'La actualización de la impresora ha sido exitosa.';
  }

  // Función para extraer información de una impresora.
  function infoImpresora($connect, $id) {
    $sql = "SELECT * FROM impresoras WHERE id = $id";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);
    $impresora = array(
      'id' => $row['id'],
      'area' => $row['area'],
      'cantidad' => $row['cantidad'],
      'marca' => $row['marca'],
      'modelo' => $row['modelo'],
      'tipo' => $row['tipo'],
      'modelo_tinta_toner' => $row['modelo_tinta_toner']
    );

    if (isset($impresora)) { return $impresora; }
    else { return null; }
  }

  // Función para listar marcas de impresoras.
  function listaImpresorasMarcas($connect) {
    $sql = "SELECT marca FROM impresoras GROUP BY marca";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $marcas[] = array( 'marca' => $row['marca'] );
    }

    if (isset($marcas)) { return $marcas; }
    else { return null; }
  }

  // Función para listar tipos de impresoras.
  function listaImpresorasTipo($connect) {
    $sql = "SELECT tipo FROM impresoras GROUP BY tipo";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $tipos[] = array( 'tipo' => $row['tipo'] );
    }

    if (isset($tipos)) { return $tipos; }
    else { return null; }
  }

  // Función para listar modelos de impresoras.
  function listaImpresorasModelo($connect) {
    $sql = "SELECT modelo FROM impresoras GROUP BY modelo";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $modelos[] = array( 'modelo' => $row['modelo'] );
    }

    if (isset($modelos)) { return $modelos; }
    else { return null; }
  }

  // Función para listar tinta o toner de impresoras.
  function listaImpresorasTinta($connect) {
    $sql = "SELECT modelo_tinta_toner FROM impresoras GROUP BY modelo_tinta_toner";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $modelo_tinta_toner[] = array( 'modelo_tinta_toner' => $row['modelo_tinta_toner'] );
    }

    if (isset($modelo_tinta_toner)) { return $modelo_tinta_toner; }
    else { return null; }
  }
}

?>
