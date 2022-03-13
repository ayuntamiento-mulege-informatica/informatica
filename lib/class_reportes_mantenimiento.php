<?php
/**
 *
 */
class reportes_mantenimiento {
  // Función para registrar reportes de mantenimiento.
  function registrarReporteMantenimiento($connect, $reporte, $fecha_ingreso, $fecha_salida, $area_trabajo, $unidad, $marca, $modelo, $solicitante, $actividad, $observaciones, $conclusiones, $responsable) {
    $sql = "INSERT INTO bitacora_mantenimiento (reporte, fecha_ingreso, fecha_salida, area_trabajo, unidad, marca, modelo, solicitante, actividad, observaciones, conclusiones, responsable) VALUES ($reporte, '$fecha_ingreso', '$fecha_salida', '$area_trabajo', '$unidad', '$marca', '$modelo', '$solicitante', '$actividad', '$observaciones', '$conclusiones', '$responsable')";

    mysqli_query($connect, $sql) or die ($connect -> error.' El reporte no ha podido ser almacenado.');

    return 'El reporte se ha almacenado exitosamente.';
  }

  // Función para actualizar información en un reporte de mantenimiento.
  function actualizarReporteMantenimiento($connect, $reporte, $fecha_ingreso, $fecha_salida, $area_trabajo, $unidad, $marca, $modelo, $solicitante, $actividad, $observaciones, $conclusiones, $responsable) {
    $sql = "UPDATE bitacora_mantenimiento SET fecha_ingreso = '$fecha_ingreso', fecha_salida = '$fecha_salida', area_trabajo = '$area_trabajo', unidad = '$unidad', marca = '$marca', modelo = '$modelo', solicitante = '$solicitante', actividad = '$actividad', observaciones = '$observaciones', conclusiones = '$conclusiones', responsable = '$responsable' WHERE reporte = $reporte";

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
        'actividad' => $row['actividad'],
        'observaciones' => $row['observaciones'],
        'conclusiones' => $row['conclusiones'],
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
      'actividad' => $row['actividad'],
      'observaciones' => $row['observaciones'],
      'conclusiones' => $row['conclusiones'],
      'responsable' => $row['responsable']
    );
  }
}

?>
