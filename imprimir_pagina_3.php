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
      <title>Título de propiedad - Página 3</title>
      <link rel="stylesheet" media="screen" href="/css/screen.css">
      <link rel="stylesheet" media="print" href="/css/print.css">
    </head>
    <body>
      <div class="pagina">
        <div class="hoja-2-fondo">
          <img src="/img/p2_3_4.png" alt="fondo_pagina_1">
        </div>

        <div class="hoja-2-contenido">
          <p>OTORGADO EN LA PRESIDENCIA MUNICIPAL DE MULEGÉ, BAJA CALIFORNIA SUR, A LOS <strong><?php echo $titulo['dia']; ?></strong> DÍAS DEL MES DE <strong><?php echo $titulo['mes']; ?></strong> DEL AÑO <strong><?php echo $titulo['anyo']; ?></strong>.</p>

          <p align="center"><strong>POR LA PARTE VENDEDORA</strong></p>

          <table width="100%">
            <tr>
              <td colspan="2" style="height: 2.54cm;"></td>
            </tr>
            <tr>
              <td colspan="2" style="text-align: center; width: 100%;"><strong><?php echo $funcionario['presidente_municipal']; ?></strong><br>PRESIDENTE MUNICIPAL DEL<br>H. XVII AYUNTAMIENTO DE MULEGÉ</td>
            </tr>
            <tr>
              <td style="height: 2.54cm;"></td>
            </tr>
            <tr>
              <td colspan="2" style="text-align: center; width: 100%;"><strong><?php echo $funcionario['sindico_municipal']; ?></strong><br>SÍNDICO MUNICIPAL DEL<br>H. XVII AYUNTAMIENTO DE MULEGÉ</td>
            </tr>
            <tr>
              <td style="height: 2.54cm;"></td>
            </tr>
            <tr>
              <td style="text-align: center; width: 50%;"><strong><?php echo $funcionario['secretario_general']; ?></strong><br>SECRETARIO GENERAL<br>H. XVII AYUNTAMIENTO DE MULEGÉ</td>
              <td style="text-align: center; width: 50%;"><strong><?php echo $funcionario['tesorero_municipal']; ?></strong><br>TESORERO MUNICIPAL<br>H. XVII AYUNTAMIENTO DE MULEGÉ</td>
            </tr>
            <tr>
              <td style="height: 2.54cm;"></td>
            </tr>
            <tr>
              <td colspan="2" style="text-align: center;  width: 100%;"><strong><?php echo $funcionario['director_catastro']; ?></strong><br>DIRECTOR DE CATASTRO<br>H. XVII AYUNTAMIENTO DE MULEGÉ</td>
            </tr>
            <tr>
              <td style="height: 2.54cm;"></td>
            </tr>
            <tr>
              <td colspan="2" style="text-align: center;  width: 100%;">NOMBRE Y FIRMA DEL ADQUIRIENTE</td>
            </tr>
            <tr>
              <td style="height: 2.54cm;"></td>
            </tr>
            <tr>
              <td colspan="2" style="text-align: center;  width: 100%;"><strong><?php echo $titulo['nombre']; ?></strong><br>(* ADQUIRIENTES SOLO EN CASO DE SOCIEDAD CONYUGAL *)</td>
            </tr>
          </table>

          <div class="pie-de-pagina">
            <div class="izquierda">
              <p><strong>Título de propiedad No.:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red;"><?php echo str_pad($titulo['titulo'], 5, "0", STR_PAD_LEFT); ?></span></strong></p>
            </div>
            <div class="derecha">
              <p>Página 3 de 5</p> </div>
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
