<?php
/**
 *
 */
class areas_trabajo {

  function listaAreasTrabajo($connect) {
    $sql = "SELECT area FROM areas_trabajo ORDER BY area ASC";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
      $area[] = array( 'area' => $row['area'] );
    }

    if (isset($area)) { return $area; }
    else { return null; }
  }
}

?>
