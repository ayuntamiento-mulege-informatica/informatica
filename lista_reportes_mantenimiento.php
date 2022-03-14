<?php
require_once 'lib/class_reportes_mantenimiento.php';
require_once 'lib/class_paginador.php';

$reportes_mantenimiento = new reportes_mantenimiento;
$paginador = new pages;

if (isset($parametro_2)) { $pag = $parametro_2; }

$registros_totales = $paginador -> registrosTotales($connect, 'bitacora_mantenimiento');
$nPag = $paginador -> nPag($registros_totales, $noReg);

if (isset($_POST['accion'])) {
  $lista_reportes = $reportes_mantenimiento -> listaReportesMantenimientoBuscar($connect, $_POST['reporte'], $_POST['fecha_ingreso'], $_POST['area_trabajo'], $_POST['unidad'], $pag, $noReg);
}
else {
  $lista_reportes = $reportes_mantenimiento -> listaReportesMantenimiento($connect, $pag, $noReg);
}

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container-fluid">
  <section class="row justify-content-center">
    <div class="col-12 centrar-contenedor">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h2>Lista de reportes de mantenimiento</h2>
        </div>

        <div class="contenido-contenedor">
          <table width="100%" style="font-size: .8rem;">
            <tr>
              <th colspan="3">OPERACIONES</th>
              <th>NO. REPORTE</th>
              <th>FECHA DE INGRESO</th>
              <th>FECHA DE SALIDA</th>
              <th>ÁREA DE TRABAJO</th>
              <th>UNIDAD</th>
              <th>MARCA</th>
              <th>MODELO</th>
              <th>SOLICITANTE</th>
              <th>ACTIVIDAD</th>
              <th>OBSERVACIONES</th>
              <th>CONCLUSIONES</th>
              <th>RESPONSABLE</th>
            </tr>

            <?php if (isset($lista_reportes)): ?>
              <?php foreach ($lista_reportes as $reporte): ?>
                <tr>
                  <td> <a href="/editar_reporte_mantenimiento/<?php echo $reporte['reporte']; ?>" title="Modificar reporte"> <span class="fas fa-2x fa-pencil-alt"></span> </a> </td>
                  <td> <a href="/eliminar_reporte_mantenimiento/<?php echo $reporte['reporte']; ?>" title="Eliminar reporte"> <span class="fas fa-2x fa-eraser"></span> </a> </td>
                  <td> <a href="/imprimir_reporte_mantenimiento/<?php echo $reporte['reporte']; ?>" title="Imprimir reporte" target="_blank"> <span class="fas fa-2x fa-print"></span> </a> </td>
                  <td><?php echo $reporte['reporte']; ?></td>
                  <td><?php echo $reporte['fecha_ingreso']; ?></td>
                  <td><?php echo $reporte['fecha_salida']; ?></td>
                  <td><?php echo $reporte['area_trabajo']; ?></td>
                  <td><?php echo $reporte['unidad']; ?></td>
                  <td><?php echo $reporte['marca']; ?></td>
                  <td><?php echo $reporte['modelo']; ?></td>
                  <td><?php echo $reporte['solicitante']; ?></td>
                  <td><?php echo $reporte['actividad']; ?></td>
                  <td><?php echo $reporte['observaciones']; ?></td>
                  <td><?php echo $reporte['conclusiones']; ?></td>
                  <td><?php echo $reporte['responsable']; ?></td>
                </tr>
              <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="12">No hay reportes para mostrar.</td>
                </tr>
            <?php endif; ?>
          </table>
        </div>
      </div>
    </div>
  </section>

  <div class="row">
    <div class="col-12">
      <ul class="paginador">
        <?php
        $extra = '/'.$parametro_1.'/';
        $paginador -> paginador($pag, $nPag, $extra);
        ?>
      </ul>
    </div>
  </div>
</main>

<?php
if (isset($_SESSION['msg'])) {
  echo '<script>
  alert("'.$_SESSION['msg'].'");
  location.href="/funcionarios";
  </script>';

  unset($_SESSION['msg']);
}

include_once 'footer.php';
?>
