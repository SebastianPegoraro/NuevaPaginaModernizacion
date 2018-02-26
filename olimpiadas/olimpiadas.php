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

            $stmt = $dbh->prepare("SELECT * FROM deporte");
            $stmt->execute();
      		  $table = $stmt->fetchAll();
            foreach($table as $row)	{
              echo '<div class="col-md-3 col-sm-6 portfolio-item">
                <a class="portfolio-link" data-toggle="modal" href="#portfolioModa'.$row['id_deporte'].'">
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
              //estas dentro de un echo. no podes poner instrucciones (o mas codigo) dentro del echo. por eso, el echo "termina" aca.
                      $id_deporte = $row['id_deporte'];
              //ojo con el inner join y con las variables dentro de la consulta.
                      $stmt2 = $dbh->prepare("SELECT sexo.nombre FROM combinacion INNER JOIN sexo ON sexo.id_sexo = combinacion.id_sexo WHERE combinacion.id_deporte=".$id_deporte." GROUP BY sexo.nombre");
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




          <!-- Maraton -->
          <div class="col-md-3 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="../img/portfolio/futbol.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Maratón</h4>
              <p class="text-muted">Masculino-Femenino</p>
            </div>
          </div>
          <!-- Futbol -->
          <div class="col-md-3 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/voley.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Fútbol 7</h4>
              <p class="text-muted">Masculinos-Señor Masculino-Femenino</p>
            </div>
          </div>
          <!-- Tenis de mesa -->
          <div class="col-md-3 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/pingpong.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Tenis de Mesa</h4>
              <p class="text-muted">Doble Masculino-Doble Femenino-Doble Mixto</p>
            </div>
          </div>
          <!-- Voley -->
          <div class="col-md-3 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/basquet.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Voleibol</h4>
              <p class="text-muted">Masculino-Femenino</p>
            </div>
          </div>
          <!-- Basquet -->
          <div class="col-md-3 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/ajedrez.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Básquetbol</h4>
              <p class="text-muted">Masculino-Femenino</p>
            </div>
          </div>
          <!-- Ajedrez -->
          <div class="col-md-3 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/truco.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Ajedrez</h4>
              <p class="text-muted">Mixto</p>
            </div>
          </div>
          <!-- Truco -->
          <div class="col-md-3 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal7">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/truco.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Truco</h4>
              <p class="text-muted">Mixto</p>
            </div>
          </div>
          <!-- Loba -->
          <div class="col-md-3 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal8">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/truco.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Loba</h4>
              <p class="text-muted">Mixto</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Premio -->
    <section id="premio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Premio</h2>
            <h3 class="section-subheading text-muted">Estos son los ganadores desde el inicio del Premio al Empleado Público!</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/premio/1.png" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h2 class="fuente">2010</h2>
                    <h4 class="subheading">Bruce Wayne</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Acá va la descripción.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/premio/2.png" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h2 class="fuente">2011</h2>
                    <h4 class="subheading">Clark Kent</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Acá va la descripción.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/premio/3.png" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h2 class="fuente">2012</h2>
                    <h4 class="subheading">Red Beard</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Acá va la descripción.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/premio/4.png" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h2 class="fuente">2013</h2>
                    <h4 class="subheading">Nicola Tesla</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Acá va la descripción.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/premio/5.png" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h2 class="fuente">2014</h2>
                    <h4 class="subheading">Barry Allen</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Acá va la descripción.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/premio/6.png" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h2 class="fuente">2015</h2>
                    <h4 class="subheading">Esteban Quito</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Acá va la descripción.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/premio/7.png" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h2 class="fuente">2016</h2>
                    <h4 class="subheading">Cosme Fulanito</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Acá va la descripción.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <h4>Podrias
                    <br>Ser El
                    <br>Siguiente!</h4>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Acto -->
    <section id="acto">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Acto</h2>
            <h3 class="section-subheading text-muted">Esto premiamos en el Acto al Empleado Público</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/acto/25.jpg" alt="">
              <h4>25 Años de Servicios</h4>
              <p class="text-muted">Agentes publicos con 25 años de servicios.</p>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/acto/jubi.jpg" alt="">
              <h4>Jubilados</h4>
              <p class="text-muted">Agentes publicos que estén a punto de jubilarse.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <p class="large text-muted">Si este año entras en una de las categorias, no te podes perder el Acto en el que te homenajeamos.-</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Logos -->
    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/1.png" alt="">
            </a>
          </div>
          <div class="col-md-4 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/2.png" alt="">
            </a>
          </div>
          <div class="col-md-4 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/3.png" alt="">
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Quienes Somos -->
    <section class="bg-light" id="nosotros">
      <div class="container">
        <div class="row text-center">
          <div class="col-sm-12">
            <h1>QUIENES SOMOS?</h1>
            <p>Somos la Dirección General de Modernización del Estado dependiente de la Secretaría General de Gobierno y Coordinación la cual tiene como misión
              <strong>modernizar y fortalecer</strong> a las Jurisdicciones  de la Administración Pública del Poder Ejecutivo.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Contacto -->
    <section id="contacto">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Contactanos!</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contactForm" name="sentMessage" novalidate>
              <div class="row">
                <div class="col-md-6 contactForm">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Nombre *" required data-validation-required-message="Este campo es requerido!">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Email *" required data-validation-required-message="Este campo es requerido!">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Teléfono *" required data-validation-required-message="Este campo es requerido!">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6 contactForm">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Mensaje *" required data-validation-required-message="Este campo es requerido!"></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Enviar Mensaje!</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; Your Website 2017</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>-->

    <!-- Olimpiadas Modals -->

    <!-- Maratón -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <!-- Detalles sobre Maratón -->
                  <h2 class="text-uppercase">Maratón</h2>
                  <p class="item-intro text-muted">Detalles a tener en cuenta a la hora de participar.</p>
                  <img class="img-fluid d-block mx-auto" src="../img/portfolio/futbolfull.jpg" alt="">
                  <p>Acá va la descripción. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Threads</li>
                    <li>Category: Illustration</li>
                  </ul>
                  <div class="container">
                    <div class="row center">
                      <div class="col-md-6">
                        <h3>Maratón 5 K</h3>
                        <div class="row">
                          <div class="col-md-6">
                            <h4>Masculino</h4>
                            <ul class="list-inline">
                              <li><button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-pencil"></i> Hasta 29 </button></li><br>
                              <li><button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-pencil"></i> 30 - 39 </button></li><br>
                              <li><button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-pencil"></i> 40 - 49 </button></li><br>
                              <li><button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-pencil"></i> 50 en adelante </button></li>
                            </ul>
                          </div>
                          <div class="col-md-6">
                            <h4>Femenino</h4>
                            <ul class="list-inline">
                              <li><button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-pencil"></i> Hasta 29 </button></li><br>
                              <li><button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-pencil"></i> 30 - 39 </button></li><br>
                              <li><button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-pencil"></i> 40 - 49 </button></li><br>
                              <li><button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-pencil"></i> 50 en adelante </button></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <h3>Maratón 3 K</h3>
                        <div class="row">
                          <div class="col-md-6">
                            <h4>Masculino</h4>
                            <ul class="list-inline">
                              <li><button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-pencil"></i> Hasta 29 </button></li><br>
                              <li><button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-pencil"></i> 30 - 39 </button></li><br>
                              <li><button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-pencil"></i> 40 - 49 </button></li><br>
                              <li><button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-pencil"></i> 50 en adelante </button></li>
                            </ul>
                          </div>
                          <div class="col-md-6">
                            <h4>Femenino</h4>
                            <ul class="list-inline">
                              <li><button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-pencil"></i> Hasta 29 </button></li><br>
                              <li><button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-pencil"></i> 30 - 39 </button></li><br>
                              <li><button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-pencil"></i> 40 - 49 </button></li><br>
                              <li><button class="btn btn-danger" data-dismiss="modal" type="button"><i class="fa fa-pencil"></i> 50 en adelante </button></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
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
    </div>

    <!-- Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Voley</h2>
                  <p class="item-intro text-muted">Detalles a tener en cuenta a la hora de participar.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/voleyfull.jpg" alt="">
                  <p>Acá va la descripción. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Explore</li>
                    <li>Category: Graphic Design</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Cerrar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 3 -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Ping Pong</h2>
                  <p class="item-intro text-muted">Detalles a tener en cuenta a la hora de participar.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/pingpongfull.jpg" alt="">
                  <p>Acá va la descripción. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Finish</li>
                    <li>Category: Identity</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Cerrar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 4 -->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Basquet</h2>
                  <p class="item-intro text-muted">Detalles a tener en cuenta a la hora de participar.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/basquetfull.jpg" alt="">
                  <p>Acá va la descripción. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Lines</li>
                    <li>Category: Branding</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Cerrar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 5 -->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Maraton</h2>
                  <p class="item-intro text-muted">Detalles a tener en cuenta a la hora de participar.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/ajedrezfull.jpg" alt="">
                  <p>Acá va la descripción. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Southwest</li>
                    <li>Category: Website Design</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Cerrar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 6 -->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Truco</h2>
                  <p class="item-intro text-muted">Detalles a tener en cuenta a la hora de participar.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/trucofull.jpg" alt="">
                  <p>Acá va la descripción. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Window</li>
                    <li>Category: Photography</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Cerrar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

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