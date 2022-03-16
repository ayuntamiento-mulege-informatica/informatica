<?php
require_once 'lib/class_reportes_mantenimiento.php';
require_once 'lib/class_areas_trabajo.php';

$reportes_mantenimiento = new reportes_mantenimiento;
$areas_trabajo = new areas_trabajo;


$lista_unidades = $reportes_mantenimiento -> listaEquipos($connect);
$lista_areas_trabajo = $areas_trabajo -> listaAreasTrabajo($connect);

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row">
    <div class="col-12 centrar-contenedor">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h2>Bitácora de mantenimiento de equipo</h2>
        </div>
        <div class="contenido-contenedor">
          <div class="container-fluid">
            <div class="row">
              <div class="col-6">
                <h3>Reportes</h3>
                <a class="enlace-boton" href="/nuevo_reporte_mantenimiento">Nuevo reporte</a>
                <a class="enlace-boton" href="/lista_reportes_mantenimiento">Lista de reportes</a>
              </div>

              <div class="col-6">
                <h3>Buscar reporte</h3>

                <form class="container-fluid" action="/lista_reportes_mantenimiento" method="post">
                  <div class="row justify-content-center">
                    <div class="col-6">
                      <label for="">Fecha del entrada:</label><br>
                      <input type="date" name="fecha_ingreso">
                    </div>

                    <div class="col-6">
                      <label for="">Unidad:</label><br>
                      <input list="lista_unidades" type="text" name="unidad">
                    </div>

                    <div class="col-12">
                      <label for="">Área:</label><br>
                      <input list="lista_areas" type="text" name="area_trabajo">
                    </div>

                    <div class="">
                      <input type="submit" name="accion" value="Buscar">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
if (isset($_SESSION['msg'])) {
  echo '<script>
  alert("'.$_SESSION['msg'].'");
  location.href="/bitacora_mantenimiento";
  </script>';

  unset($_SESSION['msg']);
}
?>

<?php if (isset($lista_areas_trabajo)): ?>
  <datalist id="lista_areas">
    <?php foreach ($lista_areas_trabajo as $area_trabajo): ?>
      <option value="<?php echo $area_trabajo['area']; ?>"><?php echo $area_trabajo['area']; ?></option>
    <?php endforeach; ?>
  </datalist>
<?php endif; ?>

<?php if (isset($lista_unidades)): ?>
  <datalist id="lista_unidades">
    <?php foreach ($lista_unidades as $unidad): ?>
      <option value="<?php echo $unidad['unidad']; ?>"><?php echo $unidad['unidad']; ?></option>
    <?php endforeach; ?>
  </datalist>
<?php endif; ?>

<?php
include_once 'footer.php';
?>
