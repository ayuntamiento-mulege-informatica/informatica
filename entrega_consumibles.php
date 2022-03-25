<?php
require_once 'lib/class_entrega_consumibles.php';
require_once 'lib/class_areas_trabajo.php';

$entrega_consumibles = new entrega_consumibles;
$areas_trabajo = new areas_trabajo;

$lista_toner_tinta = $entrega_consumibles -> listaConsumibles($connect, $pag, $noReg);
$lista_impresoras = $entrega_consumibles -> listaImpresoras($connect);
$lista_tipo_impresora = $entrega_consumibles -> listaTipoImpresora($connect);
$lista_especificaciones = $entrega_consumibles -> listaEspecificaciones($connect);
$lista_areas_trabajo = $areas_trabajo -> listaAreasTrabajo($connect);

if (isset($_SESSION['lista_toner_tinta'])) { unset($_SESSION['lista_toner_tinta']); }

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
                <a class="enlace-boton" href="/nuevo_registro_consumibles">Nuevo registro</a>
                <a class="enlace-boton" href="/lista_entrega_consumibles">Lista de entrega de consumibles</a>
              </div>

              <div class="col-6">
                <h3>Buscar registros</h3>

                <form class="container-fluid" action="/lista_entrega_consumibles" method="post">
                  <div class="row justify-content-center">
                    <div class="col-6">
                      <label for="">Fecha de cambio:</label><br>
                      <input type="date" name="fecha_cambio">
                    </div>

                    <div class="col-6">
                      <label for="">Área:</label><br>
                      <input list="lista_areas" type="text" name="area">
                    </div>

                    <div class="col-6">
                      <label for="">Impresora:</label><br>
                      <input list="impresoras" type="text" name="impresora">
                    </div>

                    <div class="col-6">
                      <label for="">Tipo:</label><br>
                      <input list="tipo_impresora" type="text" name="tipo">
                    </div>

                    <div class="col-12">
                      <label for="">Especificaciones:</label><br>
                      <input list="especificaciones" type="text" name="especificaciones">
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

if (isset($lista_areas_trabajo)){
  echo '<datalist id="lista_areas">';
  foreach ($lista_areas_trabajo as $area_trabajo){ echo '<option value="'.$area_trabajo['area'].'">'.$area_trabajo['area'].'</option>'; }
  echo '</datalist>';
}

if (isset($lista_impresoras)) {
  echo '<datalist id="impresoras">';
  foreach ($lista_impresoras as $impresora) { echo '<option value="'.$impresora['impresora'].'">'.$impresora['impresora'].'</option>'; }
  echo '</datalist>';
}

if (isset($lista_tipo_impresora)) {
  echo '<datalist id="tipo_impresora">';
  foreach ($lista_tipo_impresora as $tipo) { echo '<option value="'.$tipo['tipo'].'">'.$tipo['tipo'].'</option>'; }
  echo '</datalist>';
}

if (isset($lista_especificaciones)) {
  echo '<datalist id="especificaciones">';
  foreach ($lista_especificaciones as $especificaciones){ echo '<option value="'.$especificaciones['especificaciones'].'">'.$especificaciones['especificaciones'].'</option>'; }
  echo '</datalist>';
}

include_once 'footer.php';
?>
