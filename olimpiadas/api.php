<?php
  require('connect.php');

  $action = $_REQUEST['action'];

  $output_array = array();
  switch ($action) {
    case 'getJurisdiccion':
      $stmt = $dbh->prepare("SELECT * FROM planta GROUP BY jurisdiccion");
      $stmt->execute();
      $table = $stmt->fetchAll();
      foreach ($table as $key) {
        $output_array[] = array( 'idjur' => $key['jurisdiccion'], 'nombre' => $key['denominacionjur'] );
      }
      break;
  }

  echo json_encode( $output_array );
?>
