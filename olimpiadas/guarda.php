<?php
  require 'connect.php';

  $jugadores = $_REQUEST['jugadores'];
  $jurisdiccion = $_REQUEST['jurisdiccion'];
  $deporte = $_REQUEST['deporte'];
  $combinacion = $_REQUEST['combinacion'];
  $nomequipo = $_REQUEST['nomequipo'];

  //Solo estos deportes tienen equipos limitados
  if ($deporte == 2 || $deporte == 4 || $deporte == 5 || $deporte == 5) {
    //Consulta el numero de equipos que ya existen de esa jurisdiccion
    $stmt = $dbh->prepare("SELECT COUNT(DISTINCT persona.numequipo) FROM persona INNER JOIN inscripcion ON persona.id_persona = inscripcion.id_persona
                            WHERE inscripcion.id_combinacion = ".$combinacion." AND persona.denominacionjur = ".$jurisdiccion." GROUP BY numequipo");
    $stmt->execute();
    $lista = $stmt->fetchAll();
    $numequipo = count($lista);

    for ($i=0; $i < $jugadores ; $i++) {

      $nombre = $_REQUEST['apellido'+$i] + $_REQUEST['nombre'+$i];
      $nacimiento = $_REQUEST['nacimiento'+$i];
      $dni = $_REQUEST['dni'+$i];
      $pasbec = $_REQUEST['pasbec'+$i];
      $abscripto = $_REQUEST['abscripto'+$i];
      //Agregamos la persona
      $stmt2 = $dbh->prepare("INSERT INTO persona(nombre, edad, dni, denominacionjur, numequipo, pasbec, abscripto)
                              VALUES (".$nombre.",".$nacimiento.",".$dni.",".$jurisdiccion.",".$numequipo.",".$pasbec.",".$abscripto.") ");
      $stmt2->execute();
      //Buscamos el id de la persona que acabamos de agregar
      $stmt3 = $dbh->prepare("SELECT id_persona FROM persona WHERE dni = ".$dni." AND numequipo = ".$numequipo);
      $stmt3->execute();
      $id_persona = $stmt3->fetchAll();
      //Agregamos la combinacion para formar al equipo
      $stmt4 = $dbh->prepare("INSERT INTO inscripcion(id_persona, id_combinacion, fecha_inscripcion, nomequipo)
                              VALUES (".$id_persona.",".$combinacion.",".date("Y-m-d").",".$nomequipo.") ");
      $stmt4->execute();
    }
    //Una vez terminado, redireccionamos a otra pagina
    header("Location: guardado.html");
  } else {
    for ($i=0; $i < $jugadores ; $i++) {

      $nombre = $_REQUEST['apellido'+$i] + $_REQUEST['nombre'+$i];
      $nacimiento = $_REQUEST['nacimiento'+$i];
      $dni = $_REQUEST['dni'+$i];
      $pasbec = $_REQUEST['pasbec'+$i];
      $abscripto = $_REQUEST['abscripto'+$i];
      //Agregamos la persona
      $stmt2 = $dbh->prepare("INSERT INTO persona(nombre, edad, dni, denominacionjur, pasbec, abscripto)
                              VALUES (".$nombre.",".$nacimiento.",".$dni.",".$jurisdiccion.",".$pasbec.",".$abscripto.") ");
      $stmt2->execute();
      //Buscamos el id de la persona que acabamos de agregar
      $stmt3 = $dbh->prepare("SELECT id_persona FROM persona WHERE dni = ".$dni." AND numequipo = ".$numequipo);
      $stmt3->execute();
      $id_persona = $stmt3->fetchAll();
      //Agregamos la combinacion para formar al equipo
      $stmt4 = $dbh->prepare("INSERT INTO inscripcion(id_persona, id_combinacion, fecha_inscripcion, nomequipo)
                              VALUES (".$id_persona.",".$combinacion.",".date("Y-m-d").",".$nomequipo.") ");
      $stmt4->execute();
    }
    //Una vez terminado, redireccionamos a otra pagina
    header("Location: guardado.html");
  }

?>
