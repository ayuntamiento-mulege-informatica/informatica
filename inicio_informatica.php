<?php
include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row">
    <div class="col-12 centrar-contenedor">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h2>Informática</h2>
        </div>

        <div class="contenido-contenedor">
          <div class="container-fluid">
            <div class="row justify-content-center">
              <?php if ($_SESSION['usuario'] != 'Informática 5'): ?>
                <div class="col-4">
                  <h3>Operaciones</h3>
                  <div class="centrar-botones">
                    <a class="enlace-boton" href="/bitacora_mantenimiento"> <span class="fas fa-tools"></span> Bitácora de matenimiento</a>
                    <a class="enlace-boton" href="/entrega_consumibles"> <span class="fas fa-print"></span> Entrega de consumibles</a>
                  </div>
                </div>
              <?php endif; ?>

              <div class="col-4">
                <h3>Inventarios</h3>
                <div class="centrar-botones">
                  <a class="enlace-boton" href="/inventario_impresoras">Inventario de impresoras</a>
                  <a class="enlace-boton" href="/inventario_consumibles">Inventario de consumibles</a>
                  <a class="enlace-boton" href="/inventario_computadoras">Inventario de computadoras</a>
                </div>
              </div>

              <?php if ($_SESSION['usuario'] != 'Informática 5'): ?>
                <div class="col-4">
                  <h3>Usuarios</h3>
                  <div class="centrar-botones">
                    <a class="enlace-boton" href="/registrar_usuario">Registrar usuario</a>
                    <a class="enlace-boton" href="/lista_usuarios">Lista de usuarios</a>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include_once 'footer.php'; ?>
