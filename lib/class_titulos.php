<?php
require_once 'class_administraciones.php';
/**
 *
 */
class titulos {
  // Cuenta la cantidad de títulos registrados.
  function contarTitulos($connect) {
    // Obtención de la administración actual.
    $administraciones = new administraciones;
    $admin = $administraciones -> administracionActual($connect);

    $sql = "SELECT COUNT(*) AS contar FROM titulos WHERE admin = '$admin'";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    if (isset($row)) { return $row['contar']; }
    else { return null; }
  }

  function nuevoTitulo($connect, $admin, $num_titulo, $nombre, $lote, $manzana, $clave_catastral, $ubicacion_lote, $fundo_legal, $superficie_total, $colindancias, $precio_total, $precio_m2, $recibos_pago, $dia_letra, $mes_letra, $ano_letra, $leyenda_titulo, $registrado) {
    // Obtención de la administración actual.
    // $admin = $this -> administracionActual($connect);

    // Sustitución de comillas para evitar problemas al guardar en la BD
    $comillas = array("'", '"');
    $remplazo = array("\'", '\"');

    $colindancias = str_replace($comillas, $remplazo, $colindancias);

    $sql = "INSERT INTO titulos (id, admin, titulo, nombre, lote, manzana,
      ubicacion, clave_catastral, fundo, superficie, colindancias, cantidad, precio_m2,
      recibos, dia, mes, anyo, motivo, leyenda, registrado, bloqueado)
    VALUES (null, '$admin', $num_titulo, '$nombre', '$lote', '$manzana',
      '$ubicacion_lote', '$clave_catastral', '$fundo_legal', '$superficie_total',
      '$colindancias', '$precio_total', $precio_m2, '$recibos_pago', '$dia_letra',
      '$mes_letra', '$ano_letra', '', '$leyenda_titulo', '$registrado', 'N')";

    mysqli_query($connect, $sql) or die ($connect -> error);

