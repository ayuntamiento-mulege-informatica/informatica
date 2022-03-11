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

    // Bloquea título.
    $titulos -> bloquearTitulo($connect, $_GET['id']);
    $titulo = $titulos -> consultarIdTitulo($connect, $_GET['id']);
    $funcionario = $administraciones -> imprimirFuncionarios($connect, $titulo['admin']);

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
      <div class="pagina">
        <div class="hoja-1-fondo">
          <img src="/img/p1.png" alt="fondo_pagina_1">
        </div>


        <div class="hoja-1-contenido">
          <div class="hoja-1-folio">
            <p><strong>TÍTULO DE PROPIEDAD No. <span style="color: red;"> <?php echo str_pad($titulo['titulo'], 5, "0", STR_PAD_LEFT); ?></span></strong></p>
          </div>

          <p>El H. <?php echo $titulo['admin']; ?> AYUNTAMIENTO DE MULEGÉ, Baja California Sur, con las facultades que le otorga la Ley Orgánica del Gobierno Municipal del Estado de Baja California Sur, reglamentaria del título Octavo de la Constitución Plítica del Estado de Baja California Sur, en sus Artículos 51 Fracción II, Inciso E), G) y K), 53 Fracción XIII, 57, 166 y 171; así como con fundamentos en los artículos 128 y 132 de la Constitución Política del Estado de Baja California Sur, y de lo estipulado en el artículo 91 de la Ley de Hacienda para los Estados y Municipios del Estado de Baja California Sur, delegando para tal efecto a los CC. <strong><?php echo $funcionario['presidente_municipal']; ?></strong>, en su Calidad de Presidente Municipal, <strong><?php echo $funcionario['sindico_municipal']; ?></strong>, en calidad de Síndico Municipal, <strong><?php echo $funcionario['secretario_general']; ?></strong>, en Calidad de Secretario General, <strong><?php echo $funcionario['director_catastro']; ?></strong>, en Calidad de Director de Catastro Municipal, <strong><?php echo $funcionario['tesorero_municipal']; ?></strong>, Tesorero Municipal, todos ellos del H. <?php echo $titulo['admin']; ?> AYUNTAMIENTO DE MULEGÉ; celebran y otorgan el presente Contrato de Compraventa - Título de Propiedad, de conformidad con lo establecido en los Artículos 735, 736, 748, 773, 793, 2025, 2221, 2224 y 2225 del Código Civil vigente en la Entidad; A favor del (la) <strong><u>"<?php echo $titulo['nombre']; ?>"</u></strong>, Quien ha dado cumplimiento a las obligaciones que establecen los ordenamientos a que se hace referencia, con base en las siguientes:</p>

          <h2 align="center">Cláusulas:</h2>

          <p><strong>PRIMERA.-</strong> El objeto del presente Contrato - Título de Propiedad, es la Enajenación del Bien Inmueble Propiedad del Municipio de Mulegé, mismo que se identifica con el Número de Lote: <strong>"<?php echo $titulo['lote']; ?>"</strong> Manzana Número: <strong>"<?php echo $titulo['manzana']; ?>"</strong> con clave catastral: <strong>"<?php echo $titulo['clave_catastral']; ?>"</strong> ubicado en: <strong>"<?php echo $titulo['ubicacion']; ?>"</strong> dentro del Fundo Legal de: <strong>"<?php echo $titulo['fundo']; ?>"</strong> Según el Plano Oficial con Superficie de <strong>"<?php echo $titulo['superficie']; ?>"</strong>, con medidas y colindancias determinadas por la Dirección General de Obras Públicas y Asentamientos Humanos del Municipio de Mulegé, las cuales se describen a continuación:</p>
          <pre class="colindancias"><?php echo $titulo['colindancias']; ?></pre>

          <div class="pie-de-pagina-1"> <p>Página 1 de 5</p> </div>
        </div>
      </div>

      <!-- CUBIERTA DE PROTECCIÓN -->
      <div class="cubierta"></div>
    </body>
    </html>
    <?php
  }
}
?>
