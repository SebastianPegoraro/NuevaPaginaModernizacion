<!-- Olimpiadas Grid -->
<section id="olimpiadas" >
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase white-leter">Olimpíadas</h2>
        <h3 class="section-subheading white">Estas son las disciplinas en las que pueden inscribirse!</h3>
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
                                    ?> <li><a href="../olimpiadas/inscripcion.php?deporte=<?php echo $row['id_deporte'] ?>&sexo=<?php echo $row3['id_sexo'] ?>&especialidad=<?php echo $row2['id_especialidad'] ?>&categoria=<?php echo $row4['id_edad'] ?>&jugadores=<?php echo $row['jugadores'] ?>">
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
                                      ?> <li><a href="../olimpiadas/inscripcion.php?deporte=<?php echo $row['id_deporte'] ?>&sexo=<?php echo $row3['id_sexo'] ?>&especialidad=<?php echo $row2['id_especialidad'] ?>&categoria=<?php echo $row4['id_edad'] ?>&jugadores=<?php echo $row['jugadores'] ?>">
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
                                        ?> <li><a href="../olimpiadas/inscripcion.php?deporte=<?php echo $row['id_deporte'] ?>&sexo=<?php echo $row3['id_sexo'] ?>&especialidad=<?php echo $row2['id_especialidad'] ?>&categoria=<?php echo $row4['id_edad'] ?>&jugadores=<?php echo $row['jugadores'] ?>">
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
                                          ?> <li><a href="../olimpiadas/inscripcion.php?deporte=<?php echo $row['id_deporte'] ?>&sexo=<?php echo $row3['id_sexo'] ?>&especialidad=<?php echo $row2['id_especialidad'] ?>&categoria=<?php echo $row4['id_edad'] ?>&jugadores=<?php echo $row['jugadores'] ?>">
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
                  </div>';?>
                  <div class="container">
                    <div class="row">
                      <div class="col-md-6 offset-md-3">
                        <a href="../olimpiadas/listado.php?id_deporte=<?php echo $row['id_deporte'] ?>">
                          <button class="btn btn-warning btn-block" type="button"><i class="fa fa-pencil"></i> Ver participantes hasta el momento </button></a>
                      </div>
                    </div>
                  </div>
                  <?php echo '<button class="btn btn-primary" data-dismiss="modal" type="button">
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