    return 'El título se ha registrado exitosamente.';
  }

    // Función para mostrar lista de títulos.
  function listaTitulos($connect) {
    $sql = "SELECT * FROM titulos ORDER BY admin ASC";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $titulos[] = array(
        "id" => $row['id'],
        "admin" => $row['admin'],
        "titulo" => $row['titulo'],
        "nombre" => $row['nombre'],
        "lote" => $row['lote'],
        "manzana" => $row['manzana'],
        "ubicacion" => $row['ubicacion'],
        "clave_catastral" => $row['clave_catastral'],
        "fundo" => $row['fundo'],
        "superficie" => $row['superficie'],
        "colindancias" => $row['colindancias'],
        "cantidad" => $row['cantidad'],
        "precio_m2" => $row['precio_m2'],
        "recibos" => $row['recibos'],
        "dia" => $row['dia'],
        "mes" => $row['mes'],
        "anyo" => $row['anyo'],
        "motivo" => $row['motivo'],
        "leyenda" => $row['leyenda'],
        "registrado" => $row['registrado'],
        "bloqueado" => $row['bloqueado']
      );
    }

    if (isset($titulos)) { return $titulos; }
    else { return null; }
  }

  // Función para mostrar lista de títulos de nombres buscados.
  function listaTitulosNombre($connect, $admin, $nombre) {
    $sql = "SELECT * FROM titulos WHERE admin = '$admin' AND nombre LIKE '%$nombre%'";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $titulos[] = array(
        "id" => $row['id'],
        "admin" => $row['admin'],
        "titulo" => $row['titulo'],
        "nombre" => $row['nombre'],
        "lote" => $row['lote'],
        "manzana" => $row['manzana'],
        "ubicacion" => $row['ubicacion'],
        "clave_catastral" => $row['clave_catastral'],
        "fundo" => $row['fundo'],
        "superficie" => $row['superficie'],
        "colindancias" => $row['colindancias'],
        "cantidad" => $row['cantidad'],
        "precio_m2" => $row['precio_m2'],
        "recibos" => $row['recibos'],
        "dia" => $row['dia'],
        "mes" => $row['mes'],
        "anyo" => $row['anyo'],
        "motivo" => $row['motivo'],
        "leyenda" => $row['leyenda'],
        "registrado" => $row['registrado'],
        "bloqueado" => $row['bloqueado']
      );
    }

    if (isset($titulos)) { return $titulos; }
    else { return null; }
  }

  // Función que encuentra título por su Número
  function consultarIdTitulo($connect, $id){
    $sql = "SELECT * FROM titulos WHERE id = $id";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    if (isset($row)) {
      return array(
        "id" => $row['id'],
        "admin" => $row['admin'],
        "titulo" => $row['titulo'],
        "nombre" => $row['nombre'],
        "lote" => $row['lote'],
        "manzana" => $row['manzana'],
        "ubicacion" => $row['ubicacion'],
        "clave_catastral" => $row['clave_catastral'],
        "fundo" => $row['fundo'],
        "superficie" => $row['superficie'],
        "colindancias" => $row['colindancias'],
        "cantidad" => $row['cantidad'],
        "precio_m2" => $row['precio_m2'],
        "recibos" => $row['recibos'],
        "dia" => $row['dia'],
        "mes" => $row['mes'],
        "anyo" => $row['anyo'],
        "motivo" => $row['motivo'],
        "leyenda" => $row['leyenda'],
        "registrado" => $row['registrado'],
        "bloqueado" => $row['bloqueado']
      );
    }
    else {
      return null;
    }
  }

  // Función que obtiene ID de un título.
  function obtenerIdTitulo($connect, $admin, $titulo){
    $sql = "SELECT id FROM titulos WHERE admin = '$admin' AND titulo = $titulo";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    if (isset($row)) { return $row['id']; }
    else { return null; }
  }

  // Función para desbloquear títulos.
  function desbloquearTitulo($connect, $admin, $titulo) {
    $titulo_existe = $this -> comprobarExistenciaTitulo($connect, $admin, $titulo);

    if ($titulo_existe == 1) {
      $sql = "UPDATE titulos SET bloqueado = 'N' WHERE titulo = $titulo AND admin = '$admin'";
      mysqli_query($connect, $sql) or die ($connect -> error);

      return 'El título '.$titulo.' ha sido desbloqueado.';
    }
    else {
      return 'El título solicitado no existe.';
    }
  }

  // Función para bloquear título al imprimir página 1.
  function bloquearTitulo($connect, $id) {
    $sql = "UPDATE titulos SET bloqueado = 'S' WHERE id = $id";
    mysqli_query($connect, $sql) or die ($connect -> error);
  }

  // Función para comprobar la existencia del título a desbloquear.
  private function comprobarExistenciaTitulo($connect, $admin, $titulo){
    $sql = "SELECT COUNT(*) AS contar FROM titulos WHERE titulo = $titulo AND admin = '$admin'";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    return $row['contar'];
  }

  // Función para modificar título.
  function modificarTitulo($connect, $num_titulo, $nombre, $lote, $manzana, $clave_catastral, $ubicacion_lote, $fundo_legal, $superficie_total, $colindancias, $precio_total, $precio_m2, $recibos_pago, $dia, $mes, $anyo, $leyenda) {
    // Sustitución de comillas para evitar problemas al guardar en la BD
    $comillas = array("'", '"');
    $remplazo = array("\'", '\"');

    $colindancias = str_replace($comillas, $remplazo, $colindancias);

    $sql = "UPDATE titulos SET nombre = '$nombre', lote = '$lote', manzana = '$manzana', ubicacion = '$ubicacion_lote', clave_catastral = '$clave_catastral', fundo = '$fundo_legal', superficie = '$superficie_total', colindancias = '$colindancias', cantidad = '$precio_total', precio_m2 = $precio_m2, recibos = '$recibos_pago', dia = '$dia', mes = '$mes', anyo = '$anyo', leyenda = '$leyenda', bloqueado = 'S' WHERE titulo = $num_titulo";

    mysqli_query($connect, $sql) or die ($connect -> error);

    return 'El título ha sido modificado exitosamente.';
  }
}
?>
