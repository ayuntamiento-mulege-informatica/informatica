<?php
require_once 'lib/class_entrega_consumibles.php';
require_once 'lib/class_paginador.php';

$entrega_consumibles = new entrega_consumibles;
$paginador = new pages;

if (isset($parametro_2)) { $pag = $parametro_2; }


if (isset($_POST['accion']) || isset($_SESSION['lista_toner_tinta'])) {
  if(isset($_POST['fecha_cambio'])) { $fecha_cambio = $_SESSION['lista_toner_tinta']['fecha_cambio'] = $_POST['fecha_cambio']; }
  elseif (isset($_SESSION['lista_toner_tinta']['fecha_cambio'])) { $fecha_cambio = $_SESSION['lista_toner_tinta']['fecha_cambio']; }
  else { $fecha_cambio = null; }

  if(isset($_POST['area'])) { $area = $_SESSION['lista_toner_tinta']['area'] = $_POST['area']; }
  elseif (isset($_SESSION['lista_toner_tinta']['area'])) { $area = $_SESSION['lista_toner_tinta']['area']; }
  else { $area = null; }

  if(isset($_POST['impresora'])) { $impresora = $_SESSION['lista_toner_tinta']['impresora'] = $_POST['impresora']; }
  elseif (isset($_SESSION['lista_toner_tinta']['impresora'])) { $impresora = $_SESSION['lista_toner_tinta']['impresora']; }
  else { $impresora = null; }

  if(isset($_POST['tipo'])) { $tipo = $_SESSION['lista_toner_tinta']['tipo'] = $_POST['tipo']; }
  elseif (isset($_SESSION['lista_toner_tinta']['tipo'])) { $tipo = $_SESSION['lista_toner_tinta']['tipo']; }
  else { $tipo = null; }

  if(isset($_POST['especificaciones'])) { $especificaciones = $_SESSION['lista_toner_tinta']['especificaciones'] = $_POST['especificaciones']; }
  elseif (isset($_SESSION['lista_toner_tinta']['especificaciones'])) { $especificaciones = $_SESSION['lista_toner_tinta']['especificaciones']; }
  else { $especificaciones = null; }

  $registros_totales = $paginador -> registrosTotaleslistaEntregaConsumibles($connect, $fecha_cambio, $area, $impresora, $tipo, $especificaciones);

  $lista_entrega = $entrega_consumibles -> listaConsumiblesBuscar($connect, $fecha_cambio, $area, $impresora, $tipo, $especificaciones, $pag, $noReg);
}
else {
  $registros_totales = $paginador -> registrosTotales($connect, 'bitacora_entrega_consumibles');
  $lista_entrega = $entrega_consumibles -> listaConsumibles($connect, $pag, $noReg);
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
          <p align="center"> <a href="/nuevo_registro_consumibles" title="Crear nuevo registro de consumibles"> <span class="fas fa-2x fa-plus"></span> </a> </p>
        </div>

        <div class="contenido-contenedor">
          <table width="100%" style="font-size: .8rem;">
            <tr>
              <?php if ($_SESSION['usuario'] != 'Informática 5'): ?>
                <th colspan="2">OPERACIONES</th>
              <?php endif; ?>
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
                  <?php if ($_SESSION['usuario'] != 'Informática 5'): ?>
                    <td> <a href="/editar_consumibles/<?php echo $entrega['id']; ?>" title="Modificar reporte"> <span class="fas fa-2x fa-pencil-alt"></span> </a> </td>
                    <td> <a href="/imprimir_consumibles/<?php echo $entrega['id']; ?>" title="Imprimir reporte" target="_blank"> <span class="fas fa-2x fa-print"></span> </a> </td>
                  <?php endif; ?>
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
