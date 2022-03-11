<?php
require_once 'connect.php';
require_once 'lib/class_titulos.php';
require_once 'lib/class_administraciones.php';

session_start();

if (!isset($_SESSION['area'])) {
  header('location: /');
}
else {
  if ($_SESSION['area'] == 'Sindicatura') {

    $titulos = new titulos;
    $administraciones = new administraciones;

    $titulo = $titulos -> consultarIdTitulo($connect, $_GET['id']);
    $funcionario = $administraciones -> imprimirFuncionarios($connect, $titulo['admin']);

    ?>
    <!DOCTYPE html>
    <html lang="es-MX">
    <head>
      <meta charset="utf-8">
      <title>Título de propiedad - Página 4</title>
      <link rel="stylesheet" media="screen" href="/css/screen.css">
      <link rel="stylesheet" media="print" href="/css/print.css">
    </head>
    <body>
      <div class="pagina">
        <div class="hoja-2-fondo">
          <img src="/img/p2_3_4.png" alt="fondo_pagina_1">
        </div>

        <div class="hoja-4-contenido">
          <p>TUVE A LA VISTA EL PRESENTE CONTRATO DE COMPRA VENTA - TÍTULO DE PROPIEDAD, NÚMERO <input type="text" name="" value="" style="width: 2cm;"> EXPEDIENTE NÚMERO <input type="text" name="" value="" style="width: 2cm;">, HABIÉNDOSE TOMADO PARA LOS EFECTOS CORRESPONDIENTES.</p>

          <p align="right">SANTA ROSALÍA, B.C.S. A <input type="text" name="" value="" style="width: 2cm;"> DE <input type="text" name="" value="" style="width: 4cm;"> DE <input type="text" name="" value="" style="width: 3cm;"></p>

          <div style="height: 3cm;"> </div>

          <p align="center"><strong><?php echo $funcionario['director_catastro']; ?></strong><br>DIRECTOR DE CATASTRO<br>H. XVII AYUNTAMIENTO DE MULEGÉ</p>

          <div class="pie-de-pagina" style="top: 23cm !important;">
            <div class="izquierda">
              <p><strong>Título de propiedad No.:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red;"><?php echo str_pad($titulo['titulo'], 5, "0", STR_PAD_LEFT); ?></span></strong></p>
            </div>
            <div class="derecha">
              <p>Página 4 de 5</p>
            </div>
          </div>
        </div>
      </div>

      <div class="cubierta"></div>
    </body>
    </html>
    <?php
  }
}
?>
