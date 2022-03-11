<?php
require_once 'lib/class_lista_usuarios.php';

$lista_usuario = new lista_usuarios;

$usuarios = $lista_usuario -> listaDeUsuarios($connect);

include_once 'header.php';
include_once 'menu.php';
?>

  <main class="container">
    <section class="row justify-content-center">
      <div class="col-12 centrar-contenedor">
        <div class="contenedor">
          <div class="titulo-contenedor">
            <h2>Lista de usuarios</h2>
          </div>

          <div class="contenido-contenedor">
            <table width="100%">
              <tr>
                <th>ID</th>
                <th>USUARIO</th>
                <th>NOMBRE</th>
                <th>ÁREA</th>
                <th>MODIFICAR</th>
              </tr>

              <?php foreach ($usuarios as $usr): ?>
                <tr>
                  <td><?php echo $usr['id']; ?></td>
                  <td><?php echo $usr['usuario']; ?></td>
                  <td><?php echo $usr['nombre']; ?></td>
                  <td><?php echo $usr['area']; ?></td>
                  <td align="center"> <a href="/modificar_usuario/<?php echo $usr['id']; ?>"> <span class="fas fa-edit"></span> </a></td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>
    </section>
  </main>

	<?php include_once 'footer.php'; ?>
