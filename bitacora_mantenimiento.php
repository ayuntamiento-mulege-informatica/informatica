<?php
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
                      <label for="">No. de reporte:</label><br>
                      <input type="text" name="reporte">
                    </div>

                    <div class="col-6">
                      <label for="">Fecha del entrada:</label><br>
                      <input type="date" name="fecha_ingreso">
                    </div>

                    <div class="col-12">
                      <label for="">Unidad:</label><br>
                      <input type="text" name="unidad">
                    </div>

                    <div class="col-12">
                      <label for="">Área:</label><br>
                      <input type="text" name="area_trabajo">
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

include_once 'footer.php';
?>
