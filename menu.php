<nav class="menu">
  <div class="container">
    <div class="row">
      <div class="col-9">
        <ul id="menu-izquierdo">
          <?php if ($seccion != '/'): ?>
            <li><a class="enlace-boton" href="/"><span class="fas fa-home"></span> Inicio</a></li>
          <?php endif; ?>

          <?php if ($area == 'Informática'): ?>
            <?php if ($_SERVER['REQUEST_URI'] == '/modificar_usuario/'.$parametro_2): ?>
              <li> <a class="enlace-boton" href="/lista_usuarios">Lista de usuarios</a> </li>
            <?php endif; ?>
          <?php elseif ($area == 'Sindicatura'): ?>
          <?php endif; ?>
        </ul>
      </div>

      <?php if (isset($_SESSION['usuario'])): ?>
        <div class="col-3">
          <ul id="menu-derecho">
            <li><a class="enlace-boton" href="/logout">Cerrar sesión</a></li>
          </ul>
        </div>
      <?php endif; ?>
    </div>
  </div>
</nav>
