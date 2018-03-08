<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Empleado Público</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.css" rel="stylesheet">
    <link href="css/font.css" rel="stylesheet" type="text/css">
    <link href="css/test.css" rel="stylesheet" type="text/css">
    <link href="css/carousel.css" rel="stylesheet" type="text/css">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <div class="text-left">
          <ul class="fa-ul">
            <li><a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="img/logos/chacowhite.png" alt="" class="img-chaco d-block mx-auto"></a></li>
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
              <a class="nav-link js-scroll-trigger" href="#premio">Premio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#acto">Acto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#nosotros">Quiénes Somos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contacto">Contacto</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead" style="background-color: black;">
      <div class="container">
        <div class="intro-text">
          <!--<div class="intro-lead-in">15 Enero 2017</div>-->
          <div class="intro-heading text-uppercase">Empleado Público 2018</div>
          <a id="btn" class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#eventos"> Consultar Eventos! </a>
        </div>
      </div>
    </header>



    <!-- Eventos -->
    <section id="eventos">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Eventos!</h2>
            <h3 class="section-subheading text-muted">Ya estás preparado para este 2018?</h3>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <div class="team-member">
              <a href="olimpiadas/olimpiadas.php"><img class="mx-auto rounded-circle" src="img/eventos/olimpiadas.png" alt=""></a>
            </div>
            <h4 class="service-heading Medium">Olimpiadas</h4>
            <p class="text-muted">Prerate vos y tu equipo para participar es las Olimpiadas del Empleado Público 2018!</p>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/eventos/premio.png" alt="">
            </div>
            <h4 class="service-heading Medium">Premio</h4>
            <p class="text-muted">Este año puede ser tuyo! Inscribite y decinos por qué mereces el premio al Empleado Público 2018.</p>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/eventos/acto.png" alt="">
            </div>
            <h4 class="service-heading Medium">Acto</h4>
            <p class="text-muted">Vení a disfrutar de la mencion tuya y de tus colegas que se jubilan o que tienen más de 25 años de servicios.</p>
          </div>
        </div>
      </div>
    </section>

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
            include 'olimpiadas/connect.php';
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
                  <img class="img-fluid" src="'.substr($row['imagen'],1).'" alt="">
                </a>
                <div class="portfolio-caption">
                  <h4>'.$row['nombre'].'</h4>
                </div>
              </div>';
            }
          ?>
        </div>
      </div>
    </section>

    <!-- Premio -->
    <section id="premio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Premio</h2>
            <h3 class="section-subheading text-muted">Se da inicio a este gran Proyecto que tiene como fin principal reconocer y agasajar a los servidores públicos de la provincia del Chaco. <br>
              En esta oportunidad, quince jurisdicciones del participaron de la selección del Empleado Público del Año, que fue la novedad del acto de celebración del día en que se homenajea a los trabajadores.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/premio/empleado.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h2 class="fuente">2010</h2>
                    <h2 class="subheading"> Ganadores </h2>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted"><strong>Armando Higinio Romero</strong> (A.P.A.); <strong>Ana Catalina Gandola</strong> (T.G.P.); <strong>Luis Antonio Jarque</strong> (I.P.D.U.V.); <strong>Luis Alberto Pérez Barbosa</strong> (M.S.P.);
                      <strong>Juan Carlos Totaro Escuder</strong> (S.P.E.R.); <strong>Belquis Eva Gimeno</strong> (M.P.A.); <strong>Miguel Ángel Córdoba</strong> (M.I.S.P.); <strong>Luis Sergio Mailet</strong> (M.G.J.T.); <strong>Alberto Sánchez La Cruz</strong> (I.I.F.A.);
                      <strong>Miguel Ángel Sanchez</strong> (Gobernación); <strong>Lidia Noemí Sampayo</strong> (M.E.C.T.); <strong>Luis Romero</strong> (M.E.I.E.); <strong>Oscar Matienzo</strong> (M.D.S.D.H.);<strong> Sonia Alegría Acetti</strong> (I.C.C.); <strong>Delia Edy Rosales</strong> (C.G.P.). </p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/premio/empleado.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h2 class="fuente">2011</h2>
                    <h2 class="subheading"> Ganadores </h2>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted"><strong>Hugo Pascual Bargas</strong> (Gobernación); <strong>Domingo Miguel Cerdán</strong> (A.P.A.);<strong> Miguel Ángel Morales</strong> (C.G.);<strong> Norma Alejandra Pons</strong> (F.E.);
                      <strong>Mirtha Zulma Cabral</strong> (I.C); <strong>Erica Mariela Wuerich</strong> (I.P.D.U.V.); <strong>Norma Zarate García </strong>(INSSSEP); <strong>Alicia Silva de Gigli</strong> (M.E.I.E.);
                      <strong>Mercedes Ramona Ojeda</strong> (M.G.J.S.); <strong>Juan Carlos Aguirre </strong>(M.P.A.); <strong>Floraida Ayala</strong> (M.S.P.). </p>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/premio/2012.JPG" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h2 class="fuente">2012</h2>
                    <h4 class="subheading">Eduardo Enrique Cesario</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted"><strong>Capitanich</strong> felicitó a los empleados públicos.
                      “Trabajar en dependencias del Estado tiene un agregado adicional de los trabajadores que es el de la vocación de servicio.
                       Esto implica servir al prójimo, que no es otra cosa que amar al prójimo, por eso es que hoy los saludos con el mayor afecto de siempre”, </p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/premio/2013.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h2 class="fuente">2013</h2>
                    <h3 class="subheading">Francisco Pimienta</h3>
                    <h6 class="text-muted">(Ministerio de Planificación y Medio Ambiente)</h6>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Dicho evento fue declarado de Interes Provincial. Los ganadores recibieron la suma en pesos equivalente al medio aguinaldo y el reconocimiento
                      que incluirá la exhibición de su retrato con la leyenda “Empleado Público del año de la Jurisdicción XX”.</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/premio/2014.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h2 class="fuente">2014</h2>
                    <h2 class="subheading"> Inés Diaz </h2>
                    <h6 class="text-muted">(INSSSeP)</h6>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">El gobernador Bacileff Ivanoff destacó la importancia del empleado público del Poder Ejecutivo, entes autárquicos y diferentes reparticiones en el proceso de ejecución de las políticas del Estado.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/premio/2015.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h2 class="fuente">2015</h2>
                    <h4 class="subheading">María Donata Frutos </h4>
                    <h6 class="text-muted">(Ministerio de Planificación y Ambiente)</h6>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Su elección fue resultado de la votación de los propios ciudadanos chaqueños quienes, a través del portal oficial del gobierno, eligieron entre los perfiles de los ganadores en cada Jurisdicción aquel que, a su criterio, respondía mejor al perfil de “Buen Empleado Público”.</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/premio/2016.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h2 class="fuente">2016</h2>
                    <h4 class="subheading">Abelino Cáceres </h4>
                    <h6 class="text-muted">(Ministerio de Infraestructura)</h6>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">El gobernador Domingo Peppo dijo “Debemos darles herramientas a los trabajadores para que se sigan capacitando, que puedan perfeccionarse y sentirse a gusto con su trabajo”.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/premio/2017.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h2 class="fuente">2017</h2>
                    <h4 class="subheading">María Teresa González</h4>
                    <h6 class="text-muted">(Ministerio de Planificación, Ambiente e Innovación Tecnológica)</h6>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">El Premio "Empleado Público del Año" se realizó con el objetivo de reconocer públicamente la trayectoria de aquellos empleados públicos que en cada
                      jurisdicción mantienen un perfil considerado ejemplar.</p>
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
              <p class="text-muted">Agentes públicos con 25 años de servicios.</p>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/acto/jubi.jpg" alt="">
              <h4>Jubilados</h4>
              <p class="text-muted">Agentes públicos que estén a punto de jubilarse.</p>
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


    <!-- Quienes Somos -->
    <section class="somos" id="nosotros">
      <div class="container">
        <div class="row text-center">
          <div class="col-sm-12">
            <h1>QUIÉNES SOMOS?</h1>
            <p>Somos la Dirección General de Modernización del Estado dependiente de la Secretaría General de Gobierno y Coordinación la cual tiene como misión
              <strong>modernizar y fortalecer</strong> a las Jurisdicciones  de la Administración Pública del Poder Ejecutivo.</p>
          </div>
        </div>
        <div class="row">
          <h1>Direccion 1</h1>
      		<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/1.png" alt="" class="equipo">
                  <p>Ariel</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/2.png" alt="" class="equipo">
                  <p>Edward</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/3.png" alt="" class="equipo">
                  <p>Alphonse</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/4.png" alt="" class="equipo">
                  <p>Alex</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/5.png" alt="" class="equipo">
                  <p>Luis</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/6.png" alt="" class="equipo">
                  <p>Armstrong</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/7.png" alt="" class="equipo">
                  <p>Jack</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/1.png" alt="" class="equipo">
                  <p>Sparrow</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/2.png" alt="" class="equipo">
                  <p>Bill</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/3.png" alt="" class="equipo">
                  <p>Gates</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/4.png" alt="" class="equipo">
                  <p>Pepita</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/5.png" alt="" class="equipo">
                  <p>Pistolera</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/6.png" alt="" class="equipo">
                  <p>Rod</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/7.png" alt="" class="equipo">
                  <p>Flanders</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/1.png" alt="" class="equipo">
                  <p>Apu</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/2.png" alt="" class="equipo">
                  <p>Ble</p>
                </div>
              </div>
            </div>
            <button class="btn btn-primary leftLst"><</button>
            <button class="btn btn-primary rightLst">></button>
          </div>
      	</div>
        <div class="row">
          <h1>Direccion 2</h1>
      		<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/1.png" alt="" class="equipo">
                  <p>Ariel</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/2.png" alt="" class="equipo">
                  <p>Edward</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/3.png" alt="" class="equipo">
                  <p>Alphonse</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/4.png" alt="" class="equipo">
                  <p>Alex</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/5.png" alt="" class="equipo">
                  <p>Luis</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/6.png" alt="" class="equipo">
                  <p>Armstrong</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/7.png" alt="" class="equipo">
                  <p>Jack</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/1.png" alt="" class="equipo">
                  <p>Sparrow</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/2.png" alt="" class="equipo">
                  <p>Bill</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/3.png" alt="" class="equipo">
                  <p>Gates</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/4.png" alt="" class="equipo">
                  <p>Pepita</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/5.png" alt="" class="equipo">
                  <p>Pistolera</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/6.png" alt="" class="equipo">
                  <p>Rod</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/7.png" alt="" class="equipo">
                  <p>Flanders</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/1.png" alt="" class="equipo">
                  <p>Apu</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/2.png" alt="" class="equipo">
                  <p>Ble</p>
                </div>
              </div>
            </div>
            <button class="btn btn-primary leftLst"><</button>
            <button class="btn btn-primary rightLst">></button>
          </div>
      	</div>
        <div class="row">
          <h1>Direccion 3</h1>
      		<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/1.png" alt="" class="equipo">
                  <p>Ariel</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/2.png" alt="" class="equipo">
                  <p>Edward</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/3.png" alt="" class="equipo">
                  <p>Alphonse</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/4.png" alt="" class="equipo">
                  <p>Alex</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/5.png" alt="" class="equipo">
                  <p>Luis</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/6.png" alt="" class="equipo">
                  <p>Armstrong</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/7.png" alt="" class="equipo">
                  <p>Jack</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/1.png" alt="" class="equipo">
                  <p>Sparrow</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/2.png" alt="" class="equipo">
                  <p>Bill</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/3.png" alt="" class="equipo">
                  <p>Gates</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/4.png" alt="" class="equipo">
                  <p>Pepita</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/5.png" alt="" class="equipo">
                  <p>Pistolera</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/6.png" alt="" class="equipo">
                  <p>Rod</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/7.png" alt="" class="equipo">
                  <p>Flanders</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/1.png" alt="" class="equipo">
                  <p>Apu</p>
                </div>
              </div>
              <div class="item">
                <div class="pad15">
                  <img src="img/premio/2.png" alt="" class="equipo">
                  <p>Ble</p>
                </div>
              </div>
            </div>
            <button class="btn btn-primary leftLst"><</button>
            <button class="btn btn-primary rightLst">></button>
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
    <?php
      include 'olimpiadas/connect.php';
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
                      <img class="img-fluid d-block mx-auto" src="'.substr($row['imagen'],1).'" alt="">
                      <p>'.$row['descripcion'].'</p>
                      <div class="container">
                        <div class="row center">';
                        //Aca es para separar la parte de maraton, para diferenciar entre 5K y 3K
                          $stmt2 = $dbh->prepare("SELECT especialidad.nombre, especialidad.id_especialidad FROM especialidad INNER JOIN combinacion ON combinacion.id_especialidad = especialidad.id_especialidad WHERE combinacion.id_deporte = ".$row['id_deporte']." GROUP BY especialidad.nombre");
                          $stmt2->execute();
                          $table2 = $stmt2->fetchAll();
                          foreach ($table2 as $row2) {
                            if ($row['nombre'] == $row2['nombre']) {
                              echo '<div class="col-md-12">
                                <div class="row">';
                                //Separa entre los distintos sexos
                              $stmt3 = $dbh->prepare("SELECT sexo.nombre, sexo.id_sexo FROM sexo INNER JOIN combinacion ON combinacion.id_sexo = sexo.id_sexo WHERE combinacion.id_deporte = ".$row['id_deporte']." GROUP BY sexo.nombre ORDER BY sexo.id_sexo");
                              $stmt3->execute();
                              $table3 = $stmt3->fetchAll();
                              foreach ($table3 as $row3) {
                                if (count($table3) < 2) {
                                  echo '<div class="col-md-5"></div>
                                    <div class="col-md-2">
                                    <h4>'.$row3['nombre'].'</h4>
                                    <ul class="list-inline">';
                                    //Por ultimo se divide entre las edades de cada deporte
                                      $stmt4 = $dbh->prepare("SELECT categoria.nombre, categoria.id_edad FROM categoria INNER JOIN combinacion ON combinacion.id_edad = categoria.id_edad WHERE combinacion.id_deporte = ".$row['id_deporte']." GROUP BY categoria.nombre ORDER BY categoria.id_edad");
                                      $stmt4->execute();
                                      $table4 = $stmt4->fetchAll();
                                      foreach ($table4 as $row4) {
                                        //Intento de hacer el boton para ir al formulario de inscripcion a los deportes
                                        //en caso de tener una sola categoria (mixto) ajedrez,truco,loba
                                        ?> <li><a href="./olimpiadas/inscripcion.php?deporte=<?php echo $row['id_deporte'] ?>&sexo=<?php echo $row3['id_sexo'] ?>&especialidad=<?php echo $row2['id_especialidad'] ?>&categoria=<?php echo $row4['id_edad'] ?>">
                                          <button class="btn btn-danger btn-block" type="button"><i class="fa fa-pencil"></i> <?php echo $row4['nombre'] ?> </button></a></li><br> <?php
                                      }
                                  echo '</ul>
                                  </div>';
                                } else if(count($table3) < 3){
                                  //en caso de tener 2 categorias (fem-masc)
                                  echo '<div class="col-md-2"></div>
                                    <div class="col-md-3">
                                      <h4>'.$row3['nombre'].'</h4>
                                      <ul class="list-inline">';
                                        $stmt4 = $dbh->prepare("SELECT categoria.nombre, categoria.id_edad FROM categoria INNER JOIN combinacion ON combinacion.id_edad = categoria.id_edad WHERE combinacion.id_deporte = ".$row['id_deporte']." GROUP BY categoria.nombre ORDER BY categoria.id_edad");
                                        $stmt4->execute();
                                        $table4 = $stmt4->fetchAll();
                                        foreach ($table4 as $row4) {
                                          //en caso de tener dos categorias (hombre - mujer) futbol,volei,basquet
                                          ?> <li><a href="./olimpiadas/inscripcion.php?deporte=<?php echo $row['id_deporte'] ?>&sexo=<?php echo $row3['id_sexo'] ?>&especialidad=<?php echo $row2['id_especialidad'] ?>&categoria=<?php echo $row4['id_edad'] ?>">
                                            <button class="btn btn-danger btn-block" type="button"><i class="fa fa-pencil"></i> <?php echo $row4['nombre'] ?> </button></a></li><br> <?php
                                        }
                                      echo '</ul>
                                    </div>';
                                } else {
                                  //en caso de tener varias categorias (fem-masc-mix-doble)
                                  echo '<div class="col-md-4">
                                        <h4>'.$row3['nombre'].'</h4>
                                        <ul class="list-inline">';
                                          $stmt4 = $dbh->prepare("SELECT categoria.nombre, categoria.id_edad FROM categoria INNER JOIN combinacion ON combinacion.id_edad = categoria.id_edad WHERE combinacion.id_deporte = ".$row['id_deporte']." GROUP BY categoria.nombre ORDER BY categoria.id_edad");
                                          $stmt4->execute();
                                          $table4 = $stmt4->fetchAll();
                                          foreach ($table4 as $row4) {
                                            //en caso de tener mas categorias (hombre - mujer - mixto - dobles) tenis de mesa
                                            ?> <li><a href="./olimpiadas/inscripcion.php?deporte=<?php echo $row['id_deporte'] ?>&sexo=<?php echo $row3['id_sexo'] ?>&especialidad=<?php echo $row2['id_especialidad'] ?>&categoria=<?php echo $row4['id_edad'] ?>">
                                              <button class="btn btn-danger btn-block" type="button"><i class="fa fa-pencil"></i> <?php echo $row4['nombre'] ?> </button></a></li><br> <?php
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
                                $stmt3 = $dbh->prepare("SELECT sexo.nombre, sexo.id_sexo FROM sexo INNER JOIN combinacion ON combinacion.id_sexo = sexo.id_sexo WHERE combinacion.id_deporte = ".$row['id_deporte']." GROUP BY sexo.nombre ORDER BY sexo.id_sexo");
                                $stmt3->execute();
                                $table3 = $stmt3->fetchAll();
                                foreach ($table3 as $row3) {
                                  if (count($table3) < 3) {
                                    echo '<div class="col-md-6">
                                          <h4>'.$row3['nombre'].'</h4>
                                          <ul class="list-inline">';
                                            $stmt4 = $dbh->prepare("SELECT categoria.nombre, categoria.id_edad FROM categoria INNER JOIN combinacion ON combinacion.id_edad = categoria.id_edad WHERE combinacion.id_deporte = ".$row['id_deporte']." GROUP BY categoria.nombre ORDER BY categoria.id_edad");
                                            $stmt4->execute();
                                            $table4 = $stmt4->fetchAll();
                                            foreach ($table4 as $row4) {
                                              ?> <li><a href="./olimpiadas/inscripcion.php?deporte=<?php echo $row['id_deporte'] ?>&sexo=<?php echo $row3['id_sexo'] ?>&especialidad=<?php echo $row2['id_especialidad'] ?>&categoria=<?php echo $row4['id_edad'] ?>">
                                                <button class="btn btn-danger btn-block" type="button"><i class="fa fa-pencil"></i> <?php echo $row4['nombre'] ?> </button></a></li><br> <?php
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.js"></script>
    <script src="js/carousel.js"></script>

  </body>

</html>
