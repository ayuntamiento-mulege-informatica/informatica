<nav class="menu">
  <div class="container">
    <div class="row">
      <div class="col-9">
        <ul id="menu-izquierdo">
          <?php
          if ($seccion != '/'){ echo '<li><a class="enlace-boton" href="/"><span class="fas fa-home"></span> Inicio</a></li>'; }

          switch ($seccion) {
            case '/nuevo_reporte_mantenimiento':
            case '/lista_reportes_mantenimiento':
            case '/lista_reportes_mantenimiento/'.$parametro_2:
              echo '<li><a class="enlace-boton" href="/bitacora_mantenimiento">Bitácora de mantenimiento</a></li>';
              break;

            case '/editar_reporte_mantenimiento/'.$parametro_2:
              echo '<li><a class="enlace-boton" href="/bitacora_mantenimiento">Bitácora de mantenimiento</a></li>';
              echo '<li><a class="enlace-boton" href="/lista_reportes_mantenimiento">Lista de reportes</a></li>';
              break;

            case '/lista_entrega_toner_tinta':
            case '/lista_entrega_toner_tinta/'.$parametro_2:
              echo '<li><a class="enlace-boton" href="/entrega_toner_tinta">Bitácora de entrega de toner y tinta</a></li>';
              break;

            case '/nuevo_registro_toner_tinta':
            case '/editar_toner_tinta/'.$parametro_2:
              echo '<li><a class="enlace-boton" href="/entrega_toner_tinta">Bitácora de entrega de toner y tinta</a></li>';
              echo '<li><a class="enlace-boton" href="/lista_entrega_toner_tinta">Lista de entrega de toner y tinta</a></li>';
              break;
          }
          ?>

          <?php if ($seccion == '/modificar_usuario/'.$parametro_2): ?>
            <li> <a class="enlace-boton" href="/lista_usuarios">Lista de usuarios</a> </li>
          <?php endif; ?>
        </ul>
      </div>

      <?php if (isset($area)): ?>
        <div class="col-3">
          <ul id="menu-derecho">
            <li><a class="enlace-boton" href="/logout">Cerrar sesión</a></li>
          </ul>
        </div>
      <?php endif; ?>
    </div>
  </div>
</nav>
