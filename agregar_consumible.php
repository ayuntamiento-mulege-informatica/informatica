<?php
require_once 'lib/class_inventario_consumibles.php';

$inventario_consumibles = new inventario_consumibles;

$registro_reciente = $inventario_consumibles -> registroRecienteConsumible($connect);

if (isset($_SESSION['lista_impresoras'])) { unset($_SESSION['lista_impresoras']); }

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row">
    <div class="col-12">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h2>Nuevo registro de consumible</h2>
        </div>
        <div class="contenido-contenedor">
          <form enctype="multipart/form-data" class="container-fluid" action="/lib/procesar_consumible.php" method="post">
            <div class="row justify-content-center">
              <div class="col-3">
                <label for="id">ID:</label><br>
                <input id="id" type="text" name="id" value="<?php echo $registro_reciente+1; ?>" required>
              </div>

              <div class="col-3">
                <label for="marca">Marca:</label><br>
                <input id="marca" type="text" name="marca" required>
              </div>

              <div class="col-3">
                <label for="modelo">Modelo:</label><br>
                <input id="modelo" type="text" name="modelo" required>
              </div>

              <div class="col-3">
                <label for="tipo">Tipo:</label><br>
                <select name="tipo">
                  <option value=""></option>
                  <option value="Tanque">Tanque</option>
                  <option value="Toner">Toner</option>
                  <option value="Cartucho">Cartucho</option>
                </select>
              </div>

              <div class="col-3">
                <label for="cantidad">Cantidad:</label><br>
                <input id="cantidad" type="number" min="0" name="cantidad" required>
              </div>
            </div>

            <div class="row justify-content-center">
              <div class="col-3 centrar-botones">
                <input type="submit" name="accion" value="Registrar consumible">
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

<?php include_once 'footer.php'; ?>
