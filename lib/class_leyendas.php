<?php
/**
 *
 */
class leyendas {
  function nuevaLeyenda($connect, $leyenda) {
    $sql = "INSERT INTO leyendas (id, leyenda) VALUES (null, '$leyenda')";
    mysqli_query($connect, $sql) or die ($connect -> error);

    return 'Leyenda guardada exitosamente.';
  }

  function listaLeyendasId($connect) {
    $sql = "SELECT id FROM leyendas";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $leyenda_id[] = array('id_leyenda' => $row['id']);
    }
    return $leyenda_id;
  }

  function listaLeyendasTexto($connect, $id_leyenda) {
    $sql = "SELECT leyenda FROM leyendas WHERE id = $id_leyenda";
    $query = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_array($query)){
      $leyenda[] = array('leyenda' => $row['leyenda']);
    }
    return $leyenda;
  }

  function listaLeyendasTodas($connect) {
    $sql = "SELECT * FROM leyendas";
    $query = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_array($query)){
      $leyendas[] = array(
        'id' => $row['id'],
        'leyenda' => $row['leyenda']
      );
    }
    return $leyendas;
  }
}

?>
