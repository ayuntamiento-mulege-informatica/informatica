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
      <title>Título de propiedad - Página 2</title>
      <link rel="stylesheet" media="screen" href="/css/screen.css">
      <link rel="stylesheet" media="print" href="/css/print.css">
    </head>
    <body>
      <div class="pagina">
        <div class="hoja-2-fondo">
          <img src="/img/p2_3_4.png" alt="fondo_pagina_2">
        </div>

        <div class="hoja-2-contenido">
          <p><strong>SEGUNDA.-</strong> Para Efectos Fiscales, el importe del lote descrito es por la cantidad de <strong><?php echo $titulo['cantidad']; ?></strong> Cantidad que fue debidamente determinada por avalúo emitido por la Dirección General de catastro Municipal.</p>

          <div style="height: 2mm"> </div>

          <p>A razón de <strong>$<?php echo $titulo['precio_m2']; ?></strong> por M2, misma que el comprador cubrió íntegramente según Recibos Oficiales que se describen con número, fecha y valor <strong>"<?php echo $titulo['recibos']; ?>"</strong></p>

          <div style="height: 2mm"> </div>

          <p><strong>TERCERA.-</strong> El H. Ayuntamiento de Mulegé, Baja California Sur, Adquirió la Fracción Materia del Presente de:</p>

          <div style="height: 2mm"> </div>

          <p><?php echo $titulo['leyenda']; ?></p>

          <div style="height: 2mm"> </div>

          <p><strong>CUARTA.-</strong> El H. Ayuntamiento de Mulegé, a través de sus Representantes, transmite la propiedad del Bien Inmueble descrito en la cláusula primera del presente contrato, por todos cuanto de Hecho y Derecho corresponda, libre de todo gravamen, al corriente en el pago de sus contribuciones fiscales y no existiendo adeudo alguno de dicho bien, a favor del ahora adquiriente.</p>

          <div style="height: 2mm"> </div>

          <p><strong>QUINTA.-</strong> Así mismo el H. Ayuntamiento de Mulegé, se obliga hacia el (la) propietario (a) a responder por la evicción que pudiese privarlo del todo o poarte de la posesión del inmueble en términos de los dispuesto por los ariuclos 2015, 2016 y demás relativos y aplicables del Código Civil en rigor.</p>

          <div style="height: 2mm"> </div>

          <p><strong>SEXTA.-</strong> El propietario(a) se obliga a destinar el inmueble que adquiere, a establecer CASA HABITACIÓN y formarán parte del patrimonio de familia en los tpérminos de los artículos 739, 746 y 748 del Código Civil vigente en la entidad y declara bajo protesta de decir verdad que en los últmios tres años no adquirido ningún inmueble que colinde con el que es objeto de este CONTRATO - TÍTULO.</p>

          <div style="height: 2mm"> </div>

          <p><strong>SÉPTIMA.-</strong> Los contratantes están de acuerdo en que la presente operación está lkibre de dolo, mala fe, vilencia, error, engaño y lucro indebido, o cualquier otro vicio que afecte la validez de este instrumento por lo que si posteriormente sugiere alguna diferencia, se hacen mutua gracia, renunciando desde este momento a ejercitar cualquier procedimiento judicial que se intauren en su contra por este motivo.</p>

          <div style="height: 2mm"> </div>

          <p><strong>OCTAVA.-</strong> El ahora propietario del inmueble objeto de la presenteoperación de CONTRATO-TÍTULO se obliga y se sujeta a las disposiciones y ordenamientos en materia fiscal de la Federación, Estado y Municipio, así como a los sistemas de cooperación,que establezcan las autoridades correspondientes para la urbanización, destinos, usos, provisiones o reservas aprobadas de la zona en la que se localiza el lote objeto del presente instrumento, en los términos de los artículos sexto, séptimo y demás relativos de la Ley de Desarrollo Urbano vigente en el Estado de Baja California Sur.</p>
          <div class="pie-de-pagina">
            <div class="izquierda">
              <p><strong>Título de propiedad No.:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: red;"><?php echo str_pad($titulo['titulo'], 5, "0", STR_PAD_LEFT); ?></span></strong></p>
            </div>
            <div class="derecha">
              <p>Página 2 de 5</p> </div>
            </div>
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
