<?php
require_once 'header.php';
require_once 'menu.php';
?>

<main class="container">
  <section class="row justify-content-center">
    <div class="col-6 centrar-contenedor">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h2>Registrar usuarios</h2>
        </div>

        <div class="contenido-contenedor">
          <form class="" action="lib/procesar_registro_usuario.php" method="post">
            <div class="container-fluid">
              <div class="row justify-content-center">
                <div class="col-12">
                  <label for="">Nombre de usuario:</label><br>
                  <input type="text" name="nombre" value="" required>
                </div>

                <div class="col-12">
                  <label for="">Área</label>
                  <select name="area" required>
                    <option value=""></option>
                    <option value="Sindicatura">Sindicatura</option>
                    <option value="Informática">Informática</option>
                  </select>
                </div>

                <div class="col-6">
                  <input type="submit" name="accion" value="Registrar usuario">
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
    location.href="/registrar_usuario";
  </script>';
}
unset($_SESSION['msg']);

require_once 'footer.php';
?>
