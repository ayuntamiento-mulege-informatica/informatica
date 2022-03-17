<?php
require_once 'lib/class_reportes_mantenimiento.php';
require_once 'lib/class_lista_usuarios.php';

$reportes = new reportes_mantenimiento;
$usuarios = new lista_usuarios;

$info_reporte = $reportes -> infoReporte($connect, $parametro_2);
$lista_usuarios = $usuarios -> listaDeUsuarios($connect);

if (isset($_SESSION['lista_reportes_mantenimiento'])) { unset($_SESSION['lista_reportes_mantenimiento']); }

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row">
    <div class="col-12">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h2>Nuevo reporte de mantenimiento</h2>
          <p align="center">
            <a href="/nuevo_reporte_mantenimiento" title="Nuevo reporte"> <span class="fas fa-2x fa-plus"></span> </a>
            <a href="/imprimir_reporte_mantenimiento/<?php echo $info_reporte['reporte']; ?>" title="Imprimir reporte de mantenimiento" target="_blank"> <span class="fas fa-2x fa-print"></span> </a>
          </p>
        </div>
        <div class="contenido-contenedor">
          <form class="container-fluid" action="/lib/procesar_info_reporte_mantenimiento.php" method="post">
            <div class="row justify-content-center">
              <div class="col-2">
                <label for="reporte">No. de reporte:</label><br>
                <input id="reporte" type="text" name="reporte" value="<?php echo $info_reporte['reporte']; ?>">
              </div>

              <div class="col-3">
                <label for="fecha_ingreso">Fecha de ingreso:</label><br>
                <input id="fecha_ingreso" type="date" name="fecha_ingreso" value="<?php echo $info_reporte['fecha_ingreso']; ?>">
              </div>

              <div class="col-3">
                <label for="fecha_salida">Fecha de salida:</label><br>
                <input id="fecha_salida" type="date" name="fecha_salida" value="<?php echo $info_reporte['fecha_salida']; ?>">
              </div>

              <div class="col-4">
                <label for="area_trabajo">Área de trabajo:</label><br>
                <input id="area_trabajo" type="text" name="area_trabajo" value="<?php echo $info_reporte['area_trabajo']; ?>">
              </div>

              <div class="col-3">
                <label for="unidad">Unidad:</label><br>
                <input id="unidad" type="text" name="unidad" value="<?php echo $info_reporte['unidad']; ?>">
              </div>

              <div class="col-3">
                <label for="marca">Marca:</label><br>
                <input id="marca" type="text" name="marca" value="<?php echo $info_reporte['marca']; ?>">
              </div>

              <div class="col-3">
                <label for="modelo">Modelo:</label><br>
                <input id="modelo" type="text" name="modelo" value="<?php echo $info_reporte['modelo']; ?>">
              </div>

              <div class="col-3">
                <label for="solicitante">Solicitante:</label><br>
                <input id="solicitante" type="text" name="solicitante" value="<?php echo $info_reporte['solicitante']; ?>">
              </div>

              <div class="col-6">
                <label for="actividad">Actividad:</label><br>
                <textarea id="actividad" name="actividad" rows="8"><?php echo $info_reporte['actividad']; ?></textarea>
              </div>

              <div class="col-6">
                <label for="observaciones">Observaciones:</label><br>
                <textarea id="observaciones" name="observaciones" rows="8"><?php echo $info_reporte['observaciones']; ?></textarea>
              </div>

              <div class="col-6">
                <label for="conclusiones">Conclusiones:</label><br>
                <textarea id="conclusiones" name="conclusiones" rows="8"><?php echo $info_reporte['conclusiones']; ?></textarea>
              </div>


              <div class="col-6">
                <label for="estado_final">Estado final:</label><br>
                <textarea id="estado_final" name="estado_final" rows="8"><?php echo $info_reporte['estado_final']; ?></textarea>
              </div>

              <div class="col-6">
                <label for="responsable">Responsable:</label><br>
                <select name="responsable" required>
                  <!-- <option value=""></option> -->
                  <?php if (isset($lista_usuarios)): ?>
                    <?php foreach ($lista_usuarios as $usr): ?>
                      <?php if ($usr['nombre'] == $info_reporte['responsable']): ?>
                        <option value="<?php echo $usr['nombre']; ?>" selected><?php echo $usr['nombre']; ?></option>
                      <?php else: ?>
                        <option value="<?php echo $usr['nombre']; ?>"><?php echo $usr['nombre']; ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>
            </div>

            <div class="row justify-content-center">
              <div class="col-2 centrar-botones">
                <input type="submit" name="accion" value="Actualizar">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
if (isset($_SESSION['msg'])) {
  echo '<script>
  alert("'.$_SESSION['msg'].'");
  location.href="/editar_reporte_mantenimiento/'.$parametro_2.'";
  </script>';

  unset($_SESSION['msg']);
}

include_once 'footer.php';
?>
