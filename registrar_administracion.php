<?php
include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row justify-content-center">
    <div class="col-7 centrar-contenedor">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h3>Registrar administración</h3>
        </div>

        <div class="contenido-contenedor">
          <p><strong>NOTA:</strong> Todos los campos son obligatorios.</p>

          <form action="lib/procesar_nueva_administracion.php" method="post">
            <div>
              <label for="">Administración<span style="color: red;">*</span>:</label><br>
              <input type="text" name="admin" placeholder="Escriba con números romanos en mayúsculas" pattern="[IVXLCM]{1,}" required>
            </div>

            <div>
              <label for="">Presidente municipal<span style="color: red;">*</span>:</label><br>
              <input type="text" name="presidente_municipal" placeholder="Escriba el nombre del presidente municipal con mayúsculas" pattern="[A-ZÁÉÍÓÚÖÜ](.){1,}" required>
            </div>

            <div>
              <label for="">Síndico municipal<span style="color: red;">*</span>:</label><br>
              <input type="text" name="sindico_municipal" placeholder="Escriba el nombre del síndico municipal con mayúsculas" pattern="[A-ZÁÉÍÓÚÖÜ](.){1,}" required>
            </div>

            <div>
              <label for="">Secretario general<span style="color: red;">*</span>:</label><br>
              <input type="text" name="secretario_general" placeholder="Escriba el nombre del secretario general con mayúsculas" pattern="[A-ZÁÉÍÓÚÖÜ](.){1,}" required>
            </div>

            <div>
              <label for="">Director de catastro<span style="color: red;">*</span>:</label><br>
              <input type="text" name="director_catastro" placeholder="Escriba el nombre del director de catastro con mayúsculas" pattern="[A-ZÁÉÍÓÚÖÜ](.){1,}" required>
            </div>

            <div>
              <label for="">Tesorero municipal<span style="color: red;">*</span>:</label><br>
              <input type="text" name="tesorero_municipal" placeholder="Escriba el nombre del tesorero municipal con mayúsculas" pattern="[A-ZÁÉÍÓÚÖÜ](.){1,}" required>
            </div>

            <div class="centrar-botones">
              <input type="submit" name="accion" value="Registrar funcionarios">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include_once 'footer.php'; ?>
