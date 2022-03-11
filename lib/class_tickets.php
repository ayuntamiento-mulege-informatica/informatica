<?php
/**
 *
 */
class tickets {
  // Función para dar de alta tickets.
  function abrirTicket($connect, $usuario, $admin, $titulo, $motivo) {
    $sql = "INSERT INTO tickets (id, fecha, usuario, admin, titulo, motivo, estado) VALUES (null, CURRENT_TIMESTAMP, '$usuario', '$admin', $titulo, '$motivo', 'Pendiente')";

    mysqli_query($connect, $sql) or die ($connect -> error);

    return 'Ticket enviado al Departamento de Informática.\nEspere por favor.';
  }

  // Función para ver lista de tickets.
  function listaTickets($connect) {
    $sql = "SELECT * FROM tickets ORDER BY id DESC";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $tickets[] = array(
        'id' => $row['id'],
        'fecha' => $row['fecha'],
        'usuario' => $row['usuario'],
        'admin' => $row['admin'],
        'titulo' => $row['titulo'],
        'motivo' => $row['motivo'],
        'estado' => $row['estado']
      );
    }

    if (isset($tickets)) { return $tickets; }
    else { return null; }
  }

  // Función para cambiar el estado de un ticket.
  function estadoTicket($connect, $id, $estado) {
    if ($estado == 'Pendiente') {
      $estado = 'Atendido';
    }
    elseif ($estado == 'Atendido') {
      $estado = 'Pendiente';
    }

    $sql = "UPDATE tickets SET estado = '$estado' WHERE id = $id";
    mysqli_query($connect, $sql) or die ($connect -> error);

    if ($estado == 'Atendido') {
      return 'El ticket cerrado.';
    }
    elseif($estado == 'Pendiente') {
      return 'El ticket abierto.';
    }
  }
}
?>
