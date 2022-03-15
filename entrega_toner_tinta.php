<?php
require_once 'lib/class_entrega_toner_tinta.php';

$entrega_toner_tinta = new entrega_toner_tinta;

$lista_toner_tinta = $entrega_toner_tinta -> listaTonerTinta($connect, $pag, $noReg);
// $lista_areas_trabajo = $reportes_mantenimiento -> listaAreasTrabajo($connect);

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row">
    <div class="col-12 centrar-contenedor">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h2>Bitácora de entrega de toner y tinta</h2>
        </div>
        <div class="contenido-contenedor">
          <div class="container-fluid">
            <div class="row">
              <div class="col-6">
                <h3>Registros</h3>
                <a class="enlace-boton" href="/nuevo_registro_toner_tinta">Nuevo registro</a>
                <a class="enlace-boton" href="/lista_entrega_toner_tinta">Lista entrega de toner y tinta</a>
              </div>

              <div class="col-6">
                <h3>Buscar registros</h3>

                <form class="container-fluid" action="/lista_reportes_mantenimiento" method="post">
                  <div class="row justify-content-center">
                    <div class="col-6">
                      <label for="">Id:</label><br>
                      <input type="text" name="id">
                    </div>

                    <div class="col-6">
                      <label for="">Fecha de cambio:</label><br>
                      <input type="date" name="fecha_cambio">
                    </div>

                    <div class="col-12">
                      <label for="">Área:</label><br>
                      <!-- <input type="text" name="area_trabajo"> -->
                      <select name="area_trabajo">
                        <option value=""></option>
                        <?php if (isset($lista_areas_trabajo)): ?>
                          <?php foreach ($lista_areas_trabajo as $area_trabajo): ?>
                            <option value="<?php echo $area_trabajo['area_trabajo']; ?>"><?php echo $area_trabajo['area_trabajo']; ?></option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </select>
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
  location.href="/entrega_toner_tinta";
  </script>';

  unset($_SESSION['msg']);
}

include_once 'footer.php';
?>
