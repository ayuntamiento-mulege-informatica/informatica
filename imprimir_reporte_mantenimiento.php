<?php
require_once 'connect.php';
require_once 'lib/class_reportes_mantenimiento.php';

$reportes_mantenimiento = new reportes_mantenimiento;

if (!isset($_SESSION['area'])) {
  header('location: /');
}
else {

    $info_reporte = $reportes_mantenimiento -> infoReporte($connect, $parametro_2);
    ?>
    <!DOCTYPE html>
    <html lang="es-MX">
    <head>
      <meta charset="utf-8">
      <title>Título de propiedad - Página 1</title>
      <link rel="stylesheet" media="screen" href="/css/screen.css">
      <link rel="stylesheet" media="print" href="/css/print.css">
    </head>
    <body>
      <main>
        <div class="pagina">
          <div class="pagina-contenido">
            <div style="width: 6.91cm; height: 3.88cm; float: left;"> </div>

            <div style="width: 12.8cm; height: 3.88cm; float: left;"> </div>

            <div style="width: 6.23cm; height: 3.88cm; float: left;">
              <!-- NÚMERO DE REPORTE -->
              <div style="width: 100%; height: 1.29cm; padding: .6cm .1cm 0 .1cm; text-align: right;"><?php echo $info_reporte['reporte']; ?></div>
              <!-- FECHA DE INGRESO -->
              <div style="width: 100%; height: 1.29cm; padding: .6cm .1cm 0 .1cm; text-align: right;"><?php echo $info_reporte['fecha_ingreso']; ?></div>
              <!-- FECHA DE SALIDA -->
              <div style="width: 100%; height: 1.29cm; padding: .6cm .1cm 0 .1cm; text-align: right;"><?php echo $info_reporte['fecha_salida']; ?></div>
            </div>

            <div style="width: 100%; height: .7cm; float: left;"> </div>

            <!-- ÁREA DE TRABAJO -->
            <div style="width: 20%; height: 2.6cm; float: left;">
              <div style="width:100%; height: .8cm;"> </div>
              <div style="width: 100%; height: 1.95cm; text-align: center;"><?php echo $info_reporte['area_trabajo']; ?></div>
            </div>

            <!-- UNIDAD -->
            <div style="width: 20%; height: 2.6cm; float: left">
              <div style="width:100%; height: .8cm;"> </div>
              <div style="width: 100%; height: 1.95cm; text-align: center;"><?php echo $info_reporte['unidad']; ?></div>
            </div>

            <!-- MARCA -->
            <div style="width: 20%; height: 2.6cm; float: left">
              <div style="width:100%; height: .8cm;"> </div>
              <div style="width: 100%; height: 1.95cm; text-align: center;"><?php echo $info_reporte['marca']; ?></div>
            </div>

            <!-- MODELO -->
            <div style="width: 20%; height: 2.6cm; float: left">
              <div style="width:100%; height: .8cm;"> </div>
              <div style="width: 100%; height: 1.95cm; text-align: center;"><?php echo $info_reporte['modelo']; ?></div>
            </div>

            <!-- SOLICITANTE -->
            <div style="width: 20%; height: 2.6cm; float: left">
              <div style="width:100%; height: .8cm;"> </div>
              <div style="width: 100%; height: 1.95cm; text-align: center;"><?php echo $info_reporte['solicitante']; ?></div>
            </div>

            <!-- ACTIVIDAD -->
            <div style="width: 50%; height: 3.4cm; float: left; padding: .2cm .1cm;"><strong>ACTIVIDAD:</strong> <?php echo $info_reporte['actividad']; ?></div>

            <!-- OBSERVACIONES -->
            <div style="width: 50%; height: 3.4cm; float: left; padding: .2cm .1cm;"><strong>OBSERVACIONES:</strong> <?php echo $info_reporte['observaciones']; ?></div>

            <!-- CONCLUSIONES -->
            <div style="width: 100%; height: 4.3cm; float: left; padding: .2cm .1cm;"><strong>CONCLUSIONES:</strong> <?php echo $info_reporte['conclusiones']; ?></div>

            <!-- ESPACIO VACÍO -->
            <div style="width: 100%; height: 3cm; float: left;"> </div>

            <!-- FIRMA DEL RESPONSABLE -->
              <div style="width: 100%; height: .6cm; float: left; text-align: center;"><?php echo $info_reporte['responsable']; ?></div>
            <div style="width: 100%; height: .6cm; float: left;"> </div>
          </div>
        </div>
      </main>
    </body>
    </html>
    <?php
}
?>
