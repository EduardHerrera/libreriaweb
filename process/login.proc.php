<?php
//inicio la conexión escrita en recibir.php
include '../services/connection.php';

$email=$_REQUEST['email'];
$pass=$_REQUEST['password'];
echo $email;
echo $pass;

$user=mysqli_real_escape_string($conexion,$email);

//Realizo una consulta buscando un usuario con los datos untroducidos por el usuario
$usuarioBD = mysqli_query($conexion,"SELECT * FROM users WHERE email='$email' and password=MD5('{$pass}')");

if (mysqli_num_rows($usuarioBD) == 1) {
    session_start();
    $_SESSION['email']=$email;
    header("location: ../view/admin.bookshop.php");
} else {
    //echo "Usuario o contraseña erroneos.";
    header("location: ../index.php");
}

mysqli_free_result($usuarioBD);