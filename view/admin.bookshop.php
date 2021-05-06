<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles copy.css">
    <title>admin</title>
</head>

<body>


<?php
include '../services/connection.php';
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.html');
}
?>

<div class="row">
    <div class="column">
        <h1>Hola <?php echo $_SESSION['email'];?></h1>
    </div>
    <div class="column">
        <h2><a href="../process/logout.php">Log Out</a></h2>
    </div>
</div>
<div class="row">
<div class="twocolumn">
<a href="añadir.php"><button type="button">Añadir libro</button></a>
</div>
<div class="twocolumn">
    <form action="admin.bookshop.php" method="post">
        <input type="text" placeholder="Buscar por titulo..." name="titulo">
        <input type="submit" value="Filtrar" name="filtro">
    </form>
</div>
</div>




<div class="tabla">
    <table>
        <tr>
            <th>Título</th>
            <th>Publicación</th>
            <th>Sección</th>
        </tr>
        <?php
        if (isset($_REQUEST['filtro'])) {
            $titulo=$_REQUEST['titulo'];
            $libros = mysqli_query($conexion,"SELECT books.name as name, books.publication as publication, sections.name as section FROM books INNER JOIN sections on books.section=sections.id where books.name like '%$titulo%'");
        } else {
            $libros = mysqli_query($conexion,"SELECT books.name as name, books.publication as publication, sections.name as section FROM books INNER JOIN sections on books.section=sections.id");
        }
        foreach ($libros as $libro) {
            echo "<tr>";
            echo "<td>{$libro['name']}</td>";
            echo "<td>{$libro['publication']}</td>";
            echo "<td>{$libro['section']}</td>";
            echo "</tr>";
        }

        ?>
        </table>

</div>


</body>

</html>