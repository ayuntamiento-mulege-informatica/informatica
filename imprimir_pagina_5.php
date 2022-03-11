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
      <title>Título de propiedad - Página 5</title>
      <link rel="stylesheet" media="screen" href="/css/screen.css">
      <link rel="stylesheet" media="print" href="/css/print.css">
    </head>
    <body>
      <div class="pagina">
        <div class="hoja-5-fondo">
          <img src="/img/p5.png" alt="fondo_pagina_1">
        </div>

        <div class="hoja-2-contenido">
          <div class="pie-de-pagina">
            <div class="izquierda">
              <p><strong>Título de propiedad No.:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red;"><?php echo str_pad($titulo['titulo'], 5, "0", STR_PAD_LEFT); ?></span></strong></p>
            </div>
            <div class="derecha">
              <p>Página 5 de 5</p>
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
