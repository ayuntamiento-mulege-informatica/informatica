<?php
require_once 'lib/class_inventario_impresoras.php';
require_once 'lib/class_areas_trabajo.php';
require_once 'lib/class_responsables.php';
require_once 'lib/class_paginador.php';

$inventario_impresoras = new inventario_impresoras;
$areas_trabajo = new areas_trabajo;
$responsables = new responsables;
$paginador = new pages;

if (isset($parametro_2)) { $pag = $parametro_2; }


if (isset($_POST['accion']) || isset($_SESSION['lista_impresoras'])) {
  if(isset($_POST['area'])) { $area = $_SESSION['lista_impresoras']['area'] = $_POST['area']; }
  elseif (isset($_SESSION['lista_impresoras']['area'])) { $area = $_SESSION['lista_impresoras']['area']; }
  else { $area = null; }

  if(isset($_POST['marca'])) { $marca = $_SESSION['lista_impresoras']['marca'] = $_POST['marca']; }
  elseif (isset($_SESSION['lista_impresoras']['marca'])) { $marca = $_SESSION['lista_impresoras']['marca']; }
  else { $marca = null; }

  if(isset($_POST['modelo'])) { $modelo = $_SESSION['lista_impresoras']['modelo'] = $_POST['modelo']; }
  elseif (isset($_SESSION['lista_impresoras']['modelo'])) { $modelo = $_SESSION['lista_impresoras']['modelo']; }
  else { $modelo = null; }

  if(isset($_POST['tipo'])) { $tipo = $_SESSION['lista_impresoras']['tipo'] = $_POST['tipo']; }
  elseif (isset($_SESSION['lista_impresoras']['tipo'])) { $tipo = $_SESSION['lista_impresoras']['tipo']; }
  else { $tipo = null; }

  if(isset($_POST['consumible'])) { $consumible = $_SESSION['lista_impresoras']['consumible'] = $_POST['consumible']; }
  elseif (isset($_SESSION['lista_impresoras']['consumible'])) { $consumible = $_SESSION['lista_impresoras']['consumible']; }
  else { $consumible = null; }

  $registros_totales = $paginador -> registrosTotaleslistaImpresoras($connect, $area, $marca, $modelo, $tipo, $consumible);

  $lista_impresoras = $inventario_impresoras -> listaImpresorasBuscar($connect, $area, $marca, $modelo, $tipo, $consumible, $pag, $noReg);
}
else {
  $registros_totales = $paginador -> registrosTotales($connect, 'impresoras');
  $lista_impresoras = $inventario_impresoras -> listaImpresoras($connect, $pag, $noReg);
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
          <h2>Lista de impresoras</h2>
          <p align="center"> <a href="/agregar_impresora" title="Agregar impresora."> <span class="fas fa-2x fa-plus"></span> </a> </p>
        </div>

        <div class="contenido-contenedor">
          <table width="100%" style="font-size: .8rem;">
            <tr>
              <?php if ($_SESSION['usuario'] != 'Informática 5'): ?>
                <th>OPERACIONES</th>
              <?php endif; ?>
              <th>ID</th>
              <th>QR</th>
              <th>RESPONSABLE</th>
              <th>ÁREA</th>
              <th>MARCA</th>
              <th>MODELO</th>
              <th>TIPO</th>
              <th>CONSUMIBLE</th>
            </tr>

            <?php if (isset($lista_impresoras)): ?>
              <?php foreach ($lista_impresoras as $impresora): ?>
                <?php
                $area_trabajo_impresora = $areas_trabajo -> areaTrabajoEspecifica($connect, $impresora['area']);
                $responsable_individual = $responsables -> responsableIndividual($connect, $impresora['responsable']);
                ?>

                <tr>
                  <?php if ($_SESSION['usuario'] != 'Informática 5'): ?>
                    <td> <a href="/editar_impresora/<?php echo $impresora['id']; ?>" title="Modificar reporte"> <span class="fas fa-2x fa-pencil-alt"></span> </a> </td>
                  <?php endif; ?>
                  <td><?php echo $impresora['id']; ?></td>
                  <td> <img src="/evidencia/inventarios/impresoras/<?php echo $impresora['qr']; ?>" alt="" width="100" height="100"></td>
                  <td><?php echo $responsable_individual['nombre']; ?></td>
                  <td><?php echo $area_trabajo_impresora['area']; ?></td>
                  <td><?php echo $impresora['marca']; ?></td>
                  <td><?php echo $impresora['modelo']; ?></td>
                  <td><?php echo $impresora['tipo']; ?></td>
                  <td><?php echo $impresora['consumible']; ?></td>
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
