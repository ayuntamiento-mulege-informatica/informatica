<?php
require_once 'lib/class_administraciones.php';

$administraciones = new administraciones;

$administracion = $administraciones -> listaAdministraciones($connect);

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row justify-content-center">
    <div class="col-xl-6 centrar-contenedor">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h3>Consultar título</h3>
        </div>

        <div class="contenido-contenedor">
          <form action="lib/procesar_consulta_titulos.php" method="post">
            <div>
              <p align="justify"><strong>NOTA:</strong> Para realizar la consulta, primero seleccione la administración a la que pertenece el título de propiedad y después llene uno de los campos de abajo.</p>
            </div>

            <div>
              <label for="">Administración</label>
              <select name="admin">
                <?php if (isset($administracion)): ?>
                  <?php foreach ($administracion as $admin): ?>
                    <option value="<?php echo $admin['admin']; ?>"><?php echo $admin['admin']; ?></option>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p>No se han registrado administraciones.</p>
                <?php endif; ?>
              </select>
            </div>

            <div>
              <label for="">Número de título</label><br>
              <input type="text" name="num_titulo">
            </div>

            <div>
              <label for="">Nombre</label><br>
              <input type="text" name="nombre">
            </div>

            <div class="centrar-botones">
              <input type="submit" name="accion" value="Consultar">
            </div>
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
  location.href="/consultar_titulo";
  </script>';
  unset($_SESSION['msg']);
}
?>
