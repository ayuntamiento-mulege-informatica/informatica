<?php
require_once 'lib/class_administraciones.php';

$administraciones = new administraciones;

$admin = $administraciones -> administracionActual($connect);
$funcionario = $administraciones -> listaFuncionarios($connect, $admin);

include_once 'header.php';
include_once 'menu.php';
?>

<main class="container">
  <section class="row justify-content-center">
    <div class="col-7 centrar-contenedor">
      <div class="contenedor">
        <div class="titulo-contenedor">
          <h3>Lista de funcionarios</h3>
        </div>

        <div class="contenido-contenedor">
          <table width="100%">
            <tr>
              <th>CARGO</th>
              <th>FUNCIONARIO</th>
            </tr>

            <tr>
              <td>PRESIDENTE MUNICIPAL</td>
              <td><?php echo $funcionario['presidente_municipal']; ?></td>
            </tr>
            <tr>
              <td>SÍNDICO MUNICIPAL</td>
              <td><?php echo $funcionario['sindico_municipal']; ?></td>
            </tr>
            <tr>
              <td>SECRETARIO GENERAL</td>
              <td><?php echo $funcionario['secretario_general']; ?></td>
            </tr>
            <tr>
              <td>DIRECTOR DE CATASTRO</td>
              <td><?php echo $funcionario['director_catastro']; ?></td>
            </tr>
            <tr>
              <td>TESORERO MUNICIPAL</td>
              <td><?php echo $funcionario['tesorero_municipal']; ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
if (isset($_SESSION['msg'])) {
  echo '<script>
  alert("'.$_SESSION['msg'].'");
  location.href="/funcionarios";
  </script>';

  unset($_SESSION['msg']);
}

include_once 'footer.php';
?>
