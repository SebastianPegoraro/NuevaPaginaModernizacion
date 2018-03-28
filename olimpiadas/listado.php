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
              <a class="nav-link js-scroll-trigger" href="#olimpiadas">Olimpíadas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../#premio">Premio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../#acto">Acto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../#nosotros">Quienes Somos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../#contacto">Contacto</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <?php
      include 'connect.php';

      $id_deporte = $_REQUEST['id_deporte'];

      $stmt = $dbh->prepare("SELECT nombre FROM deporte WHERE id_deporte = ".$id_deporte);
      $stmt->execute();
      $table = $stmt->fetchAll();
    ?>

    <!-- Header -->
    <header class="masthead">
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
            //En caso de ser maraton, se traen las distintas especialidades
            $stmt1 = $dbh->prepare("SELECT especialidad.nombre, especialidad.id_especialidad FROM especialidad INNER JOIN combinacion ON combinacion.id_especialidad = especialidad.id_especialidad
                                    WHERE combinacion.id_deporte = ".$id_deporte." GROUP BY especialidad.nombre");
            $stmt1->execute();
            $table1 = $stmt1->fetchAll();
            foreach ($table1 as $row1) {
              ?>
              <div class="col-md-6">
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
                        //Traemos las distintas Jurisdicciones que se inscribieron
                        $stmt3 = $dbh->prepare("SELECT denominacionjur FROM planta
                                                WHERE jurisdiccion IN (SELECT persona.denominacionjur FROM persona INNER JOIN inscripcion ON persona.id_persona = inscripcion.id_persona
                                                INNER JOIN combinacion ON combinacion.id_combinacion = inscripcion.id_combinacion WHERE combinacion.id_deporte = ".$id_deporte." GROUP BY persona.denominacionjur )
                                                GROUP BY denominacionjur ORDER BY jurisdiccion");
                        $stmt3->execute();
                        $table3 = $stmt3->fetchAll();
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
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                              </tr>
                            </tbody>
                          </table>
                          <?php
                        }
                }
                ?>
              </div>
              <?php
            }
          }
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
