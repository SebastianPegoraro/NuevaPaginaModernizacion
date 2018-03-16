<?php
  require 'connect.php';

  $jugadores = $_REQUEST['jugadores'];
  $jurisdiccion = $_REQUEST['jurisdiccion'];
  $deporte = $_REQUEST['deporte'];
  $combinacion = $_REQUEST['combinacion'];

  //Consulta el numero de equipos que ya existen de esa jurisdiccion
  if ($deporte == 2 || $deporte == 4 || $deporte == 5 || $deporte == 5) {
    $stmt = $dbh->prepare("SELECT especialidad.nombre, especialidad.id_especialidad FROM especialidad INNER JOIN combinacion ON combinacion.id_especialidad = especialidad.id_especialidad WHERE combinacion.id_deporte = 2 GROUP BY especialidad.nombre");
    $stmt->execute();
  }

  for ($i=0; $i < $jugadores ; $i++) {

    $nombre = $_REQUEST['apellido'+$i] + $_REQUEST['nombre'+$i];
    $nacimiento = $_REQUEST['nacimiento'+$i];
    $dni = $_REQUEST['dni'+$i];
    $pasbec = $_REQUEST['pasbec'+$i];

    $stmt = $dbh->prepare("INSERT INTO persona(nombre, edad, dni, denominacionjur, numequipo, pasbec) VALUES (".$nombre.",".$nacimiento.",".$dni.",".$jurisdiccion.",[value-5],".$pasbec.") ");
    $stmt->execute();
  }
?>
