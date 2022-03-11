<?php
require_once 'lib/class_administraciones.php';

$administraciones = new administraciones;

$admin = $administraciones -> administracionActual($connect);
$funcionario = $administraciones -> listaFuncionarios($connect, $admin);

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row justify-content-center">
    <div class="col-7 centrar-contenedor">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h3>Actualizar administración</h3>
        </div>

        <div class="contenido-contenedor">
          <form class="container-fluid" action="/lib/procesar_actualizacion_funcionarios.php" method="post">
            <div class="row justify-content-center">
              <div class="col-12">
                <label for="">Administración:</label><br>
                <input type="text" name="admin" value="<?php echo $admin; ?>" readonly>
              </div>

              <div class="col-12">
                <label for="">Presidente municipal:</label><br>
                <input type="text" name="presidente_municipal" value="<?php echo $funcionario['presidente_municipal']; ?>">
              </div>

              <div class="col-12">
                <label for="">Síndico municipal:</label><br>
                <input type="text" name="sindico_municipal" value="<?php echo $funcionario['sindico_municipal']; ?>">
              </div>

              <div class="col-12">
                <label for="">Secretario general:</label><br>
                <input type="text" name="secretario_general" value="<?php echo $funcionario['secretario_general']; ?>">
              </div>

              <div class="col-12">
                <label for="">Director de Catastro municipal:</label><br>
                <input type="text" name="director_catastro" value="<?php echo $funcionario['director_catastro']; ?>">
              </div>

              <div class="col-12">
                <label for="">Tesorero municipal:</label><br>
                <input type="text" name="tesorero_municipal" value="<?php echo $funcionario['tesorero_municipal']; ?>">
              </div>

              <div class="col-6 centrar-botones">
                <input type="submit" name="accion" value="Actualizar funcionarios">
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
  location.href="/actualizar_administracion";
  </script>';

  unset($_SESSION['msg']);
}

include_once 'footer.php';
?>
