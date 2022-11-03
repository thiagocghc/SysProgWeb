<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$bd = 'crudcompleto';
$con = new mysqli($hostname, $username, $password, $bd);

if (!$con) {
  die(mysqli_error($con));
} else {
  // echo 'Conectado mesmo com sucesso!!';
}
