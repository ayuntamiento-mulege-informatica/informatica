<?php
include_once 'header.php';
include_once 'menu.php';
?>

  <main class="container">
    <section class="row justify-content-center">
      <div class="col-12 centrar-contenedor">
        <div class="contenedor">
          <div class="titulo-contenedor">
            <h3>Crear leyenda</h3>
          </div>

          <div class="contenido-contenedor">
            <form class="container-fluid" action="lib/procesar_leyenda.php" method="post">
              <div class="row">
                <div class="col-12">
                  <p><strong>NOTA:</strong> Los campos marcados con * son obligatorios.</p>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <label for="">Leyenda*</label><br>
                  <textarea type="text" name="leyenda" rows="10"></textarea>
                </div>
              </div>

              <div class="row justify-content-center">
                <div class="col-3 centrar-botones">
                  <input type="submit" name="accion" value="Guardar leyenda">
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
  alert('.$_SESSION['msg'].');
  location.href="/registrar_leyenda";
  </script>';
}
unset($_SESSION['msg']);

include_once 'footer.php';
?>
