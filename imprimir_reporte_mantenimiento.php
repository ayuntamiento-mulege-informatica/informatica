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
      <title>IMPRESIÓN DEL REPORTE DE MANTENIMIENTO No. <?php echo $info_reporte['reporte']; ?></title>
      <link rel="stylesheet" media="screen" href="/css/screen.css">
      <link rel="stylesheet" media="print" href="/css/print.css">
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
                <div style="width: 100%; height: 1.29cm; padding: .6cm .1cm 0 .1cm; text-align: right;"><?php echo $info_reporte['reporte']; ?></div>
                <!-- FECHA DE INGRESO -->
                <div style="width: 100%; height: 1.29cm; padding: .6cm .1cm 0 .1cm; text-align: right;"><?php echo $info_reporte['fecha_ingreso']; ?></div>
                <!-- FECHA DE SALIDA -->
                <div style="width: 100%; height: 1.29cm; padding: .6cm .1cm 0 .1cm; text-align: right;"><?php echo $info_reporte['fecha_salida']; ?></div>
              </div>
            </div>

            <!-- ESPACIO VACÍO -->
            <div style="width: 100%; height: .7cm;"> </div>

            <!-- INFORMACIÓN DEL EQUIPO -->
            <div style="display: flex; height: 1.4cm;">
              <!-- ÁREA DE TRABAJO -->
              <div style="width: 25%;">
                <div style="padding-top: .5cm; text-align: center;"><?php echo $info_reporte['area_trabajo']; ?></div>
              </div>

              <!-- UNIDAD -->
              <div style="width: 25%;">
                <div style="padding-top: .5cm; text-align: center;"><?php echo $info_reporte['unidad']; ?></div>
              </div>

              <!-- MARCA -->
              <div style="width: 25%;">
                <div style="padding-top: .5cm; text-align: center;"><?php echo $info_reporte['marca']; ?></div>
              </div>

              <!-- MODELO -->
              <div style="width: 25%;">
                <div style="padding-top: .5cm; text-align: center;"><?php echo $info_reporte['modelo']; ?></div>
              </div>
            </div>

            <!-- INFORMACIÓN DEL SOLICITANTE Y DE QUIEN RECIBE. -->
            <div style="display: flex; height: 1.4cm;">
              <!-- SOLICITA -->
              <div style="width: 50%; height: 1.4cm;">
                <div style="width: 100%; height: 1.4cm; padding: .5cm .1cm 0 .1cm;">
                  <?php echo $info_reporte['solicitante']; ?>
                </div>
              </div>

              <!-- RECIBE -->
              <div style="width: 50%; height: 1.4cm;">
                <div style="width: 100%; height: 1.4cm; padding: .5cm .1cm 0 .1cm;"><?php echo $info_reporte['recibe']; ?></div>
              </div>
            </div>

            <!-- INFORMACIÓN DE ACTIVIDAD -->
            <div style="display: flex; height: 4.3cm;">
              <!-- ACTIVIDAD -->
              <div style="width: 50%; height: 4.3cm; padding: .5cm .1cm 0 .1cm;"><?php echo $info_reporte['actividad']; ?></div>

              <!-- OBSERVACIONES -->
              <div style="width: 50%; height: 4.3cm; padding: .5cm .1cm 0 .1cm;"><?php echo $info_reporte['observaciones']; ?></div>
            </div>

            <!-- CONCLUSIONES Y ESTADO FINAL -->
            <div style="display: flex; height: 4.3cm;">
              <!-- CONCLUSIONES -->
              <div style="width: 50%; height: 4.3cm; padding: .5cm .1cm 0 .1cm;"><?php echo $info_reporte['conclusiones']; ?></div>

              <!-- ESTADO FINAL -->
              <div style="width: 50%; height: 4.3cm; padding: .5cm .1cm 0 .1cm;"><?php echo $info_reporte['estado_final']; ?></div>
            </div>

            <!-- ESPACIO VACÍO -->
            <div style="width: 100%; height: 2.5cm; float: left;"> </div>

            <!-- FIRMA DEL RESPONSABLE -->
              <div style="width: 100%; height: .6cm; float: left; text-align: center;">Ing. Jose Pablo Romero Verdugo</div>
            <div style="width: 100%; height: .6cm; float: left;"> </div>
          </div>
        </div>
      </main>
    </body>
    </html>
    <?php
}
?>
