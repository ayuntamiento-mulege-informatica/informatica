<?php
/**
*
*/
class inventario_impresoras {
  // Función para listar todas las impresoras del inventario.
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
}

?>
