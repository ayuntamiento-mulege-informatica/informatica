<?php
require_once 'lib/class_inventario_impresoras.php';
require_once 'lib/class_areas_trabajo.php';

$inventario_impresoras = new inventario_impresoras;
$areas_trabajo = new areas_trabajo;

$lista_impresoras_marcas = $inventario_impresoras -> listaImpresorasMarcas($connect);
$lista_impresoras_tipo = $inventario_impresoras -> listaImpresorasTipo($connect);
$lista_impresoras_modelo = $inventario_impresoras -> listaImpresorasModelo($connect);
$lista_impresoras_tinta = $inventario_impresoras -> listaImpresorasConsumible($connect);
$lista_areas_trabajo = $areas_trabajo -> listaAreasTrabajo($connect);

if (isset($_SESSION['lista_impresoras'])) { unset($_SESSION['lista_impresoras']); }

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row">
    <div class="col-12 centrar-contenedor">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h2>Inventario de impresoras</h2>
        </div>
        <div class="contenido-contenedor">
          <div class="container-fluid">
            <div class="row">
              <div class="col-6">
                <h3>Registros</h3>
                <a class="enlace-boton" href="/agregar_impresora">Agregar impresora</a>
                <a class="enlace-boton" href="/lista_impresoras">Lista de impresoras</a>
              </div>

              <div class="col-6">
                <h3>Buscar registros</h3>

                <form class="container-fluid" action="/lista_impresoras" method="post">
                  <div class="row justify-content-center">
                    <div class="col-6">
                      <label for="">Área:</label><br>
                      <select name="area">
                        <option value=""></option>
                        <?php
                        if (isset($lista_areas_trabajo)){
                          foreach ($lista_areas_trabajo as $area_trabajo){ echo '<option value="'.$area_trabajo['id'].'">'.$area_trabajo['area'].'</option>'; }
                        }
                        ?>
                      </select>
                    </div>

                    <div class="col-6">
                      <label for="">Marca:</label><br>
                      <select name="marca">
                        <option value=""></option>
                        <?php
                        if (isset($lista_impresoras_marcas)) {
                          foreach ($lista_impresoras_marcas as $marca) { echo '<option value="'.$marca['marca'].'">'.$marca['marca'].'</option>'; }
                        }
                        ?>
                      </select>
                    </div>

                    <div class="col-6">
                      <label for="">Modelo:</label><br>
                      <select name="modelo">
                        <option value=""></option>
                        <?php
                        if (isset($lista_impresoras_modelo)) {
                          foreach ($lista_impresoras_modelo as $modelo){ echo '<option value="'.$modelo['modelo'].'">'.$modelo['modelo'].'</option>'; }
                        }
                        ?>
                      </select>
                    </div>

                    <div class="col-6">
                      <label for="">Tipo:</label><br>
                      <select name="tipo">
                        <option value=""></option>
                        <option value="Tanque">Tanque</option>
                        <option value="Toner">Toner</option>
                        <option value="Cartucho">Cartucho</option>
                      </select>
                    </div>

                    <div class="col-12">
                      <label for="">Consumible:</label><br>
                      <select name="consumible">
                        <option value=""></option>
                        <?php
                        if (isset($lista_impresoras_tinta)) {
                          foreach ($lista_impresoras_tinta as $tinta){ echo '<option value="'.$tinta['consumible'].'">'.$tinta['consumible'].'</option>'; }
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="row justify-content-center">
                    <div class="col-6">
                      <input type="submit" name="accion" value="Buscar">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
if (isset($_SESSION['msg'])) {
  echo '<script>
  alert("'.$_SESSION['msg'].'");
  location.href="/inventario_impresoras";
  </script>';
  unset($_SESSION['msg']);
}

include_once 'footer.php';
?>
