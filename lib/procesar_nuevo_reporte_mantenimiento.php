<?php
require_once '../connect.php';
require_once 'class_reportes_mantenimiento.php';

$reportes = new reportes_mantenimiento;

session_start();

if (isset($_POST['accion'])) {
  $_SESSION['msg'] = $reportes -> registrarReporteMantenimiento ($connect, $_POST['reporte'], $_POST['fecha_ingreso'], $_POST['fecha_salida'], $_POST['area_trabajo'], $_POST['unidad'], $_POST['marca'], $_POST['modelo'], $_POST['solicitante'], $_POST['recibe'], $_POST['actividad'], $_POST['observaciones'], $_POST['conclusiones'], $_POST['estado_final'], $_POST['responsable']);

  header('location: /bitacora_mantenimiento');
}
?>
