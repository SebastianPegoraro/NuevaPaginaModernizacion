<?php
global $dbh;

try {
  //mysql:host=HOST;dbname=NOMBRE_DB', 'USUARIO', 'PASSWORD'
  $dbh = new PDO('mysql:host=localhost;dbname=olimpiadas', 'root', 'admin123');
} catch(Exception $e) {
  exit("Error conectando al Servidor");
}
?>
