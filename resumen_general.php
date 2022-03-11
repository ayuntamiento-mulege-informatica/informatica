<?php
require_once 'lib/class_titulos.php';

$titulos = new titulos;

if (!isset($parametro_2) && !isset($parametro_3)) {
  $lista_titulos = $titulos -> listaTitulos($connect);
}
else {
  // Sustitución de %20 por espacios en blanco
  $espacios = array("%20");
  $remplazo = array(" ");

  $nombre = str_replace($espacios, $remplazo, $parametro_3);
  $lista_titulos = $titulos -> listaTitulosNombre($connect, $parametro_2, $nombre);
}

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container-fluid">
  <section class="row justify-content-center">
    <div class="col-12 centrar-contenedor">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h3>Resumen general</h3>
        </div>

        <div class="contenido-contenedor centrar-botones" style="overflow: auto;">
          <?php if (isset($lista_titulos)): ?>
            <table id="resumen-general">
              <tr>
                <th>ADMIN</th>
                <th>TÍTULO</th>
                <th>NOMBRE(S)</th>
                <th>LOTE</th>
                <th>MANZANA</th>
                <th>UBICACIÓN</th>
                <th>FUNDO</th>
                <th>SUPERFICIE</th>
                <th>CANTIDAD</th>
                <th>PRECIO M<sup>2</sup></th>
                <th>RECIBOS</th>
                <th>DIA</th>
                <th>MES</th>
                <th>AÑO</th>
                <th>MOTIVO</th>
                <th>LEYENDA</th>
                <th>REGISTRÓ</th>
              </tr>

              <?php foreach ($lista_titulos as $titulo): ?>
                <tr>
                  <td><?php echo $titulo['admin']; ?></td>
                  <td><a href="/modificar_titulo/<?php echo $titulo['id']; ?>"><?php echo str_pad($titulo['titulo'], 5, '0', STR_PAD_LEFT); ?></a></td>
                  <td><?php echo $titulo['nombre']; ?></td>
                  <td><?php echo $titulo['lote']; ?></td>
                  <td><?php echo $titulo['manzana']; ?></td>
                  <td><?php echo $titulo['ubicacion']; ?></td>
                  <td><?php echo $titulo['fundo']; ?></td>
                  <td><?php echo $titulo['superficie']; ?></td>
                  <td><?php echo $titulo['cantidad']; ?></td>
                  <td><?php echo $titulo['precio_m2']; ?></td>
                  <td><?php echo $titulo['recibos']; ?></td>
                  <td><?php echo $titulo['dia']; ?></td>
                  <td><?php echo $titulo['mes']; ?></td>
                  <td><?php echo $titulo['anyo']; ?></td>
                  <td><?php echo $titulo['motivo']; ?></td>
                  <td><?php echo $titulo['leyenda']; ?></td>
                  <td><?php echo $titulo['registrado']; ?></td>
                </tr>
              <?php endforeach; ?>
            </table>
          <?php else: ?>
            <p>No se encontraron títulos.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include_once 'footer.php'; ?>
