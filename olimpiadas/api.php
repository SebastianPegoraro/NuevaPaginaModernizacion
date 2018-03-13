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

    case 'getPersona':
  		//este case requiere una variable mas: el id del estado en cuestion. viene por GET cuando se la llama
  		$dni=$_REQUEST['dni'];
  		$stmt = $dbh->prepare("SELECT * FROM planta WHERE dni = ".$dni);
      $stmt->execute();
  		$table = $stmt->fetchAll();
  		foreach($table as $row){
        $apeynom = explode(',', $row["apeynom"]);
				//aca armamos cada "linea" del json
				$output_array[] = array( 'apellido' => $apeynom[0], 'nombre' => $apeynom[1] );
			}
  	break;
  }

  echo json_encode( $output_array );
?>
