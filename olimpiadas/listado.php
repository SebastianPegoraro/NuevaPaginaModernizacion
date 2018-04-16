<!DOCTYPE html>
<html lang="es">

  <head>

    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Empleado Publico</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="../css/font.css" rel="stylesheet" type="text/css">
    <link href="../css/test.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="../css/agency.css" rel="stylesheet">



  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <div class="text-left">
          <ul class="fa-ul">
            <li><a class="navbar-brand js-scroll-trigger" href="../"><img src="../img/logos/chacowhite.png" alt="" class="img-chaco d-block mx-auto"></a></li>
          </ul>
        </div>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../#olimpiadas">Olimpíadas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../../#premio">Premio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../../#acto">Acto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../../#nosotros">Quienes Somos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../../#contacto">Contacto</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <?php
      include 'connect.php';

      $id_deporte = $_REQUEST['id_deporte'];

      $stmt = $dbh->prepare("SELECT nombre, imagen FROM deporte WHERE id_deporte = ".$id_deporte);
      $stmt->execute();
      $table = $stmt->fetchAll();
    ?>

    <!-- Header -->
    <header class="headolim" style="background-image: url('<?php echo $table[0][1] ?>')">
      <div class="container">
        <div class="intro-text">
          <!--<div class="intro-lead-in">15 Enero 2017</div>-->
          <div class="intro-heading text-uppercase">Listado de <?php echo $table[0][0] ?></div>
        </div>
      </div>
    </header>

    <!-- Listado -->
    <section>
      <div class="container">
        <div class="row">
        <?php
          if ($id_deporte == 1) {
            //En caso de ser maraton, se traen las distintas especialidades(3K y 5K)
            $stmt1 = $dbh->prepare("SELECT especialidad.nombre, especialidad.id_especialidad FROM especialidad INNER JOIN combinacion ON combinacion.id_especialidad = especialidad.id_especialidad
                                    WHERE combinacion.id_deporte = ".$id_deporte." GROUP BY especialidad.nombre");
            $stmt1->execute();
            $table1 = $stmt1->fetchAll();
            foreach ($table1 as $row1) {
              ?>
              <div class="col">
                <h1><?php echo $row1[0] ?></h1>
                  <?php
                  //Traemos las distintas categorias para maraton en este caso
                  $stmt2 = $dbh->prepare("SELECT categoria.nombre, categoria.id_edad FROM categoria INNER JOIN combinacion ON combinacion.id_edad = categoria.id_edad
                                          WHERE combinacion.id_deporte = ".$id_deporte." GROUP BY categoria.nombre ORDER BY categoria.id_edad");
                  $stmt2->execute();
                  $table2 = $stmt2->fetchAll();
                  foreach ($table2 as $row2) {
                    ?>
                      <h2><?php echo $row2[0] ?></h2>
                      <?php
                      //Buscamos si hay al menos un inscripto en la categoria
                        $stmt4 = $dbh->prepare("SELECT inscripcion.id_persona FROM inscripcion INNER JOIN combinacion ON combinacion.id_combinacion = inscripcion.id_combinacion
                                                WHERE combinacion.id_deporte = ".$id_deporte." AND combinacion.id_edad = ".$row2[1]." AND combinacion.id_especialidad = ".$row1[1]);
                        $stmt4->execute();
                        $table4 = $stmt4->fetchAll();
                        if (empty($table4)) {
                          //si no hay nadie, muestra un mensaje
                          ?> <h1>Nadie se Inscribió hasta el momento!</h1> <?php
                        } else {
                          //Si hay alguien
                          //Traemos las distintas Jurisdicciones que se inscribieron
                          $stmt3 = $dbh->prepare("SELECT denominacionjur FROM planta
                                                  WHERE jurisdiccion IN (SELECT persona.denominacionjur FROM persona INNER JOIN inscripcion ON persona.id_persona = inscripcion.id_persona
                                                  INNER JOIN combinacion ON combinacion.id_combinacion = inscripcion.id_combinacion
                                                  WHERE combinacion.id_deporte = ".$id_deporte." AND combinacion.id_edad = ".$row2[1]." AND combinacion.id_especialidad = ".$row1[1]."
                                                  GROUP BY persona.denominacionjur )
                                                  GROUP BY denominacionjur ORDER BY jurisdiccion");
                          $stmt3->execute();
                          $table3 = $stmt3->fetchAll();
                          $cont = 0;
                          foreach ($table3 as $row3) {
                            ?>
                            <table class="table table-striped table-dark">
                              <h5><?php echo $row3[0] ?></h5>
                              <thead>
                                <tr>
                                  <th scope="col">Apellido</th>
                                  <th scope="col">Nombre</th>
                                  <th scope="col">Edad</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              //Traemos el numero de la jurisdiccion
                              $stmt6 = $dbh->prepare("SELECT persona.denominacionjur FROM persona INNER JOIN inscripcion ON persona.id_persona = inscripcion.id_persona
                                                      INNER JOIN combinacion ON combinacion.id_combinacion = inscripcion.id_combinacion
                                                      WHERE combinacion.id_deporte = ".$id_deporte." AND combinacion.id_edad = ".$row2[1]." AND combinacion.id_especialidad = ".$row1[1]."
                                                      GROUP BY persona.denominacionjur");
                              $stmt6->execute();
                              $table6 = $stmt6->fetchAll();
                                //Por ultimo traemos el nombre y la edad de la persona inscripta, para listarlo
                                $stmt5 = $dbh->prepare("SELECT persona.nombre, persona.edad FROM persona INNER JOIN inscripcion ON inscripcion.id_persona = persona.id_persona
                                                        INNER JOIN combinacion ON combinacion.id_combinacion = inscripcion.id_combinacion
                                                        INNER JOIN categoria ON combinacion.id_edad = categoria.id_edad
                                                        WHERE combinacion.id_deporte = ".$id_deporte." AND combinacion.id_edad = ".$row2[1]." AND combinacion.id_especialidad = ".$row1[1]." AND persona.denominacionjur = ".$table6[$cont][0]);
                                $stmt5->execute();
                                $table5 = $stmt5->fetchAll();
                                foreach ($table5 as $row5) {
                                  $apeynom = explode(',', $row5[0]);
                                  ?>
                                    <tr>
                                      <td><?php echo $apeynom[0] ?></td>
                                      <td><?php echo $apeynom[1] ?></td>
                                      <td><?php echo $row5[1] ?></td>
                                    </tr>
                                  <?php
                                }
                              ?>
                              </tbody>
                            </table>
                            <?php
                            $cont = $cont + 1;
                          }
                        }
                      }
                ?>
              </div>
              <?php
            }
          } else {
            if ($id_deporte == 2 || $id_deporte == 4 || $id_deporte == 5) {
              ?>
              <div class="col">
                  <?php
                  //Traemos las distintas categorias para futbol, volei y basquet en este caso
                  $stmt2 = $dbh->prepare("SELECT categoria.nombre, categoria.id_edad
                                          FROM categoria
                                          INNER JOIN combinacion ON combinacion.id_edad = categoria.id_edad
                                          WHERE combinacion.id_deporte = ".$id_deporte." GROUP BY categoria.nombre ORDER BY categoria.id_edad");
                  $stmt2->execute();
                  $table2 = $stmt2->fetchAll();
                  foreach ($table2 as $row2) {
                    $stmtJ = $dbh->prepare("SELECT persona.denominacionjur
                                            FROM persona
                                            INNER JOIN inscripcion ON persona.id_persona = inscripcion.id_persona
                                            INNER JOIN combinacion ON combinacion.id_combinacion = inscripcion.id_combinacion
                                            WHERE combinacion.id_deporte = ".$id_deporte." AND combinacion.id_edad = ".$row2[1]."
                                            GROUP BY persona.denominacionjur");
                    $stmtJ->execute();
                    $jurisdicciones = $stmtJ->fetchAll();
                    foreach ($jurisdicciones as $rowJ) {
                      //Nombre de la categoria?>
                        <h2><?php echo $row2[0] ?></h2>
                        <?php
                        //Buscamos si hay al menos un equipo inscripto en la categoria
                          $stmt4 = $dbh->prepare("SELECT inscripcion.id_persona
                                                  FROM inscripcion
                                                  INNER JOIN combinacion ON combinacion.id_combinacion = inscripcion.id_combinacion
                                                  WHERE combinacion.id_deporte = ".$id_deporte." AND combinacion.id_edad = ".$row2[1]);
                          $stmt4->execute();
                          $table4 = $stmt4->fetchAll();
                          if (empty($table4)) {
                            //si no hay nadie, muestra un mensaje
                            ?> <h1>Nadie se Inscribió hasta el momento!</h1> <?php
                          } else {
                            //Si hay alguien
                            //Traemos las distintas Jurisdicciones que se inscribieron
                            $stmt3 = $dbh->prepare("SELECT denominacionjur
                                                    FROM planta
                                                    WHERE jurisdiccion = ".$rowJ[0]."
                                                    GROUP BY denominacionjur ORDER BY jurisdiccion");
                            $stmt3->execute();
                            $table3 = $stmt3->fetchAll();
                            foreach ($table3 as $row3) {
                              ?>
                              <table class="table table-striped table-dark">
                                <h5><?php echo $row3[0] ?></h5>
                                <?php
                                //Trae la todos los inscriptos cantidad de equipos inscriptos
                                $stmt8 = $dbh->prepare("SELECT DISTINCT p.numequipo
                                                        FROM persona p
                                                        INNER JOIN inscripcion i ON i.id_persona = p.id_persona
                                                        INNER JOIN combinacion c ON c.id_combinacion = i.id_combinacion
                                                        WHERE c.id_deporte = ".$id_deporte." AND p.denominacionjur = ".$rowJ[0]);
                                $stmt8->execute();
                                $table8 = $stmt8->fetchAll();
                                for ($i=1; $i<=count($table8); $i++) {
                                  //trae el nombre del equipo
                                  $stmt7 = $dbh->prepare("SELECT i.nomequipo
                                                          FROM persona p
                                                          INNER JOIN inscripcion i ON i.id_persona = p.id_persona
                                                          WHERE p.numequipo = ".$i." AND p.denominacionjur = ".$rowJ[0]."
                                                          GROUP BY i.nomequipo");
                                  $stmt7->execute();
                                  $table7 = $stmt7->fetchAll();
                                  //die(var_dump($table7));
                                 ?>
                                 <h3><?php echo $table7[0][0] ?></h3>
                                <thead>
                                  <tr>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Edad</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                  //Por ultimo traemos el nombre y la edad de la persona inscripta, para listarlo
                                  $stmt5 = $dbh->prepare("SELECT persona.nombre, persona.edad FROM persona INNER JOIN inscripcion ON inscripcion.id_persona = persona.id_persona
                                                          INNER JOIN combinacion ON combinacion.id_combinacion = inscripcion.id_combinacion
                                                          INNER JOIN categoria ON combinacion.id_edad = categoria.id_edad
                                                          WHERE combinacion.id_deporte = ".$id_deporte." AND combinacion.id_edad = ".$row2[1]." AND persona.denominacionjur = ".$rowJ[0]);
                                  $stmt5->execute();
                                  $table5 = $stmt5->fetchAll();
                                  foreach ($table5 as $row5) {
                                    $apeynom = explode(',', $row5[0]);
                                    ?>
                                      <tr>
                                        <td><?php echo $apeynom[0] ?></td>
                                        <td><?php echo $apeynom[1] ?></td>
                                        <td><?php echo $row5[1] ?></td>
                                      </tr>
                                    <?php
                                  }
                                ?>
                                </tbody>
                                <?php
                              }//Termina for de los distintos equipos por categoria
                            ?>
                              </table>
                              <?php
                            }//Termina for del nombre de las jurisdicciones
                          }//Termina else del caso que exista inscriptos
                        }//Termina for de las distintas Jurisdicciones
                      }//termina for de categorias (edad, libre y otras)
                ?>
              </div>
              <?php
            }//termina if de basquet futbol y volei
          }//termina else
        ?>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/agency.js"></script>

  </body>

</html>
