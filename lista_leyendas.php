<?php
require_once 'lib/class_leyendas.php';

$leyendas = new leyendas;

$lista_leyendas = $leyendas -> listaLeyendasTodas($connect);

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row">
    <article class="col-12 centrar-contenedor">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h2>Lista de leyendas</h2>
        </div>

        <div class="contenido-contenedor">
          <table>
            <tr>
              <th>NÚMERO</th>
              <th>LEYENDA</th>
            </tr>

            <?php if (isset($lista_leyendas)): ?>
              <?php foreach ($lista_leyendas as $leyenda): ?>
                <tr>
                  <td><?php echo $leyenda['id']; ?></td>
                  <td><?php echo $leyenda['leyenda']; ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </table>
        </div>
      </div>
    </article>
  </section>
</main>

<?php include_once 'footer.php'; ?>
