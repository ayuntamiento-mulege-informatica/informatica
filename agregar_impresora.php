<?php
require_once 'lib/class_inventario_impresoras.php';
require_once 'lib/class_areas_trabajo.php';
require_once 'lib/class_responsables.php';

$inventario_impresoras = new inventario_impresoras;
$areas_trabajo = new areas_trabajo;

$registro_reciente = $inventario_impresoras -> registroRecienteImpresora($connect);
$lista_impresoras_marca = $inventario_impresoras -> listaImpresorasMarcas($connect);
$lista_impresoras_modelo = $inventario_impresoras -> listaImpresorasModelo($connect);
$lista_impresoras_consumible = $inventario_impresoras -> listaImpresorasConsumible($connect);

$lista_areas_trabajo = $areas_trabajo -> listaAreasTrabajo($connect);

if (isset($_SESSION['lista_impresoras'])) { unset($_SESSION['lista_impresoras']); }

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row">
    <div class="col-12">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h2>Nuevo registro de impresora</h2>
        </div>
        <div class="contenido-contenedor">
          <form enctype="multipart/form-data" class="container-fluid" action="/lib/procesar_impresora.php" method="post">
            <div class="row justify-content-center">
              <div class="col-4">
                <label for="id">ID:</label><br>
                <input id="id" type="text" name="id" value="<?php echo $registro_reciente+1; ?>" required>
              </div>

              <div class="col-4">
                <label for="area">Área:</label><br>
                <!-- <input id="area" type="text" name="area" required> -->
                <select name="area" required>
                  <option value=""></option>
                  <?php if (isset($lista_areas_trabajo)): ?>
                    <?php foreach ($lista_areas_trabajo as $area): ?>
                      <option value="<?php echo $area['id']; ?>"><?php echo $area['area']; ?></option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>

              <div class="col-4">
                <label for="marca">Marca:</label><br>
                <input list="lista_marcas" id="marca" type="text" name="marca" required>
              </div>

              <div class="col-4">
                <label for="modelo">Modelo:</label><br>
                <input list="lista_modelos" id="modelo" type="text" name="modelo" required>
              </div>

              <div class="col-4">
                <label for="tipo">Tipo:</label><br>
                <!-- <input id="tipo" type="text" name="tipo" required> -->
                <select id="tipo" name="tipo">
                  <option value=""></option>
                  <option value="Toner">Toner</option>
                  <option value="Tanque">Tanque</option>
                </select>
              </div>

              <div class="col-4">
                <label for="consumible">Consumible:</label><br>
                <input list="lista_consumibles" id="consumible" type="text" name="consumible" required>
              </div>
            </div>

            <div class="row justify-content-center">
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

<datalist id="lista_marcas">
  <?php if (isset($lista_impresoras_marca)): ?>
    <?php foreach ($lista_impresoras_marca as $marca): ?>
      <option value="<?php echo $marca['marca']; ?>"><?php echo $marca['marca']; ?></option>
    <?php endforeach; ?>
  <?php endif; ?>
</datalist>

<datalist id="lista_modelos">
  <?php if (isset($lista_impresoras_modelo)): ?>
    <?php foreach ($lista_impresoras_modelo as $modelo): ?>
      <option value="<?php echo $modelo['modelo']; ?>"><?php echo $modelo['modelo']; ?></option>
    <?php endforeach; ?>
  <?php endif; ?>
</datalist>

<datalist id="lista_consumibles">
  <?php if (isset($lista_impresoras_consumible)): ?>
    <?php foreach ($lista_impresoras_consumible as $consumible): ?>
      <option value="<?php echo $consumible['consumible']; ?>"><?php echo $consumible['consumible']; ?></option>
    <?php endforeach; ?>
  <?php endif; ?>
</datalist>

<script src="/js/previsualizar_imagen.js"></script>
<script src="/js/comprobar_extension_archivo.js" type="text/javascript"></script>

<?php include_once 'footer.php'; ?>
