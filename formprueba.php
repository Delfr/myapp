<?php

include("connect.php");

if (!empty($usuario) || !empty($password)|| !empty($email)|| !empty($curso))
{
  $usuario = trim($_POST['usuario']);
  $password = trim($_POST['password']);
  $email = FILTER_VALIDATE_EMAIL( $_POST['email']);
  $curso = $_POST['curso'];

  $data = "INSERT INTO usuario(usuario, password, email, curso) VALUES ('$usuario','$password','$email','$curso')";
  $data_entry = mysqli_query($conn, $data);
    if($data_entry){
    echo "Datos registrados";

    }else {
    echo "Error, datos no registrados";
    }
}else {
  echo "Por favor complete todos los campos";
};
?>
