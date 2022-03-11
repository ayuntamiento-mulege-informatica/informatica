<?php
include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row justify-content-center">
    <div class="col-4 centrar-contenedor">
      <form class="contenedor" action="lib/procesar_login.php" method="post">
        <div class="titulo-contenedor">
          <h3>Inicio de sesión</h3>
        </div>

        <div class="contenido-contenedor">
          <input type="text" name="usuario" id="usuario" placeholder="Escribir usuario" required>
          <input type="password" name="pass" id="pass" placeholder="Escribir Contraseña" required>
        </div>

        <div class="contenido-contenedor centrar-botones"><input type="submit" name="login" value="Ingresar"></div>
      </form>
    </div>
  </section>
</main>

<?php include_once 'footer.php'; ?>
