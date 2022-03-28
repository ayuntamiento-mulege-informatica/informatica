<?php
require_once 'lib/class_inventario_impresoras.php';

$inventario_impresoras = new inventario_impresoras;

$info_impresora = $inventario_impresoras -> infoImpresora($connect, $parametro_2);

if (isset($_SESSION['lista_toner_tinta'])) { unset($_SESSION['lista_toner_tinta']); }

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row">
    <div class="col-12">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h2>Editar impresora</h2>

          <p align="center"> <a href="/agregar_impresora" title="Agregar nueva impresora"> <span class="fas fa-2x fa-plus"></span> </a> </p>
        </div>

        <div class="contenido-contenedor">
          <form enctype="multipart/form-data" class="container-fluid" action="/lib/procesar_actualizar_impresora.php" method="post">
            <div class="row justify-content-center">
              <div class="col-4">
                <label for="id">ID:</label><br>
                <input id="id" type="text" name="id" value="<?php echo $info_impresora['id']; ?>" required>
              </div>

              <div class="col-4">
                <label for="area">Área:</label><br>
                <input id="area" type="text" name="area" value="<?php echo $info_impresora['area']; ?>" required>
              </div>

              <div class="col-4">
                <label for="marca">Marca:</label><br>
                <input id="marca" type="text" name="marca" value="<?php echo $info_impresora['marca']; ?>" required>
              </div>

              <div class="col-4">
                <label for="modelo">Modelo:</label><br>
                <input id="modelo" type="text" name="modelo" value="<?php echo $info_impresora['modelo']; ?>" required>
              </div>

              <div class="col-4">
                <label for="tipo">Tipo:</label><br>
                <input id="tipo" type="text" name="tipo" value="<?php echo $info_impresora['tipo']; ?>" required>
              </div>

              <div class="col-4">
                <label for="consumible">Consumible:</label><br>
                <input id="consumible" type="text" name="consumible" value="<?php echo $info_impresora['consumible']; ?>" required>
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

<script src="/js/previsualizar_imagen.js"></script>
<script src="/js/comprobar_extension_archivo.js" type="text/javascript"></script>

<?php
if (isset($_SESSION['msg'])) {
  echo '<script>
  alert("'.$_SESSION['msg'].'");
  location.href="/editar_impresora/'.$parametro_2.'";
  </script>';

  unset($_SESSION['msg']);
}

include_once 'footer.php';
?>
