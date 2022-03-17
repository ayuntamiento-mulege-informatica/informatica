<?php
require_once 'lib/class_entrega_toner_tinta.php';
require_once 'lib/class_lista_usuarios.php';

$entrega_toner_tinta = new entrega_toner_tinta;
$usuarios = new lista_usuarios;

$info_reporte = $entrega_toner_tinta -> infoReporte($connect, $parametro_2);
$lista_usuarios = $usuarios -> listaDeUsuarios($connect);

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row">
    <div class="col-12">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h2>Nuevo reporte de mantenimiento</h2>

          <p align="center"> <a href="/nuevo_registro_toner_tinta">Crear nuevo registro de toner y tinta</a> </p>
        </div>
        <div class="contenido-contenedor">
          <form enctype="multipart/form-data" class="container-fluid" action="/lib/procesar_actualizacion_entrega_toner_tinta.php" method="post">
            <div class="row justify-content-center">
              <div class="col-1">
                <label for="id">ID:</label><br>
                <input id="id" type="text" name="id" value="<?php echo $info_reporte['id']; ?>" required>
              </div>

              <div class="col-3">
                <label for="fecha_cambio">Fecha de cambio:</label><br>
                <input id="fecha_cambio" type="date" name="fecha_cambio" value="<?php echo $info_reporte['fecha_cambio']; ?>" required>
              </div>

              <div class="col-4">
                <label for="area">Área:</label><br>
                <input id="area" type="text" name="area" value="<?php echo $info_reporte['area']; ?>" required>
              </div>

              <div class="col-4">
                <label for="impresora">Impresora:</label><br>
                <input id="impresora" type="text" name="impresora" value="<?php echo $info_reporte['impresora']; ?>" required>
              </div>

              <div class="col-2">
                <label for="tipo">Tipo :</label><br>
                <input id="tipo" type="text" name="tipo" value="<?php echo $info_reporte['tipo']; ?>" title="Toner, tanque, cartucho." required>
              </div>

              <div class="col-2">
                <label for="especificaciones">Modelo:</label><br>
                <input id="especificaciones" type="text" name="especificaciones" value="<?php echo $info_reporte['especificaciones']; ?>" title="Toner, tanque, cartucho." required>
              </div>

              <div class="col-2">
                <label for="cantidad">Cantidad:</label><br>
                <input id="cantidad"  type="number" name="cantidad" value="<?php echo $info_reporte['cantidad']; ?>" min="0" required>
              </div>

              <div class="col-6">
                <label for="recibe">Nombre (Recibe):</label><br>
                <input id="recibe" type="text" name="recibe" value="<?php echo $info_reporte['recibe']; ?>" required>
              </div>

              <div class="col-4">
                <label for="">Foto actual:</label><br>
                <a href="/evidencia/<?php echo $info_reporte['evidencia']; ?>" target="_blank"> <img class="imagen-formulario" src="/evidencia/thumbnail_<?php echo $info_reporte['evidencia']; ?>" alt=""> </a>
              </div>

              <div class="col-4">
                <label for="">Foto nueva:</label><br>
                <input type="file" name="evidencia" id="evidencia" onchange="return fileValidation('evidencia')">
              </div>

              <div class="col-4">
                <label for="">Vista previa:</label><br>
                <output id="list1"></output>
              </div>
            </div>

            <div class="row justify-content-center">
              <div class="col-2 centrar-botones">
                <input type="submit" name="accion" value="Actualizar">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>

<script src="/js/previsualizar_imagen.js"></script>
<script src="/js/comprobar_extension_archivo.js" type="text/javascript"></script>

<?php
if (isset($_SESSION['msg'])) {
  echo '<script>
  alert("'.$_SESSION['msg'].'");
  location.href="/editar_toner_tinta/'.$parametro_2.'";
  </script>';

  unset($_SESSION['msg']);
}

include_once 'footer.php';
?>
