<?php
require_once 'connect.php';
require_once 'lib/class_entrega_consumibles.php';

$entrega_consumibles = new entrega_consumibles;

if (!isset($_SESSION['area'])) {
  header('location: /');
}
else {

  $info_reporte = $entrega_consumibles -> infoReporte($connect, $parametro_2);
  ?>
  <!DOCTYPE html>
  <html lang="es-MX">
  <head>
    <meta charset="utf-8">
    <title>ENTREGA DE CONSUMIBLE No. <?php echo $info_reporte['id']; ?></title>
    <link rel="stylesheet" media="screen" href="/css/screen_consumibles.css">
    <link rel="stylesheet" media="print" href="/css/print_consumibles.css">
  </head>
  <body>
    <main>
      <div class="pagina">
        <div class="pagina-contenido">
          <!-- ENCABEZADO -->
          <div style="height: 3.88cm; display: flex;">
            <div style="width: 6.91cm;"> </div>
            <div style="width: 12.8cm;"> </div>
            <div style="width: 6.23cm;">
              <!-- NÚMERO DE REPORTE -->
              <div style="width: 100%; height: 1.29cm; padding: .6cm .1cm 0 .1cm; text-align: right;"><?php echo $info_reporte['id']; ?></div>
              <!-- FECHA DE INGRESO -->
              <div style="width: 100%; height: 1.29cm; padding: .6cm .1cm 0 .1cm; text-align: right;"><?php echo $info_reporte['fecha_cambio']; ?></div>
              <!-- FECHA DE SALIDA -->
              <!-- <div style="width: 100%; height: 1.29cm; padding: .6cm .1cm 0 .1cm; text-align: right;">< ?php echo $info_reporte['fecha_salida']; ?></div> -->
            </div>
          </div>

          <!-- ESPACIO VACÍO -->
          <div style="width: 100%; height: .7cm;"> </div>

          <!-- INFORMACIÓN DEL EQUIPO -->
          <div style="display: flex; height: 1.4cm;">
            <!-- ÁREA DE TRABAJO -->
            <div style="width: 20%;">
              <div style="padding-top: .5cm; text-align: center;"><?php echo $info_reporte['area']; ?></div>
            </div>

            <!-- UNIDAD -->
            <div style="width: 20%;">
              <div style="padding-top: .5cm; text-align: center;"><?php echo $info_reporte['impresora']; ?></div>
            </div>

            <!-- MARCA -->
            <div style="width: 20%;">
              <div style="padding-top: .5cm; text-align: center;"><?php echo $info_reporte['tipo']; ?></div>
            </div>

            <!-- MODELO -->
            <div style="width: 20%;">
              <div style="padding-top: .5cm; text-align: center;"><?php echo $info_reporte['especificaciones']; ?></div>
            </div>

            <!-- RECIBE -->
            <div style="width: 20%;">
              <div style="padding-top: .5cm; text-align: center;"><?php echo $info_reporte['recibe']; ?></div>
            </div>
          </div>

          <!-- EVIDENCIA -->
          <div style="width: 100%; max-height: 4.3cm; padding: .5cm .1cm 0 .1cm;">
            <img style="height: 13cm; display: block; margin: 0 auto;" src="/evidencia/<?php echo $info_reporte['evidencia']; ?>" alt="">
          </div>

          <!-- ESPACIO VACÍO -->
          <div style="width: 100%; height: 2.5cm; float: left;"> </div>
          <div style="width: 100%; height: .6cm; float: left;"> </div>
        </div>
      </div>
    </main>
  </body>
  </html>
  <?php
}
?>
