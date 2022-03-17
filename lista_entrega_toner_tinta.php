<?php
require_once 'lib/class_entrega_toner_tinta.php';
require_once 'lib/class_paginador.php';

$entrega_toner_tinta = new entrega_toner_tinta;
$paginador = new pages;

if (isset($parametro_2)) { $pag = $parametro_2; }


if (isset($_POST['accion'])) {
  $registros_totales = $paginador -> registrosTotaleslistaEntregaTonerTinta($connect, $_POST['fecha_cambio'], $_POST['area'], $_POST['impresora'], $_POST['tipo'], $_POST['especificaciones']);

  $lista_entrega = $entrega_toner_tinta -> listaTonerTintaBuscar($connect, $_POST['fecha_cambio'], $_POST['area'], $_POST['impresora'], $_POST['tipo'], $_POST['especificaciones'], $pag, $noReg);
}
else {
  $registros_totales = $paginador -> registrosTotales($connect, 'bitacora_entrega_tinta_toner');
  $lista_entrega = $entrega_toner_tinta -> listaTonerTinta($connect, $pag, $noReg);
}

$nPag = $paginador -> nPag($registros_totales, $noReg);

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row justify-content-center">
    <div class="col-12 centrar-contenedor">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h2>Lista de entrega de toner y tinta</h2>
        </div>

        <div class="contenido-contenedor">
          <table width="100%" style="font-size: .8rem;">
            <tr>
              <th>OPERACIONES</th>
              <th>ID</th>
              <th>FECHA DE CAMBIO</th>
              <th>ÁREA</th>
              <th>IMPRESORA</th>
              <th>TIPO</th>
              <th>ESPECIFICACIONES</th>
              <th>CANTIDAD</th>
              <th>NOMBRE (RECIBE)</th>
              <th>EVIDENCIA</th>
            </tr>

            <?php if (isset($lista_entrega)): ?>
              <?php foreach ($lista_entrega as $entrega): ?>
                <tr>
                  <td> <a href="/editar_toner_tinta/<?php echo $entrega['id']; ?>" title="Modificar reporte"> <span class="fas fa-2x fa-pencil-alt"></span> </a> </td>
                  <td><?php echo $entrega['id']; ?></td>
                  <td><?php echo $entrega['fecha_cambio']; ?></td>
                  <td><?php echo $entrega['area']; ?></td>
                  <td><?php echo $entrega['impresora']; ?></td>
                  <td><?php echo $entrega['tipo']; ?></td>
                  <td><?php echo $entrega['especificaciones']; ?></td>
                  <td><?php echo $entrega['cantidad']; ?></td>
                  <td><?php echo $entrega['recibe']; ?></td>
                  <td> <a href="/evidencia/<?php echo $entrega['evidencia']; ?>" target="_blank" loading="lazy"> <img src="/evidencia/thumbnail_<?php echo $entrega['evidencia']; ?>" alt="<?php echo $entrega['evidencia']; ?>"> </a> </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="12">No hay reportes para mostrar.</td>
              </tr>
            <?php endif; ?>
          </table>
        </div>
      </div>
    </div>
  </section>

  <div class="row">
    <div class="col-12">
      <ul class="paginador">
        <?php
        $extra = '/'.$parametro_1.'/';
        $paginador -> paginador($pag, $nPag, $extra);
        ?>
      </ul>
    </div>
  </div>
</main>

<?php
if (isset($_SESSION['msg'])) {
  echo '<script>
  alert("'.$_SESSION['msg'].'");
  location.href="/funcionarios";
  </script>';

  unset($_SESSION['msg']);
}

include_once 'footer.php';
?>
