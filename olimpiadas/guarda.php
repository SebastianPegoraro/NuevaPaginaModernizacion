<?php
  require 'connect.php';

  $jugadores = $_REQUEST['jugadores'];
  $jurisdiccion = $_REQUEST['jurisdiccion'];

  for ($i=0; $i < $jugadores ; $i++) {

    $nombre = $_REQUEST['apellido'+$i] + $_REQUEST['nombre'+$i];
    $nacimiento = $_REQUEST['nacimiento'+$i];
    $dni = $_REQUEST['dni'+$i];
    $pasbec = $_REQUEST['pasbec'+$i];
    
    $stmt = $dbh->prepare("INSERT INTO persona(nombre, edad, dni, denominacionjur, numequipo, pasbec) VALUES (".$nombre.",".$nacimiento.",".$dni.",".$jurisdiccion.",[value-5],".$pasbec.") ");
    $stmt->execute();
  }
?>
