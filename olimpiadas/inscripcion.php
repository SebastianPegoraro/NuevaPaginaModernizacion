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
  </head>
  <body>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form action="" method="post" id="fileForm" role="form">
              <fieldset><legend class="text-center">Valid information is required to register. <span class="req"><small> required *</small></span></legend>

                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="phonenumber"><span class="req">* </span> Jurisdicción: </label>
                    <input required type="text" name="jurisdiccion" class="form-control" maxlength="28" onkeyup="validatephone(this);"/>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="firstname"><span class="req">* </span> Nombre Equipo: </label>
                    <input class="form-control" type="text" name="nomequipo" onkeyup="Validate(this)" required/>
                  </div>
                </div>

                <?php
                  include('connect.php');

                  //$stmt = $dbh->prepare("SELECT  FROM deporte");
                  //$stmt->execute();
            		  //$table = $stmt->fetchAll();
                ?>
                <div class="row">
                  <div class="form-group col-md-2">
                    <label for="oficina"><span class="req">* </span> D.N.I.: </label>
                    <input class="form-control" type="text" name="dni" value="">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="firstname"><span class="req">* </span> Nombre: </label>
                    <input class="form-control" type="text" name="nombre" required />
                  </div>
                  <div class="form-group col-md-3">
                    <label for="firstname"><span class="req">* </span> Apellido: </label>
                    <input class="form-control" type="text" name="apellido" required />
                  </div>
                  <div class="form-group col-md-4">
                    <label for="firstname"><span class="req">* </span> Nacimiento: </label>
                    <input class="form-control" type="text" name="apellido" required />
                  </div>
                </div>

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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


    <script src="../js/inscripcion.js"></script>
  </body>
</html>
