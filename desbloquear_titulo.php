<?php
require_once 'lib/class_administraciones.php';

$administraciones = new administraciones;

$administracion = $administraciones -> listaAdministraciones($connect);

include_once 'header.php';
include_once 'menu.php';
?>

  <main class="container">
    <section class="row justify-content-center">
      <div class="col-4 centrar-contenedor">
        <div class="contenedor">
          <div class="titulo-contenedor">
            <h3>Desbloquear título</h3>
          </div>

          <div class="contenido-contenedor">
            <form action="lib/procesar_desbloquear_titulo.php" method="post">
              <div>
                  <label for="">Administración:</label><br>
                  <select name="admin">
                    <?php if (isset($administracion)): ?>
                      <?php foreach ($administracion as $admin): ?>
                        <option value="<?php echo $admin['admin']; ?>"><?php echo $admin['admin']; ?></option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
              </div>

              <div>
                <label for="">Número del título:</label><br>
                <input type="text" name="num_titulo" pattern="[0-9]{1,}">
              </div>

              <div class="centrar-botones">
                <input type="submit" name="accion" value="Desbloquear página">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php
include_once 'footer.php';

if (isset($_SESSION['msg'])) {
  echo '<script>
  alert("'.$_SESSION['msg'].'");
  location.href="/desbloquear_titulo";
  </script>';

  unset($_SESSION['msg']);
}
?>
