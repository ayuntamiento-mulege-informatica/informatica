<nav class="menu">
  <div class="container">
    <div class="row">
      <div class="col-9">
        <ul id="menu-izquierdo">
          <?php
          if ($seccion != '/'){ echo '<li><a class="enlace-boton" href="/"><span class="fas fa-home"></span> Inicio</a></li>'; }

          switch ($seccion) {
            // REPORTES DE MANTENIMIENTO
            case '/nuevo_reporte_mantenimiento':
            case '/lista_reportes_mantenimiento':
            case '/lista_reportes_mantenimiento/'.$parametro_2:
              echo '<li><a class="enlace-boton" href="/bitacora_mantenimiento">Bitácora de mantenimiento</a></li>';
              break;

            case '/editar_reporte_mantenimiento/'.$parametro_2:
              echo '<li><a class="enlace-boton" href="/bitacora_mantenimiento">Bitácora de mantenimiento</a></li>';
              echo '<li><a class="enlace-boton" href="/lista_reportes_mantenimiento">Lista de reportes</a></li>';
              break;

            // ENTREGA DE CONSUMIBLES
            case '/lista_entrega_consumibles':
            case '/lista_entrega_consumibles/'.$parametro_2:
              echo '<li><a class="enlace-boton" href="/entrega_consumibles">Bitácora de entrega de consumibles</a></li>';
              break;

            case '/nuevo_registro_consumibles':
            case '/editar_consumibles/'.$parametro_2:
              echo '<li><a class="enlace-boton" href="/entrega_consumibles">Bitácora de entrega de consumibles</a></li>';
              echo '<li><a class="enlace-boton" href="/lista_entrega_consumibles">Lista de entrega de consumibles</a></li>';
              break;

            case '/lista_impresoras':
            case '/lista_impresoras/'.$parametro_2:
              echo '<li><a class="enlace-boton" href="/inventario_impresoras">Inventario de impresoras</a></li>';
              break;

            case '/agregar_impresora':
            case '/editar_impresora/'.$parametro_2:
              echo '<li><a class="enlace-boton" href="/inventario_impresoras">Inventario de impresoras</a></li>';
              echo '<li><a class="enlace-boton" href="/lista_impresoras">Lista de impresoras</a></li>';
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
