<?php
require_once 'lib/class_reportes_mantenimiento.php';

$reportes = new reportes_mantenimiento;

$reporte_reciente = $reportes -> reporteReciente($connect);

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row">
    <div class="col-12">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h2>Nuevo reporte de mantenimiento</h2>
        </div>
        <div class="contenido-contenedor">
          <form class="container-fluid" action="/lib/procesar_nuevo_reporte_mantenimiento.php" method="post">
            <div class="row justify-content-center">
              <div class="col-2">
                <label for="reporte">No. de reporte:</label><br>
                <input id="reporte" type="text" name="reporte" value="<?php echo $reporte_reciente+1; ?>">
              </div>

              <div class="col-3">
                <label for="fecha_ingreso">Fecha de ingreso:</label><br>
                <input id="fecha_ingreso" type="date" name="fecha_ingreso" value="<?php echo date('Y-m-d'); ?>">
              </div>

              <div class="col-3">
                <label for="fecha_salida">Fecha de salida:</label><br>
                <input id="fecha_salida" type="date" name="fecha_salida" value="<?php echo date('Y-m-d'); ?>">
              </div>

              <div class="col-4">
                <label for="area_trabajo">Área de trabajo:</label><br>
                <input id="area_trabajo" type="text" name="area_trabajo">
              </div>

              <div class="col-3">
                <label for="unidad">Unidad:</label><br>
                <input id="unidad" type="text" name="unidad">
              </div>

              <div class="col-3">
                <label for="marca">Marca:</label><br>
                <input id="marca" type="text" name="marca">
              </div>

              <div class="col-3">
                <label for="modelo">Modelo:</label><br>
                <input id="modelo" type="text" name="modelo">
              </div>

              <div class="col-3">
                <label for="solicitante">Solicitante:</label><br>
                <input id="solicitante" type="text" name="solicitante">
              </div>

              <div class="col-6">
                <label for="actividad">Actividad:</label><br>
                <textarea id="actividad" name="actividad"></textarea>
              </div>

              <div class="col-6">
                <label for="observaciones">Observaciones:</label><br>
                <textarea id="observaciones" name="observaciones"></textarea>
              </div>

              <div class="col-6">
                <label for="conclusiones">Conclusiones:</label><br>
                <textarea id="conclusiones" name="conclusiones"></textarea>
              </div>

              <div class="col-6">
                <label for="responsable">Responsable:</label><br>
                <input id="responsable" type="text" name="responsable">
              </div>

              <div class="col-2 centrar-botones">
                <input type="submit" name="accion" value="Registrar">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include_once 'footer.php'; ?>
