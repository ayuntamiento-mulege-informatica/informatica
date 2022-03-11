<?php
include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row justify-content-center">
    <div class="col-xl-12 centrar-contenedor">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h3>Sindicatura</h3>
        </div>

        <div class="contenido-contenedor centrar-botones">
          <div class="container-fluid">
            <div class="row justify-content-center">
              <div class="col-4">
                <h3>Títulos</h3>
                <a class="enlace-boton" href="registrar_titulo">Registrar título</a>
                <a class="enlace-boton" href="registrar_titulo/admin_anterior">Registrar título (Admin. anterior)</a>
                <a class="enlace-boton" href="consultar_titulo">Consultar títulos</a>
                <a class="enlace-boton" href="resumen_general">Resumen general</a>
              </div>

              <div class="col-4">
                <h3>Leyendas</h3>
                <a class="enlace-boton" href="crear_leyenda">Registrar Leyenda</a>
                <a class="enlace-boton" href="lista_leyendas">Lista de Leyendas</a>
              </div>

              <div class="col-4">
                <h3>Funcionarios</h3>
                <a class="enlace-boton" href="/lista_funcionarios">Lista de funcionarios</a>
              </div>

              <div class="col-4">
                <h3>Tickets</h3>
                <a class="enlace-boton" href="/levantar_ticket">Levantar ticket</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include_once 'footer.php'; ?>
