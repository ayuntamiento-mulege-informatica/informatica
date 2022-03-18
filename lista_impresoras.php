<?php
require_once 'lib/class_inventario_impresoras.php';
require_once 'lib/class_paginador.php';

$inventario_impresoras = new inventario_impresoras;
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

  if(isset($_POST['modelo_tinta_toner'])) { $modelo_tinta_toner = $_SESSION['lista_impresoras']['modelo_tinta_toner'] = $_POST['modelo_tinta_toner']; }
  elseif (isset($_SESSION['lista_impresoras']['modelo_tinta_toner'])) { $modelo_tinta_toner = $_SESSION['lista_impresoras']['modelo_tinta_toner']; }
  else { $modelo_tinta_toner = null; }

  $registros_totales = $paginador -> registrosTotaleslistaImpresoras($connect, $area, $marca, $modelo, $tipo, $modelo_tinta_toner);

  $lista_impresoras = $inventario_impresoras -> listaImpresorasBuscar($connect, $area, $marca, $modelo, $tipo, $modelo_tinta_toner, $pag, $noReg);
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
          <h2>Lista de entrega de toner y tinta</h2>
          <p align="center"> <a href="/agregar_impresora" title="Agregar nueva impresora."> <span class="fas fa-2x fa-plus"></span> </a> </p>
        </div>

        <div class="contenido-contenedor">
          <table width="100%" style="font-size: .8rem;">
            <tr>
              <th>OPERACIONES</th>
              <th>ID</th>
              <th>ÁREA</th>
              <th>CANTIDAD</th>
              <th>MARCA</th>
              <th>MODELO</th>
              <th>TIPO</th>
              <th>MODELO DE TINTA</th>
            </tr>

            <?php if (isset($lista_impresoras)): ?>
              <?php foreach ($lista_impresoras as $impresora): ?>
                <tr>
                  <td> <a href="/editar_impresora/<?php echo $impresora['id']; ?>" title="Modificar reporte"> <span class="fas fa-2x fa-pencil-alt"></span> </a> </td>
                  <td><?php echo $impresora['id']; ?></td>
                  <td><?php echo $impresora['area']; ?></td>
                  <td><?php echo $impresora['cantidad']; ?></td>
                  <td><?php echo $impresora['marca']; ?></td>
                  <td><?php echo $impresora['modelo']; ?></td>
                  <td><?php echo $impresora['tipo']; ?></td>
                  <td><?php echo $impresora['modelo_tinta_toner']; ?></td>
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
