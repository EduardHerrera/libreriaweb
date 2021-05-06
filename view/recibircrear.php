<?php
$name=$_POST['name'];
$publication=$_POST['publication'];
$section=$_POST['section'];

require_once '../services/connection.php';


$sql="INSERT INTO `books`(`id`,`name`,`publication`,`section`) VALUES (NULL,'$name','$publication','$section')";
mysqli_query($conexion,$sql);
header("Location:admin.bookshop.php"); 
