<?php
  require 'connect.php';

  $jugadores = $_REQUEST['jugadores'];
  $jurisdiccion = $_REQUEST['jurisdiccion'];
  $deporte = $_REQUEST['deporte'];
  $combinacion = $_REQUEST['combinacion'];

  //Solo estos deportes tienen equipos limitados
  if ($deporte == 2 || $deporte == 4 || $deporte == 5 || $deporte == 7 || $combinacion == 79 || $combinacion == 80 || $combinacion == 81) {
    $nomequipo = $_REQUEST['nomequipo'];
    //Consulta el numero de equipos que ya existen de esa jurisdiccion
    $stmt = $dbh->prepare("SELECT COUNT(DISTINCT persona.numequipo)
                            FROM persona
                            INNER JOIN inscripcion ON persona.id_persona = inscripcion.id_persona
                            INNER JOIN combinacion ON inscripcion.id_combinacion = combinacion.id_combinacion
                            WHERE combinacion.id_deporte = ".$deporte." AND persona.denominacionjur = ".$jurisdiccion."
                            GROUP BY numequipo");
    $stmt->execute();
    $numequipo = $stmt->rowCount() + 1;
    //Se verifica que la cantidad de equipos no sobrepase el limite
    if ($numequipo > 1) {
      header("Location: error.hmtl");
    }
    if ($deporte == "2" && $numequipo > 6) {
      header("Location: error.php");
    }
    if ($deporte == "4" && $numequipo > 2) {
      header("Location: error.php");
    }
    if ($deporte == "5" and $numequipo > 2) {
      header("Location: error.php");
    }
    if ($deporte == "7" && $numequipo > 3) {
      header("Location: error.php");
    }

    for ($i=0; $i < $jugadores ; $i++) {
      //Inscribimos de a uno a cada jugador
      $nombre = $_REQUEST['apellido'.$i].",".$_REQUEST['nombre'.$i];
      $nacimiento = $_REQUEST['nacimiento'.$i];
      $dni = $_REQUEST['dni'.$i];
      if (isset($_REQUEST['pasbec'.$i])) {
        $pasbec = 1;
      } else {
        $pasbec = 0;
      }
      if (isset($_REQUEST['adscripto'.$i])) {
        $adscripto = 1;
      } else {
        $adscripto = 0;
      }

      //Calculamos la edad de la persona
      //explode the date to get month, day and year
      $nacimiento = explode("-", $nacimiento);
      //get age from date or birthdate
      $age = (date("md", date("U", mktime(0, 0, 0, $nacimiento[1], $nacimiento[0], $nacimiento[2]))) > date("md")
        ? ((date("Y") - $nacimiento[2]) - 1)
        : (date("Y") - $nacimiento[2]));

      //Agregamos la persona
      $stmt2 = $dbh->prepare("INSERT INTO persona(nombre, edad, dni, denominacionjur, numequipo, pasbec, adscripto)
                              VALUES (?,?,?,?,?,?,?) ");
      $stmt2->bindParam(1, $nombre);
      $stmt2->bindPAram(2, $age);
      $stmt2->bindPAram(3, $dni);
      $stmt2->bindPAram(4, $jurisdiccion);
      $stmt2->bindPAram(5, $numequipo);
      $stmt2->bindPAram(6, $pasbec);
      $stmt2->bindPAram(7, $adscripto);
      $stmt2->execute();
      //Buscamos el id de la persona que acabamos de agregar
      $stmt3 = $dbh->prepare("SELECT id_persona FROM persona WHERE dni = ".$dni." AND numequipo = ".$numequipo);
      $stmt3->execute();
      $id_persona = $stmt3->fetchAll();
      $persona = $id_persona[0][0];
      //Agregamos la combinacion para formar al equipo
      $stmt4 = $dbh->prepare("INSERT INTO inscripcion(id_persona, id_combinacion, fecha_inscripcion, nomequipo)
                              VALUES (?,?,?,?) ");
      $stmt4->bindParam(1, $persona);
      $stmt4->bindPAram(2, $combinacion);
      $stmt4->bindPAram(3, date("Y-m-d"));
      $stmt4->bindPAram(4, $nomequipo);
      $stmt4->execute();
    }
    //Una vez terminado, redireccionamos a otra pagina
    header("Location: guardado.html");
  } else {
    for ($i=0; $i < $jugadores ; $i++) {

      $nombre = $_REQUEST['apellido'.$i].",".$_REQUEST['nombre'.$i];
      $nacimiento = $_REQUEST['nacimiento'.$i];
      $dni = $_REQUEST['dni'.$i];
      if (isset($_REQUEST['pasbec'.$i])) {
        $pasbec = 1;
      } else {
        $pasbec = 0;
      }
      if (isset($_REQUEST['adscripto'.$i])) {
        $adscripto = 1;
      } else {
        $adscripto = 0;
      }

      //Calculamos la edad de la persona
      //explode the date to get month, day and year
      $nacimiento = explode("-", $nacimiento);
      //get age from date or birthdate
      $age = (date("md", date("U", mktime(0, 0, 0, $nacimiento[1], $nacimiento[0], $nacimiento[2]))) > date("md")
        ? ((date("Y") - $nacimiento[2]) - 1)
        : (date("Y") - $nacimiento[2]));

      //Agregamos la persona
      $stmt2 = $dbh->prepare("INSERT INTO persona(nombre, edad, dni, denominacionjur, pasbec, adscripto)
                              VALUES (?,?,?,?,?,?) ");
      $stmt2->bindParam(1, $nombre);
      $stmt2->bindPAram(2, $age);
      $stmt2->bindPAram(3, $dni);
      $stmt2->bindPAram(4, $jurisdiccion);
      $stmt2->bindPAram(5, $pasbec);
      $stmt2->bindPAram(6, $adscripto);
      $stmt2->execute();
      //Buscamos el id de la persona que acabamos de agregar
      $stmt3 = $dbh->prepare("SELECT id_persona FROM persona WHERE dni = ".$dni);
      $stmt3->execute();
      $id_persona = $stmt3->fetchAll();
      $persona = $id_persona[0][0];
      //Agregamos la combinacion para formar al equipo
      $stmt4 = $dbh->prepare("INSERT INTO inscripcion(id_persona, id_combinacion, fecha_inscripcion)
                              VALUES (?,?,?) ");
      $stmt4->bindParam(1, $persona);
      $stmt4->bindPAram(2, $combinacion);
      $stmt4->bindPAram(3, date("Y-m-d"));
      $stmt4->execute();
    }
    //Una vez terminado, redireccionamos a otra pagina
    header("Location: guardado.html");
  }

?>
