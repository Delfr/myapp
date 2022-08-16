<?php

require("connect.php");


if(!isset($_POST['nombre'])||!isset($_POST['password'])||!isset($_POST['email'])||!isset($_POST['curso'])){
  echo "Por favor complete todos los campos";
  die();

} else {

  $nombre = mysqli_real_escape_string($conectar_db, $_POST['nombre']);
  $password = mysqli_real_escape_string($conectar_db,$_POST['password']);
  $email = validar_email($_POST['email']);
  $curso = mysqli_real_escape_string($conectar_db,$_POST['curso']);

  echo "Gracias $nombre, te enviaremos un email a $email";



 function ingresar_usuario($conectar_db, $nombre, $password, $email, $curso){
  $sql_insert= "INSERT INTO tpractica(nombre, password, email, curso) VALUES ('$nombre', '$password' '$email', '$curso')";
  $data_entry = mysqli_query($conectar_db, $sql_insert);
  return $data_entry;

  if($data_entry){
    echo "Los datos fueron registrados";
    } else {
      die(mysqli_connect_errno());
      echo "Los datos no fueron registrados";
    }
  }
}

function validar_email(string $email){
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

ingresar_usuario($conectar_db, $nombre, $password, $email, $curso);
mysqli_close($conectar_db);
