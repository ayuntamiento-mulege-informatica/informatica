<?php
require_once 'lib/class_entrega_toner_tinta.php';
require_once 'lib/class_areas_trabajo.php';

$entrega_toner_tinta = new entrega_toner_tinta;
$areas_trabajo = new areas_trabajo;

$lista_toner_tinta = $entrega_toner_tinta -> listaTonerTinta($connect, $pag, $noReg);
$lista_impresoras = $entrega_toner_tinta -> listaImpresoras($connect);
$lista_tipo_impresora = $entrega_toner_tinta -> listaTipoImpresora($connect);
$lista_especificaciones = $entrega_toner_tinta -> listaEspecificaciones($connect);
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
                <a class="enlace-boton" href="/nuevo_registro_toner_tinta">Nuevo registro</a>
                <a class="enlace-boton" href="/lista_entrega_toner_tinta">Lista entrega de toner y tinta</a>
              </div>

              <div class="col-6">
                <h3>Buscar registros</h3>

                <form class="container-fluid" action="/lista_entrega_toner_tinta" method="post">
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
?>

<?php if (isset($lista_areas_trabajo)): ?>
  <datalist id="lista_areas">
    <?php foreach ($lista_areas_trabajo as $area_trabajo): ?>
      <option value="<?php echo $area_trabajo['area']; ?>"><?php echo $area_trabajo['area']; ?></option>
    <?php endforeach; ?>
  </datalist>
<?php endif; ?>

<?php if (isset($lista_impresoras)): ?>
  <datalist id="impresoras">
    <?php foreach ($lista_impresoras as $impresora): ?>
      <option value="<?php echo $impresora['impresora']; ?>"><?php echo $impresora['impresora']; ?></option>
    <?php endforeach; ?>
  </datalist>
<?php endif; ?>

<?php if (isset($lista_tipo_impresora)): ?>
  <datalist id="tipo_impresora">
    <?php foreach ($lista_tipo_impresora as $tipo): ?>
      <option value="<?php echo $tipo['tipo']; ?>"><?php echo $tipo['tipo']; ?></option>
    <?php endforeach; ?>
  </datalist>
<?php endif; ?>

<?php if (isset($lista_especificaciones)): ?>
  <datalist id="especificaciones">
    <?php foreach ($lista_especificaciones as $especificaciones): ?>
      <option value="<?php echo $especificaciones['especificaciones']; ?>"><?php echo $especificaciones['especificaciones']; ?></option>
    <?php endforeach; ?>
  </datalist>
<?php endif; ?>

<?php
include_once 'footer.php';
?>
