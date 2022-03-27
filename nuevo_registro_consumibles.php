<?php
require_once 'lib/class_entrega_consumibles.php';
require_once 'lib/class_lista_usuarios.php';

$entrega_consumibles = new entrega_consumibles;
$usuarios = new lista_usuarios;

$registro_reciente = $entrega_consumibles -> registroRecienteConsumibles($connect);
$lista_usuarios = $usuarios -> listaDeUsuarios($connect);

if (isset($_SESSION['lista_consumibles'])) { unset($_SESSION['lista_consumibles']); }

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row">
    <div class="col-12">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h2>Nuevo registro de entrega de consumibles</h2>
        </div>
        <div class="contenido-contenedor">
          <form enctype="multipart/form-data" class="container-fluid" action="/lib/procesar_entrega_consumibles.php" method="post">
            <div class="row justify-content-center">
              <div class="col-1">
                <label for="id">ID:</label><br>
                <input id="id" type="text" name="id" value="<?php echo $registro_reciente+1; ?>" required>
              </div>

              <div class="col-3">
                <label for="fecha_cambio">Fecha de cambio:</label><br>
                <input id="fecha_cambio" type="date" name="fecha_cambio" value="<?php echo date('Y-m-d'); ?>" required>
              </div>

              <div class="col-4">
                <label for="area">Área:</label><br>
                <input id="area" type="text" name="area" required>
              </div>

              <div class="col-4">
                <label for="impresora">Impresora:</label><br>
                <input id="impresora" type="text" name="impresora" required>
              </div>

              <div class="col-2">
                <label for="tipo">Tipo :</label><br>
                <input id="tipo" type="text" name="tipo" title="Toner, tanque, cartucho." required>
              </div>

              <div class="col-2">
                <label for="especificaciones">Modelo:</label><br>
                <input id="especificaciones" type="text" name="especificaciones" title="Toner, tanque, cartucho." required>
              </div>

              <div class="col-2">
                <label for="cantidad">Cantidad:</label><br>
                <input id="cantidad"  type="number" name="cantidad" min="0" required>
              </div>

              <div class="col-6">
                <label for="recibe">Nombre (Recibe):</label><br>
                <input id="recibe" type="text" name="recibe" required>
              </div>

              <div class="col-8">
                <label for="">Foto:</label><br>
                <input type="file" name="evidencia" id="evidencia" onchange="return fileValidation('evidencia')">
              </div>

              <div class="col-xl-4">
                <label for="">Vista previa:</label><br>
                <output id="list1" style="width: 100%;"></output>
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

<script src="/js/previsualizar_imagen.js"></script>
<script src="/js/comprobar_extension_archivo.js" type="text/javascript"></script>

<?php include_once 'footer.php'; ?>
