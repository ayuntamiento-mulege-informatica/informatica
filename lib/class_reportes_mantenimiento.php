<?php
/**
 *
 */
class reportes_mantenimiento {
  // Función para registrar reportes de mantenimiento.
  function registrarReporteMantenimiento($connect, $reporte, $fecha_ingreso, $fecha_salida, $area_trabajo, $unidad, $marca, $modelo, $solicitante, $recibe, $actividad, $observaciones, $conclusiones, $estado_final, $responsable) {
    $sql = "INSERT INTO bitacora_mantenimiento (reporte, fecha_ingreso, fecha_salida, area_trabajo, unidad, marca, modelo, solicitante, recibe, actividad, observaciones, conclusiones, estado_final, responsable) VALUES ($reporte, '$fecha_ingreso', '$fecha_salida', '$area_trabajo', '$unidad', '$marca', '$modelo', '$solicitante', '$recibe', '$actividad', '$observaciones', '$conclusiones', '$estado_final', '$responsable')";

    mysqli_query($connect, $sql) or die ($connect -> error.' El reporte no ha podido ser almacenado.');

    return 'El reporte se ha almacenado exitosamente.';
  }

  // Función para actualizar información en un reporte de mantenimiento.
  function actualizarReporteMantenimiento($connect, $reporte, $fecha_ingreso, $fecha_salida, $area_trabajo, $unidad, $marca, $modelo, $solicitante, $recibe, $actividad, $observaciones, $conclusiones, $estado_final, $responsable) {
    $sql = "UPDATE bitacora_mantenimiento SET fecha_ingreso = '$fecha_ingreso', fecha_salida = '$fecha_salida', area_trabajo = '$area_trabajo', unidad = '$unidad', marca = '$marca', modelo = '$modelo', solicitante = '$solicitante', recibe = '$recibe', actividad = '$actividad', observaciones = '$observaciones', conclusiones = '$conclusiones', estado_final = '$estado_final', responsable = '$responsable' WHERE reporte = $reporte";

    mysqli_query($connect, $sql) or die ($connect -> error.' No ha sido posible actualizar el reporte.');

    return 'El reporte ha sido actualizado exitosamente.';
  }

  // Función para obtener reporte más reciente.
  function reporteReciente($connect) {
    $sql = "SELECT MAX(reporte) AS maximo FROM bitacora_mantenimiento";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    return $row['maximo'];
  }

  // Función para obtener lista de reportes completa
  function listaReportesMantenimiento($connect, $pag, $noReg) {
    $sql = "SELECT * FROM bitacora_mantenimiento ORDER BY reporte ASC LIMIT ".($pag-1)*$noReg.",$noReg";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $reportes[] = array(
        'reporte' => $row['reporte'],
        'fecha_ingreso' => $row['fecha_ingreso'],
        'fecha_salida' => $row['fecha_salida'],
        'area_trabajo' => $row['area_trabajo'],
        'unidad' => $row['unidad'],
        'marca' => $row['marca'],
        'modelo' => $row['modelo'],
        'solicitante' => $row['solicitante'],
        'recibe' => $row['recibe'],
        'actividad' => $row['actividad'],
        'observaciones' => $row['observaciones'],
        'conclusiones' => $row['conclusiones'],
        'estado_final' => $row['estado_final'],
        'responsable' => $row['responsable']
      );
    }

    if (isset($reportes)) { return $reportes; }
    else { return null; }
  }

  // Función para obtener lista de reportes por búsqueda.
  function listaReportesMantenimientoBuscar($connect, $reporte, $fecha_ingreso, $unidad, $area_trabajo, $pag, $noReg) {
    if (isset($reporte)) {
      $sql = "SELECT * FROM bitacora_mantenimiento WHERE reporte = $reporte ORDER BY reporte ASC LIMIT ".($pag-1)*$noReg.",$noReg";
    }
    else {
      $sql = "SELECT * FROM bitacora_mantenimiento WHERE fecha_ingreso LIKE '%$fecha_ingreso%' AND area_trabajo LIKE '%$area_trabajo%' AND unidad LIKE '%$unidad%' ORDER BY reporte ASC LIMIT ".($pag-1)*$noReg.",$noReg";
    }

    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $reportes[] = array(
        'reporte' => $row['reporte'],
        'fecha_ingreso' => $row['fecha_ingreso'],
        'fecha_salida' => $row['fecha_salida'],
        'area_trabajo' => $row['area_trabajo'],
        'unidad' => $row['unidad'],
        'marca' => $row['marca'],
        'modelo' => $row['modelo'],
        'solicitante' => $row['solicitante'],
        'recibe' => $row['recibe'],
        'actividad' => $row['actividad'],
        'observaciones' => $row['observaciones'],
        'conclusiones' => $row['conclusiones'],
        'estado_final' => $row['estado_final'],
        'responsable' => $row['responsable']
      );
    }

    if (isset($reportes)) { return $reportes; }
    else { return null; }
  }

  // Función para obtener información de un reporte.
  function infoReporte($connect, $reporte) {
    $sql = "SELECT * FROM bitacora_mantenimiento WHERE reporte = $reporte";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    return array(
      'reporte' => $row['reporte'],
      'fecha_ingreso' => $row['fecha_ingreso'],
      'fecha_salida' => $row['fecha_salida'],
      'area_trabajo' => $row['area_trabajo'],
      'unidad' => $row['unidad'],
      'marca' => $row['marca'],
      'modelo' => $row['modelo'],
      'solicitante' => $row['solicitante'],
      'recibe' => $row['recibe'],
      'actividad' => $row['actividad'],
      'observaciones' => $row['observaciones'],
      'conclusiones' => $row['conclusiones'],
      'estado_final' => $row['estado_final'],
      'responsable' => $row['responsable']
    );
  }

  // Función para lista de unidades.
  function listaEquipos($connect){
    $sql = "SELECT unidad FROM bitacora_mantenimiento GROUP BY unidad";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $unidad[] = array('unidad' => $row['unidad']);
    }

    if (isset($unidad)) { return $unidad; }
    else { return null; }
  }

  // Función para lista de áreas de trabajo.
  function listaAreasTrabajo($connect){
    $sql = "SELECT area_trabajo FROM bitacora_mantenimiento GROUP BY area_trabajo";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $area_trabajo[] = array('area_trabajo' => $row['area_trabajo']);
    }

    if (isset($area_trabajo)) { return $area_trabajo; }
    else { return null; }
  }

  // Función para lista de marcas.
  function listaMarcas($connect){
    $sql = "SELECT marca FROM bitacora_mantenimiento GROUP BY marca";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $marca[] = array('marca' => $row['marca']);
    }

    if (isset($marca)) { return $marca; }
    else { return null; }
  }

  // Función para lista de modelos.
  function listaModelos($connect){
    $sql = "SELECT modelo FROM bitacora_mantenimiento GROUP BY modelo";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $modelo[] = array('modelo' => $row['modelo']);
    }

    if (isset($modelo)) { return $modelo; }
    else { return null; }
  }

  // Función para lista de solicitantes.
  function listaSolicitantes($connect){
    $sql = "SELECT solicitante FROM bitacora_mantenimiento GROUP BY solicitante";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $solicitante[] = array('solicitante' => $row['solicitante']);
    }

    if (isset($solicitante)) { return $solicitante; }
    else { return null; }
  }
}

?>
