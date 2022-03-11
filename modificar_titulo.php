<?php
require_once 'lib/class_titulos.php';

$titulos = new titulos;

// Se obtiene ID del título.
if (isset($parametro_3)) { $id = $titulos -> obtenerIdTitulo($connect, $parametro_2, $parametro_3); }
else { $id = $parametro_2; }

/* Si $id tiene un valor asignado, se realiza la consulta a la base de datos y su resultado se asigna a $titulo.
 * De lo contrario, se asigna valor nulo a $titulo.
 */
if (isset($id)) { $titulo = $titulos -> consultarIdTitulo($connect, $id); }
else { $titulo = null; }

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row justify-content-center">
    <div class="col-xl-12 centrar-contenedor">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h3>Modificar título</h3>
        </div>

        <div class="contenido-contenedor">
          <?php if (isset($titulo)): ?>

            <?php if ($titulo['bloqueado'] == 'N'): ?>

              <form class="container-fluid" action="/lib/procesar_modificar_titulo.php" method="post">
                <div class="row">
                  <div class="col-12">
                    <p><strong>NOTA:</strong> Los campos marcados con <span style="color: red;">*</span> son obligatorios.</p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-2">
                    <label for="">Administración<span style="color: red;">*</span></label><br>
                    <input type="text" name="admin" value="<?php echo $titulo['admin']; ?>" readonly>
                  </div>

                  <div class="col-2">
                    <label for="">No. de título</label><br>
                    <input type="number" name="num_titulo" maxlength="5" value="<?php echo $titulo['titulo']; ?>" readonly>
                  </div>

                  <div class="col-8">
                    <label for="">Nombre(s) de expedición del título<span style="color: red;">*</span></label><br>
                    <input type="text" name="nombre_adquiriente" value="<?php echo $titulo['nombre']; ?>" required>
                  </div>
                </div>

                <div class="row justify-content-center">
                  <div class="col-4">
                    <label for="">Lote<span style="color: red;">*</span></label><br>
                    <input type="text" name="lote" value="<?php echo $titulo['lote']; ?>" required>

                    <label for="">Manzana<span style="color: red;">*</span></label><br>
                    <input type="text" name="manzana" value="<?php echo $titulo['manzana']; ?>" required>
                  </div>

                  <div class="col-4">
                    <label for="">Clave catastral<span style="color: red;">*</span></label><br>
                    <input type="text" name="clave_catastral" value="<?php echo $titulo['clave_catastral']; ?>" required>

                    <label for="">Ubicación del lote<span style="color: red;">*</span></label><br>
                    <input type="text" name="ubicacion_lote" value="<?php echo $titulo['ubicacion']; ?>" required>
                  </div>

                  <div class="col-4">
                    <label for="">Fundo legal<span style="color: red;">*</span></label><br>
                    <input type="text" name="fundo_legal"  value="<?php echo $titulo['fundo']; ?>" required>

                    <label for="">Superficie total<span style="color: red;">*</span></label><br>
                    <input type="text" name="superficie_total" value="<?php echo $titulo['superficie']; ?>" required>
                  </div>

                  <div class="col-12">
                    <label for="">Colindancias<span style="color: red;">*</span></label><br>
                    <textarea type="text" name="colindancias" style="font-family: monospace;" rows="5" required><?php echo $titulo['colindancias']; ?></textarea>
                  </div>

                  <div class="col-10">
                    <label for="">Precio total<span style="color: red;">*</span></label><br>
                    <input type="text" name="precio_total" value="<?php echo $titulo['cantidad']; ?>" required>
                  </div>

                  <div class="col-2">
                    <label for="">Precio por M<sup>2</sup><span style="color: red;">*</span></label><br>
                    <input type="text" name="precio_m2" value="<?php echo $titulo['precio_m2']; ?>" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <label for="">Recibos de pago<span style="color: red;">*</span></label><br>
                    <textarea type="text" name="recibos_pago" style="font-family: monospace;" rows="5" required><?php echo $titulo['recibos']; ?></textarea>
                  </div>
                </div>

                <div class="row">
                  <div class="col-4">
                    <label for="">Día con letra<span style="color: red;">*</span></label><br>
                    <input type="text" name="dia_letra" value="<?php echo $titulo['dia']; ?>" required>
                  </div>

                  <div class="col-4">
                    <label for="">Mes con letra<span style="color: red;">*</span></label><br>
                    <input type="text" name="mes_letra" value="<?php echo $titulo['mes']; ?>" required>
                  </div>

                  <div class="col-4">
                    <label for="">Año con letra<span style="color: red;">*</span></label><br>
                    <input type="text" name="ano_letra" value="<?php echo $titulo['anyo']; ?>" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <label for="">Leyenda del título<span style="color: red;">*</span></label><br>
                    <textarea id="leyenda_texto" type="text" name="leyenda_titulo" rows="5"><?php echo $titulo['leyenda']; ?></textarea>
                  </div>
                </div>

                <div class="row justify-content-center">
                  <div class="col-3 centrar-botones">
                    <input type="submit" name="accion" value="Actualizar título">
                  </div>
                </div>
              </form>

            <?php elseif($titulo['bloqueado'] == 'S'): ?>

              <form class="container-fluid" action="" method="post">
                <div class="row">
                  <div class="col-2">
                    <label for="">Administración</label><br>
                    <input type="text" name="admin" value="<?php echo $titulo['admin']; ?>" readonly>
                  </div>

                  <div class="col-2">
                    <label for="">No. de título</label><br>
                    <input type="number" name="num_titulo" maxlength="5" value="<?php echo str_pad($titulo['titulo'], 5, '0', STR_PAD_LEFT); ?>" readonly>
                  </div>

                  <div class="col-8">
                    <label for="">Nombre(s) de expedición del título</label><br>
                    <input type="text" name="nombre_adquiriente" value="<?php echo $titulo['nombre']; ?>"  readonly>
                  </div>
                </div>

                <div class="row justify-content-center">
                  <div class="col-4">
                    <label for="">Lote</label><br>
                    <input type="text" name="lote" value="<?php echo $titulo['lote']; ?>"  readonly>

                    <label for="">Manzana</label><br>
                    <input type="text" name="manzana" value="<?php echo $titulo['manzana']; ?>"  readonly>
                  </div>

                  <div class="col-4">
                    <label for="">Clave catastral</label><br>
                    <input type="text" name="clave_catastral" value="<?php echo $titulo['clave_catastral']; ?>"  readonly>

                    <label for="">Ubicación del lote</label><br>
                    <input type="text" name="ubicacion_lote" value="<?php echo $titulo['ubicacion']; ?>"  readonly>
                  </div>

                  <div class="col-4">
                    <label for="">Fundo legal</label><br>
                    <input type="text" name="fundo_legal"  value="<?php echo $titulo['fundo']; ?>"  readonly>

                    <label for="">Superficie total*</label><br>
                    <input type="text" name="superficie_total" value="<?php echo $titulo['superficie']; ?>"  readonly>
                  </div>

                  <div class="col-12">
                    <label for="">Colindancias</label><br>
                    <textarea type="text" name="colindancias" style="font-family: monospace;" rows="5"  readonly><?php echo $titulo['colindancias']; ?></textarea>
                  </div>

                  <div class="col-10">
                    <label for="">Precio total</label><br>
                    <input type="text" name="precio_total" value="<?php echo $titulo['cantidad']; ?>"  readonly>
                  </div>

                  <div class="col-2">
                    <label for="">Precio por M<sup>2</sup></label><br>
                    <input type="number" step="0.01" name="precio_m2" value="<?php echo $titulo['precio_m2']; ?>"  readonly>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <label for="">Recibos de pago</label><br>
                    <textarea type="text" name="recibos_pago" style="font-family: monospace;" rows="5"  readonly><?php echo $titulo['recibos']; ?></textarea>
                  </div>
                </div>

                <div class="row">
                  <div class="col-4">
                    <label for="">Día con letra</label><br>
                    <input type="text" name="dia_letra" value="<?php echo $titulo['dia']; ?>"  readonly>
                  </div>

                  <div class="col-4">
                    <label for="">Mes con letra</label><br>
                    <input type="text" name="mes_letra" value="<?php echo $titulo['mes']; ?>"  readonly>
                  </div>

                  <div class="col-4">
                    <label for="">Año con letra</label><br>
                    <input type="text" name="ano_letra" value="<?php echo $titulo['anyo']; ?>"  readonly>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <label for="">Leyenda del título</label><br>
                    <textarea id="leyenda_texto" type="text" name="leyenda_titulo" rows="5" readonly><?php echo $titulo['leyenda']; ?></textarea>
                  </div>
                </div>
              </form>

            <?php endif; ?>

          <?php else: ?>

            <p align="center">El título solicitado no fue localizado.</p>

          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <?php if (isset($titulo)): ?>
    <section class="row">
      <div class="col-12">
        <div class="contenedor">
          <div class="titulo-contenedor">
            <h3>Imprimir páginas</h3>
          </div>
          <div class="contenido-contenedor" style="text-align: center;">
            <?php if ($titulo['bloqueado'] == 'N'): ?>
              <a class="enlace-boton" href="/imprimir_pagina_1.php?id=<?php echo $titulo['id']; ?>" target="_blank">Página 1</a>
            <?php else: ?>
              <span class="enlace-boton-bloqueado">Página 1</span>
            <?php endif; ?>
            <a class="enlace-boton" href="/imprimir_pagina_2.php?id=<?php echo $titulo['id']; ?>" target="_blank">Página 2</a>
            <a class="enlace-boton" href="/imprimir_pagina_3.php?id=<?php echo $titulo['id']; ?>" target="_blank">Página 3</a>
            <a class="enlace-boton" href="/imprimir_pagina_4.php?id=<?php echo $titulo['id']; ?>" target="_blank">Página 4</a>
            <a class="enlace-boton" href="/imprimir_pagina_5.php?id=<?php echo $titulo['id']; ?>" target="_blank">Página 5</a>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
</main>

<?php
include_once 'footer.php';

if (isset($_SESSION['msg'])) {
  echo '<script>
  alert("'.$_SESSION['msg'].'");
  location.href="/modificar_titulo/'.$parametro_2.'";
  </script>';

  unset($_SESSION['msg']);
}
?>
