<?php
require_once 'lib/class_tickets.php';

$tickets = new tickets;

$lista_tickets = $tickets -> listaTickets($connect);

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row justify-content-center">
    <div class="col-12 centrar-contenedor">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h2>Revisión de tickets</h2>
        </div>

        <div class="contenido-contenedor">
          <table width="100%">
            <tr>
              <th>ID</th>
              <th>FECHA</th>
              <th>USUARIO</th>
              <th>ADMINISTRACIÓN</th>
              <th>TÍTULO</th>
              <th>MOTIVO</th>
              <th>ESTADO</th>
            </tr>
            <?php if (isset($lista_tickets)): ?>
              <?php foreach ($lista_tickets as $ticket): ?>
                <tr>
                  <td><?php echo $ticket['id']; ?></td>
                  <td><?php echo $ticket['fecha']; ?></td>
                  <td><?php echo $ticket['usuario']; ?></td>
                  <td><?php echo $ticket['admin']; ?></td>
                  <td><?php echo $ticket['titulo']; ?></td>
                  <td><?php echo $ticket['motivo']; ?></td>
                  <td>
                    <form action="/lib/procesar_estado_ticket.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $ticket['id']; ?>">
                      <?php if ($ticket['estado'] == 'Pendiente'): ?>
                        <input style="background: #f38065;" type="submit" name="estado" value="<?php echo $ticket['estado']; ?>">
                      <?php else: ?>
                        <span class="enlace-boton-atendido"><?php echo $ticket['estado']; ?></span>
                      <?php endif; ?>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="7"></td>
              </tr>
            <?php endif; ?>
          </table>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
if (isset($_SESSION['msg'])) {
  echo '<script>
  alert("'.$_SESSION['msg'].'");
  location.href="/revisar_tickets";
  </script>';

  unset($_SESSION['msg']);
}

include_once 'footer.php'; ?>
