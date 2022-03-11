<?php
require_once 'lib/class_lista_usuarios.php';

$lista_usuario = new lista_usuarios;

$usuario = $lista_usuario -> usuarioIndividual($connect, $parametro_2);

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row justify-content-center">
    <div class="col-6">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h2>Modificación de usuario</h2>
        </div>
        <div class="contenido-contenedor">
          <h3>Cambiar nombre</h3>
          <form action="/lib/procesar_modificar_usuario.php" method="post">
            <div class="">
              <label for="">Nombre completo</label><br>
              <input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>">
              <input type="hidden" name="id" value="<?php echo $parametro_2; ?>">
            </div>

            <div class="">
              <input type="submit" name="accion" value="Guardar nombre">
            </div>
          </form>

          <h3>Generar contraseña</h3>
          <form action="/lib/procesar_modificar_usuario.php" method="post">
            <input type="hidden" name="id" value="<?php echo $parametro_2; ?>">
            <input type="submit" name="accion" value="Generar contraseña">
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
  location.href="";
  </script>';
}
unset($_SESSION['msg']);

include_once 'footer.php';
?>
