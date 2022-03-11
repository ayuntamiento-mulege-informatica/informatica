<?php
require_once 'lib/class_titulos.php';
require_once 'lib/class_leyendas.php';
require_once 'lib/class_administraciones.php';

$titulos = new titulos;
$leyendas = new leyendas;
$administraciones = new administraciones;

$id_nuevo_titulo = $titulos -> contarTitulos($connect);
$id_leyendas = $leyendas -> listaLeyendasId($connect);
$administracion = $administraciones -> listaAdministraciones($connect);
$admin_actual = $administraciones -> administracionActual($connect);

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row justify-content-center">
    <div class="col-xl-12 centrar-contenedor">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h3>Registrar título</h3>
        </div>

        <div class="contenido-contenedor">
          <?php if (!isset($parametro_2)): ?>
            <!-- FORMULARIO PARA REGISTRAR TÍTULOS DE LA ADMINISTRACIÓN ACTUAL -->
            <form class="container-fluid" action="/lib/procesar_titulo_nuevo.php" method="post">
              <div class="row">
                <div class="col-12">
                  <p><strong>NOTA:</strong> Los campos marcados con <span style="color: red;">*</span> son obligatorios.</p>
                </div>
              </div>

              <div class="row">
                <div class="col-2">
                  <label for="">Administración<span style="color: red;">*</span></label><br>
                  <input type="text" name="admin" value="<?php echo $admin_actual; ?>" readonly>
                </div>

                <div class="col-2">
                  <label for="">No. de título</label><br>
                  <input type="number" name="num_titulo" maxlength="5" value="<?php echo $id_nuevo_titulo+1; ?>" readonly>
                </div>

                <div class="col-8">
                  <label for="">Nombre(s) de expedición del título<span style="color: red;">*</span></label><br>
                  <input type="text" name="nombre_adquiriente" required>
                </div>
              </div>

              <div class="row justify-content-center">
                <div class="col-4">
                  <label for="">Lote<span style="color: red;">*</span></label><br>
                  <input type="text" name="lote" required>

                  <label for="">Manzana<span style="color: red;">*</span></label><br>
                  <input type="text" name="manzana" required>
                </div>

                <div class="col-4">
                  <label for="">Clave catastral<span style="color: red;">*</span></label><br>
                  <input type="text" name="clave_catastral" required>

                  <label for="">Ubicación del lote<span style="color: red;">*</span></label><br>
                  <input type="text" name="ubicacion_lote" required>
                </div>

                <div class="col-4">
                  <label for="">Fundo legal<span style="color: red;">*</span></label><br>
                  <input type="text" name="fundo_legal" required>

                  <label for="">Superficie total<span style="color: red;">*</span></label><br>
                  <input type="text" name="superficie_total" required>
                </div>

                <div class="col-12">
                  <label for="">Colindancias<span style="color: red;">*</span></label><br>
                  <textarea type="text" name="colindancias" style="font-family: monospace;" rows="5" required></textarea>
                </div>

                <div class="col-10">
                  <label for="">Precio total<span style="color: red;">*</span></label><br>
                  <input type="text" name="precio_total" required>
                </div>

                <div class="col-2">
                  <label for="">Precio por M<sup>2</sup><span style="color: red;">*</span></label><br>
                  <input type="text" name="precio_m2" required>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <label for="">Recibos de pago<span style="color: red;">*</span></label><br>
                  <textarea type="text" name="recibos_pago" style="font-family: monospace;" rows="5" required></textarea>
                </div>
              </div>

              <div class="row">
                <div class="col-4">
                  <label for="">Día con letra<span style="color: red;">*</span></label><br>
                  <input type="text" name="dia_letra" required>
                </div>

                <div class="col-4">
                  <label for="">Mes con letra<span style="color: red;">*</span></label><br>
                  <input type="text" name="mes_letra" required>
                </div>

                <div class="col-4">
                  <label for="">Año con letra<span style="color: red;">*</span></label><br>
                  <input type="text" name="ano_letra" required>
                </div>
              </div>

              <div class="row">
                <div class="col-1">
                  <label for="">Leyenda</label>
                  <select id="id_leyenda" class="" name="id_leyenda">
                    <option value=""></option>
                    <?php
                    foreach ($id_leyendas as $leyenda_id) {
                      echo '<option value="'.$leyenda_id['id_leyenda'].'">'.$leyenda_id['id_leyenda'].'</option>';
                    }
                    ?>
                  </select>
                </div>

                <div class="col-11">
                  <label for="">Leyenda del título<span style="color: red;">*</span></label><br>
                  <textarea id="leyenda_texto" type="text" name="leyenda_titulo" rows="5"></textarea>
                </div>
              </div>

              <div class="row justify-content-center">
                <div class="col-3 centrar-botones">
                  <input type="submit" name="accion" value="Registrar título">
                </div>
              </div>
            </form>
          <?php else: ?>
            <!-- FORMULARIO PARA REGISTRAR TÍTULOS DE ADMINISTRACIONES ANTERIORES -->
            <form class="container-fluid" action="/lib/procesar_titulo_nuevo.php" method="post">
              <div class="row">
                <div class="col-12">
                  <p><strong>NOTA:</strong> Los campos marcados con <span style="color: red;">*</span> son obligatorios.</p>
                </div>
              </div>

              <div class="row">
                <div class="col-2">
                  <label for="">Administración<span style="color: red;">*</span></label><br>
                  <select name="admin">
                    <?php if (isset($administracion)): ?>
                      <?php foreach ($administracion as $admin): ?>
                        <option value="<?php echo $admin['admin']; ?>"><?php echo $admin['admin']; ?></option>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <option value="">No hay administraciones registradas</option>
                    <?php endif; ?>
                  </select>
                </div>

                <div class="col-2">
                  <label for="">No. de título</label><br>
                  <input type="number" name="num_titulo" min="1" maxlength="5" required>
                </div>

                <div class="col-8">
                  <label for="">Nombre(s) de expedición del título<span style="color: red;">*</span></label><br>
                  <input type="text" name="nombre_adquiriente" required>
                </div>
              </div>

              <div class="row justify-content-center">
                <div class="col-4">
                  <label for="">Lote<span style="color: red;">*</span></label><br>
                  <input type="text" name="lote" required>

                  <label for="">Manzana<span style="color: red;">*</span></label><br>
                  <input type="text" name="manzana" required>
                </div>

                <div class="col-4">
                  <label for="">Clave catastral<span style="color: red;">*</span></label><br>
                  <input type="text" name="clave_catastral" required>

                  <label for="">Ubicación del lote<span style="color: red;">*</span></label><br>
                  <input type="text" name="ubicacion_lote" required>
                </div>

                <div class="col-4">
                  <label for="">Fundo legal<span style="color: red;">*</span></label><br>
                  <input type="text" name="fundo_legal" required>

                  <label for="">Superficie total<span style="color: red;">*</span></label><br>
                  <input type="text" name="superficie_total" required>
                </div>

                <div class="col-12">
                  <label for="">Colindancias<span style="color: red;">*</span></label><br>
                  <textarea type="text" name="colindancias" style="font-family: monospace;" rows="5" required></textarea>
                </div>

                <div class="col-10">
                  <label for="">Precio total<span style="color: red;">*</span></label><br>
                  <input type="text" name="precio_total" required>
                </div>

                <div class="col-2">
                  <label for="">Precio por M<sup>2</sup><span style="color: red;">*</span></label><br>
                  <input type="text" name="precio_m2" required>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <label for="">Recibos de pago<span style="color: red;">*</span></label><br>
                  <textarea type="text" name="recibos_pago" style="font-family: monospace;" rows="5" required></textarea>
                </div>
              </div>

              <div class="row">
                <div class="col-4">
                  <label for="">Día con letra<span style="color: red;">*</span></label><br>
                  <input type="text" name="dia_letra" required>
                </div>

                <div class="col-4">
                  <label for="">Mes con letra<span style="color: red;">*</span></label><br>
                  <input type="text" name="mes_letra" required>
                </div>

                <div class="col-4">
                  <label for="">Año con letra<span style="color: red;">*</span></label><br>
                  <input type="text" name="ano_letra" required>
                </div>
              </div>

              <div class="row">
                <div class="col-1">
                  <label for="">Leyenda</label>
                  <select id="id_leyenda" class="" name="id_leyenda">
                    <option value=""></option>
                    <?php
                    foreach ($id_leyendas as $leyenda_id) {
                      echo '<option value="'.$leyenda_id['id_leyenda'].'">'.$leyenda_id['id_leyenda'].'</option>';
                    }
                    ?>
                  </select>
                </div>

                <div class="col-11">
                  <label for="">Leyenda del título<span style="color: red;">*</span></label><br>
                  <textarea id="leyenda_texto" type="text" name="leyenda_titulo" rows="5"></textarea>
                </div>
              </div>

              <div class="row justify-content-center">
                <div class="col-3 centrar-botones">
                  <input type="submit" name="accion" value="Registrar título anterior">
                </div>
              </div>
            </div>
          </form>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>

<script src="/js/leyendas.js"></script>

<?php
if (isset($_SESSION['msg'])) {
  echo '<script>
  alert("'.$_SESSION['msg'].'");
  location.href="/registrar_titulo";
  </script>';

  unset($_SESSION['msg']);
}

include_once 'footer.php';
?>
