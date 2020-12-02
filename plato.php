<?php
session_start();

if (!isset($_GET["id"])) {
    exit();
}
$id = $_GET["id"];
$nomusu  = $_SESSION['usuario'];

include "conexion.php";

$consultar = "SELECT * FROM plato WHERE idplato = $id";
$resultado = mysqli_query($conexion, $consultar);
$row = mysqli_fetch_assoc($resultado);

$consultarConteo = "SELECT COUNT(idcomentario) as conteo FROM comentario WHERE idplato = '$id'";
$resultadoComentario = mysqli_query($conexion, $consultarConteo);
$rowConteo = mysqli_fetch_assoc($resultadoComentario);
$conteo = $rowConteo['conteo'];

$consultarComentario = "SELECT * FROM comentario WHERE idplato = '$id'";
$resultadoComentario = mysqli_query($conexion, $consultarComentario);
$rowComentario = mysqli_fetch_assoc($resultadoComentario);
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
    <form method="post">
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
        <div class="background">
            <?php echo '<img class="background" src="img/' . $row["link"] . '" alt="">' ?>
            <div class="row row-background">
                <br>
                <div class="col-md-6 col-center plato">
                    <br>
                    <?php echo '<h1 class"inverse">' . $row["nombre"] . '</h1>
                        <h2 class="sub-inverse">' . $row["descripcion"] . '</h1>
                            <h1 class="inverse">' . $row["tipo"] . '</h1>
                            <h1 class="inverse">' . $row["vitaminas"] . '</h1>
                            ' ?>

                    <h2 class= "sub-inverse" for="w3review">Danos tu opinion:</h1>
                    <textarea class="form-control" id="w3review" name="w3review" rows="4" cols="50" placeholder="Escriba aqui su comentario..."></textarea>
                    <br>
                    <input class="btn boton" type="submit" value="Comentar">
                    <br><br>

                    <?php

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        $comentaioTexto = $_POST["w3review"];
                        if ($comentaioTexto != null) {

                            $consultarUsuario = "SELECT * FROM usuario WHERE nombre = '$nomusu'";
                            $resultadoUsuario = mysqli_query($conexion, $consultarUsuario);
                            $rowUsuario = mysqli_fetch_assoc($resultadoUsuario);
                            $usuid = $rowUsuario['usuario_id'];


                            $insertar = "INSERT INTO comentario(descripcion, idplato, usuario_id) VALUES ('$comentaioTexto',
                    '$id','$usuid')";
                            $resultado = mysqli_query($conexion, $insertar);
                        } else {
                            echo '<br>Por favor no olvide ingresar un comentario<br>';
                        }
                    }
                    if ($conteo != 0) {
                        $aumento = 0;
                        while ($conteo > 1) {
                            $rowComentario = mysqli_fetch_assoc($resultadoComentario);
                            $uid = $rowComentario['usuario_id'];
                            $consultarnombre = "SELECT nombre FROM usuario WHERE usuario_id = '$uid'";
                            $resultadonombre = mysqli_query($conexion, $consultarnombre);
                            $rownombre = mysqli_fetch_assoc($resultadonombre);
                            echo '<div class="panel panel-default">
                        <div class="panel-heading">' . $rownombre['nombre'] .' dice...</div>
                        <div class="panel-body">' . $rowComentario['descripcion'] . '</div>
                        </div>
                        <br>';
                            $conteo--;
                        }
                    } else {
                        echo '<h2 class="sub-inverse">No hay comentarios disponibles, sé el primero en comentar</h2>';
                    }
                    ?>

                </div>
            </div>
        </div>





    </form>

</body>