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
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Empleado Publico</a>
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
              <a class="nav-link js-scroll-trigger" href="#premio">Premio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#acto">Acto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#nosotros">Quienes Somos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contacto">Contacto</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <!--<div class="intro-lead-in">15 Enero 2017</div>-->
          <div class="intro-heading text-uppercase">Olimpíadas 2018!</div>
          <a id="btn" class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#eventos"> Categorías </a>
        </div>
      </div>
    </header>

    <!-- Olimpiadas Grid -->
    <section id="olimpiadas" >
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Olimpíadas</h2>
            <h3 class="section-subheading text-muted">Estas son las disciplinas en las que pueden inscribirse!</h3>
          </div>
        </div>
        <div class="row">
          <?php
            include 'connect.php';
// Se generan los cuadros de los distintos deportes haciendo una llamada a la base de datos
            $stmt = $dbh->prepare("SELECT * FROM deporte");
            $stmt->execute();
      		  $table = $stmt->fetchAll();
            foreach($table as $row)	{
              echo '<div class="col-md-3 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal'.$row['id_deporte'].'">
                  <div class="portfolio-hover">
                    <div class="portfolio-hover-content">
                      <i class="fa fa-plus fa-3x"></i>
                    </div>
                  </div>
                  <img class="img-fluid" src="'.$row['imagen'].'" alt="">
                </a>
                <div class="portfolio-caption">
                  <h4>'.$row['nombre'].'</h4>
                  <p class="text-muted">';
              //ojo con el inner join y con las variables dentro de la consulta.
                      $stmt2 = $dbh->prepare("SELECT sexo.nombre FROM combinacion INNER JOIN sexo ON sexo.id_sexo = combinacion.id_sexo WHERE combinacion.id_deporte=".$row['id_deporte']." GROUP BY sexo.nombre");
                      $stmt2->execute();
                      $table2 = $stmt2->fetchAll();
                      foreach($table2 as $row2)	{
                        echo $row2['nombre'].'<br>'; //para que imprima un "enter" luego de cada sexo pongo el <br>
                      }
              //aca "sigue" el echo
              echo '</p>
                </div>
              </div>';
            }
          ?>
        </div>
      </div>
    </section>

    <!-- Olimpiadas Modals -->
    <?php
      include 'connect.php';
      //Se generan cada uno de los Modals para cada uno de los deportes de la misma manera que la grilla de mas arriba
      $stmt = $dbh->prepare("SELECT * FROM deporte");
      $stmt->execute();
      $table = $stmt->fetchAll();
      foreach($table as $row)	{
        echo '<div class="portfolio-modal modal fade" id="portfolioModal'.$row['id_deporte'].'" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                  <div class="rl"></div>
                </div>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-10 mx-auto">
                    <div class="modal-body">
                      <!-- Detalles -->
                      <h2 class="text-uppercase">'.$row['nombre'].'</h2>
                      <p class="item-intro text-muted">Detalles a tener en cuenta a la hora de participar.</p>
                      <img class="img-fluid d-block mx-auto" src="'.$row['imagen'].'" alt="">
                      <p>'.$row['descripcion'].'</p>
                      <div class="container">
                        <div class="row center">';
                          $stmt2 = $dbh->prepare("SELECT especialidad.nombre FROM especialidad INNER JOIN combinacion ON combinacion.id_especialidad = especialidad.id_especialidad WHERE combinacion.id_deporte = ".$row['id_deporte']." GROUP BY especialidad.nombre");
                          $stmt2->execute();
                          $table2 = $stmt2->fetchAll();
                          foreach ($table2 as $row2) {
                            if ($row['nombre'] == $row2['nombre']) {
                              echo '<div class="col-md-12">
                                <div class="row">';
                              $stmt3 = $dbh->prepare("SELECT sexo.nombre FROM sexo INNER JOIN combinacion ON combinacion.id_sexo = sexo.id_sexo WHERE combinacion.id_deporte = ".$row['id_deporte']." GROUP BY sexo.nombre");
                              $stmt3->execute();
                              $table3 = $stmt3->fetchAll();
                              foreach ($table3 as $row3) {
                                if (count($table3) < 2) {
                                  echo '<div class="col-md-12">
                                        <h4>'.$row3['nombre'].'</h4>
                                        <ul class="list-inline">';
                                          $stmt4 = $dbh->prepare("SELECT categoria.nombre FROM categoria INNER JOIN combinacion ON combinacion.id_edad = categoria.id_edad WHERE combinacion.id_deporte = ".$row['id_deporte']." GROUP BY categoria.nombre");
                                          $stmt4->execute();
                                          $table4 = $stmt4->fetchAll();
                                          foreach ($table4 as $row4) {
                                            echo '<li><button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-pencil"></i> '.$row4['nombre'].' </button></li><br>';
                                          }
                                        echo '</ul>
                                      </div>';
                                } else {
                                  echo '<div class="col-md-6">
                                        <h4>'.$row3['nombre'].'</h4>
                                        <ul class="list-inline">';
                                          $stmt4 = $dbh->prepare("SELECT categoria.nombre FROM categoria INNER JOIN combinacion ON combinacion.id_edad = categoria.id_edad WHERE combinacion.id_deporte = ".$row['id_deporte']." GROUP BY categoria.nombre");
                                          $stmt4->execute();
                                          $table4 = $stmt4->fetchAll();
                                          foreach ($table4 as $row4) {
                                            echo '<li><button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-pencil"></i> '.$row4['nombre'].' </button></li><br>';
                                          }
                                        echo '</ul>
                                      </div>';
                                }
                              }
                              echo '</div>
                                  </div>';
                            } else {
                              echo '<div class="col-md-6">
                                <h3>'.$row['nombre'].' '.$row2['nombre'].'</h3>
                                <div class="row">';
                                $stmt3 = $dbh->prepare("SELECT sexo.nombre FROM sexo INNER JOIN combinacion ON combinacion.id_sexo = sexo.id_sexo WHERE combinacion.id_deporte = ".$row['id_deporte']." GROUP BY sexo.nombre");
                                $stmt3->execute();
                                $table3 = $stmt3->fetchAll();
                                foreach ($table3 as $row3) {
                                  if (count($table3) < 2) {
                                    echo '<div class="col-md-12">
                                          <h4>'.$row3['nombre'].'</h4>
                                          <ul class="list-inline">';
                                            $stmt4 = $dbh->prepare("SELECT categoria.nombre FROM categoria INNER JOIN combinacion ON combinacion.id_edad = categoria.id_edad WHERE combinacion.id_deporte = ".$row['id_deporte']." GROUP BY categoria.nombre ORDER BY categoria.id_edad");
                                            $stmt4->execute();
                                            $table4 = $stmt4->fetchAll();
                                            foreach ($table4 as $row4) {
                                              echo '<li><button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-pencil"></i> '.$row4['nombre'].' </button></li><br>';
                                            }
                                          echo '</ul>
                                        </div>';
                                  } else {
                                    echo '<div class="col-md-6">
                                          <h4>'.$row3['nombre'].'</h4>
                                          <ul class="list-inline">';
                                            $stmt4 = $dbh->prepare("SELECT categoria.nombre FROM categoria INNER JOIN combinacion ON combinacion.id_edad = categoria.id_edad WHERE combinacion.id_deporte = ".$row['id_deporte']." GROUP BY categoria.nombre ORDER BY categoria.id_edad");
                                            $stmt4->execute();
                                            $table4 = $stmt4->fetchAll();
                                            foreach ($table4 as $row4) {
                                              echo '<li><button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-pencil"></i> '.$row4['nombre'].' </button></li><br>';
                                            }
                                          echo '</ul>
                                        </div>';
                                  }
                                }
                                echo '</div>
                                    </div>';
                            }
                          }
                        echo '</div>
                      </div>
                      <button class="btn btn-primary" data-dismiss="modal" type="button">
                        <i class="fa fa-times"></i>
                        Cerrar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>';
      }
    ?>

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
