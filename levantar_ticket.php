<?php
require_once 'lib/class_administraciones.php';

$administraciones = new administraciones;

$administracion = $administraciones -> listaAdministraciones($connect);

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row justify-content-center">
    <div class="col-6 centrar-contenedor">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h2>Levantar ticket</h2>
        </div>

        <div class="contenido-contenedor">
          <p>Use este formulario para solicitar el desbloqueo de un título de propiedad.</p>
          <p><strong>NOTA:</strong> Todos los campos son obligatorios.</p>

          <form action="/lib/procesar_ticket.php" method="post">
            <div class="container-fluid">
              <div class="row justify-content-center">
                <div class="col-6">
                  <label for="">Administración:</label><br>
                  <select name="admin">
                    <?php if (isset($administracion)): ?>
                      <?php foreach ($administracion as $admin): ?>
                        <option value="<?php echo $admin['admin']; ?>"><?php echo $admin['admin']; ?></option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>

                <div class="col-6">
                  <label for="">Título:</label><br>
                  <input type="text" name="titulo">
                </div>

                <div class="col-12">
                  <label for="">Motivo del ticket:</label><br>
                  <textarea name="motivo" rows="4"></textarea>
                </div>

                <div class="col-4 centrar-botones">
                  <input type="submit" name="accion" value="Enviar ticket">
                </div>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
if (isset($_SESSION['msg'])) {
  echo '<script>
  alert("'.$_SESSION['msg'].'");
  location.href="/levantar_ticket";
  </script>';

  unset($_SESSION['msg']);
}

include_once 'footer.php';
?>
