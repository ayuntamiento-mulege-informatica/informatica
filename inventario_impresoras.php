<?php
require_once 'lib/class_inventario_impresoras.php';
require_once 'lib/class_areas_trabajo.php';

$inventario_impresoras = new inventario_impresoras;
$areas_trabajo = new areas_trabajo;

$lista_impresoras_marcas = $inventario_impresoras -> listaImpresorasMarcas($connect);
$lista_impresoras_tipo = $inventario_impresoras -> listaImpresorasTipo($connect);
$lista_impresoras_modelo = $inventario_impresoras -> listaImpresorasModelo($connect);
$lista_impresoras_tinta = $inventario_impresoras -> listaImpresorasTinta($connect);
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
                      <input list="lista_areas" type="text" name="area">
                    </div>

                    <div class="col-6">
                      <label for="">Marca:</label><br>
                      <input list="impresoras_marcas" type="text" name="marca">
                    </div>

                    <div class="col-6">
                      <label for="">Modelo:</label><br>
                      <input list="lista_modelo" type="text" name="modelo">
                    </div>

                    <div class="col-6">
                      <label for="">Tipo:</label><br>
                      <input list="tipo_impresora" type="text" name="tipo">
                    </div>

                    <div class="col-12">
                      <label for="">Modelo de tinta o toner:</label><br>
                      <input list="lista_modelo_tinta" type="text" name="modelo_tinta_toner">
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

if (isset($lista_areas_trabajo)){
  echo '<datalist id="lista_areas">';
  foreach ($lista_areas_trabajo as $area_trabajo){ echo '<option value="'.$area_trabajo['area'].'">'.$area_trabajo['area'].'</option>'; }
  echo '</datalist>';
}

if (isset($lista_impresoras_marcas)) {
  echo '<datalist id="impresoras_marcas">';
  foreach ($lista_impresoras_marcas as $marca) { echo '<option value="'.$marca['marca'].'">'.$marca['marca'].'</option>'; }
  echo '</datalist>';
}

if (isset($lista_impresoras_tipo)) {
  echo '<datalist id="tipo_impresora">';
  foreach ($lista_impresoras_tipo as $tipo) { echo '<option value="'.$tipo['tipo'].'">'.$tipo['tipo'].'</option>'; }
  echo '</datalist>';
}

if (isset($lista_impresoras_modelo)) {
  echo '<datalist id="lista_modelo">';
  foreach ($lista_impresoras_modelo as $modelo){ echo '<option value="'.$modelo['modelo'].'">'.$modelo['modelo'].'</option>'; }
  echo '</datalist>';
}

if (isset($lista_impresoras_tinta)) {
  echo '<datalist id="lista_modelo_tinta">';
  foreach ($lista_impresoras_tinta as $tinta){ echo '<option value="'.$tinta['modelo_tinta_toner'].'">'.$tinta['modelo_tinta_toner'].'</option>'; }
  echo '</datalist>';
}

include_once 'footer.php';
?>
