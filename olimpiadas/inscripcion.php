<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inscripcion</title>
    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="../css/inscripcion.css" rel="stylesheet" type="text/css">
	  <!-- JQueryUI para elegir fecha -->
    <link rel="stylesheet" href="../vendor/jquery-ui/jquery-ui.css">
  </head>
  <body>
    <?php
      $deporte = $_REQUEST['deporte'];
      $sexo = $_REQUEST['sexo'];
      $especialidad = $_REQUEST['especialidad'];
      $categoria = $_REQUEST['categoria'];
      $jugadores = $_REQUEST['jugadores'];

      include 'connect.php';
      $stmt = $dbh->prepare("SELECT id_combinacion FROM combinacion WHERE id_deporte=".$deporte." AND id_sexo=".$sexo." AND id_edad=".$categoria." AND id_especialidad=".$especialidad);
      $stmt->execute();
      $table = $stmt->fetchAll();
      $combinacion = $table[0][0];
    ?>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form action="guarda.php" method="post" id="fileForm" role="form">
              <fieldset><legend class="text-center"><h1>Valid information is required to register. <span class="req"><small> required *</small></span></h1></legend>

                <div class="row">
                  <div class="form-group col-xs-12 col-md-6">
                    <label for="jurisdiccion"><span class="req">* </span> Jurisdicción: </label>
                    <select class="form-control" id="jurisdiccion" name="jurisdiccion" required>
                      <option selected disabled>Seleccione una Jurisdiccion</option>
                    </select>
                  </div>
                  <div class="form-group col-xs-12 col-md-6">
                    <?php
                    //Condicion para que este disponible el nombre del equipo (solo futbol, basquet, volei)
                      if ($deporte == 2 || $deporte == 4 || $deporte == 5) {
                        ?>
                        <label for="nomequipo"><span class="req">* </span> Nombre Equipo: </label>
                        <input class="form-control" type="text" name="nomequipo" required/>
                        <?php
                      }
                    ?>
                  </div>
                </div>

                <?php
                  if ($deporte == 3 && $sexo == 1 || $deporte == 3 && $sexo == 2 || $deporte == 3 && $sexo == 3) {
                    $jugadores = 1;
                  }
                  for ($i=0; $i < $jugadores ; $i++) {
                    ?>
					<!-- a cada elemento se le pone un valor (arbitrario) "data-orden" indicando el indice correspondiente
					ademas, cada uno tiene su propio id en la forma "nombrecontrol"+"indice"
					ademas, cada uno tiene una clase que refleja quien es -->
                    <div class="row">
                      <div class="form-group col-md-2">
                        <label for="dni"><span class="req">* </span> D.N.I.: </label>
                        <input class="form-control dni" type="text" data-orden="<?php echo $i ?>"  id="dni<?php echo $i ?>" name="dni<?php echo $i ?>" required />
                      </div>
                      <div class="form-group col-md-3">
                        <label for="nombre"><span class="req">* </span> Nombre: </label>
                        <input class="form-control nombre" type="text" data-orden="<?php echo $i ?>" id="nombre<?php echo $i ?>" name="nombre<?php echo $i ?>" required />
                      </div>
                      <div class="form-group col-md-3">
                        <label for="apellido"><span class="req">* </span> Apellido: </label>
                        <input class="form-control apellido" type="text" data-orden="<?php echo $i ?>" id="apellido<?php echo $i ?>" name="apellido<?php echo $i ?>" required />
                      </div>
                      <div class="form-group col-md-2">
                        <label for="nacimiento"><span class="req">* </span> Nacimiento: </label>
                        <input class="form-control nacimiento" type="text" data-orden="<?php echo $i ?>" id="nacimiento<?php echo $i ?>" name="nacimiento<?php echo $i ?>" required />
                      </div>
                      <div class="form-group col-md-1 text-center">
                        <label for="adscripto">Adscripto:</label>
                        <input type="checkbox" class="form-check-input" data-orden="<?php echo $i ?>" name="adscripto<?php echo $i ?>" id="adscripto<?php echo $i ?>">
                      </div>
                      <div class="form-check col-md-1 text-center">
                        <label for="pasbec">Pas/Bec:</label>
                        <input type="checkbox" class="form-check-input" data-orden="<?php echo $i ?>" name="pasbec<?php echo $i ?>" id="pasbec<?php echo $i ?>">
                      </div>
                    </div>
                    <?php
                  }
                ?>
                <input type="hidden" name="jugadores" value="<?php echo $jugadores ?>">
                <input type="hidden" name="combinacion" value="<?php echo $combinacion ?>">
                <input type="hidden" name="deporte" value="<?php echo $deporte ?>">
                <div class="form-group">
                    <input class="btn btn-success" type="submit" name="submit_reg" value="Register">
                </div>

              </fieldset>
            </form><!-- ends register form -->
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Ajax para la lista de Jurisdicciones -->
    <script src="../js/ajax.js"></script>

    <script src="../js/inscripcion.js"></script>
	  <!-- JQueryUI para elegir fecha -->
	  <script src="../vendor/jquery-ui/jquery-ui.js"></script>
	  <script src="../js/locales.js"></script>
    <script>
      $( function() {
        $( ".nacimiento" ).datepicker({
          dateFormat: 'dd-mm-yy',
          firstDay: 7,
          changeMonth: true,
          changeYear: true,
          yearRange: "-100:-17" });
      } );
    </script>
  </body>
</html>
