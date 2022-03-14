<?php
require_once 'lib/class_entrega_toner_tinta.php';
require_once 'lib/class_lista_usuarios.php';

$entrega_toner_tinta = new entrega_toner_tinta;
$usuarios = new lista_usuarios;

$registro_reciente = $entrega_toner_tinta -> registroRecienteTonerTinta($connect);
$lista_usuarios = $usuarios -> listaDeUsuarios($connect);

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row">
    <div class="col-12">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h2>Nuevo registro de entrega de toner o tinta</h2>
        </div>
        <div class="contenido-contenedor">
          <form class="container-fluid" action="/lib/procesar_entrega_toner_tinta.php" method="post">
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

              <div class="col-4">
                <label for="tipo">Tipo (Toner / Cartucho):</label><br>
                <input id="tipo" type="text" name="tipo" required>
              </div>

              <div class="col-4">
                <label for="especificaciones">Especificaciones (Toner / Cartucho):</label><br>
                <input id="especificaciones" type="text" name="especificaciones" required>
              </div>

              <div class="col-4">
                <label for="cantidad">Cantidad:</label><br>
                <input id="cantidad"  type="text" name="cantidad" required>
              </div>

              <div class="col-6">
                <label for="nombre">Nombre (Recibe):</label><br>
                <input id="nombre" type="text" name="nombre" required>
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

<?php include_once 'footer.php'; ?>
