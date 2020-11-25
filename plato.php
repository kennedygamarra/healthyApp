<?php
session_start();
if(!isset($_GET["id"])){
    exit();
}
$id = $_GET["id"];
include "conexion.php";
$consultar = "SELECT * FROM plato WHERE idplato = $id";
$resultado = mysqli_query($conexion, $consultar);
$row = mysqli_fetch_assoc($resultado);

?>


<!DOCTYPE html>
<html lang="es">

<head>

    <title>PIA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./style.css">

</head>

<body>
    <form method="post" action="recomendacion.php">
        <nav class="navbar footer">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Health Via</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li>

                        <div class="search-container">
                            <input type="text" placeholder="Buscar.." name="buscar">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </li>
                    <li><a href="recomendacion.php">Inicio</a></li>
                    <li><a href="cerrarSesion.php">Cerrar Sesion</a></li>
                </ul>
            </div>
        </nav>
        <br><br>
        <div class="row">
            <div class="col-md-12">
            <?php
                echo $row["nombre"];

            ?>
        
        
        </div>

        </div>
    </form>

</body>