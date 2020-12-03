<?php
session_start();

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
                                <input class="input-buscar"type="text" placeholder="Buscar.." name="buscar">
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
        <h1 class="titulo">Health Via</h1>
        <h1 class="sub-blanco">Bienvenido: <?php echo $_SESSION['usuario']; ?></h1>
            <div class="col-md-5">
            </div>
            <div class="col-md-2">   
            </div>
        </div>
        <?php

        include "conexion.php";
        $usuario = $_SESSION["usuario"];
        $consultar = "SELECT * FROM usuario WHERE nombre = '$usuario'";
        $resultado = mysqli_query($conexion, $consultar);
        $obj = mysqli_fetch_object($resultado); 
        $imc = round((($obj->peso)/($obj->altura * $obj->altura)*10000),1);
        if($imc <= 18.5){
            $consultaImc = "SELECT nombre, tipo, link , idplato FROM plato WHERE levenshtein('Alto en proteina', tipo) BETWEEN 0 AND 5";
        }if($imc >= 18.5 && $imc <= 24.9){
            $consultaImc = "SELECT nombre, tipo, link , idplato FROM plato";
        }if($imc >= 25 && $imc <= 29.9){
            $consultar = "SELECT nombre, tipo, link , idplato FROM plato WHERE kalorias <= 700";
        }if($imc >= 30){
            $consultaImc = "SELECT nombre, tipo, link , idplato FROM plato WHERE kalorias <= 600";
        }




        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $buscar = $_POST["buscar"];
            if ($buscar != null) {
                $consultar = "SELECT * FROM plato WHERE levenshtein('$buscar', nombre) BETWEEN 0 AND 5";
                $resultado = mysqli_query($conexion, $consultar);
                $repeticiones = mysqli_num_rows($resultado);

                        for ($i = 0; $i < ($repeticiones / 3); $i++) {
                            echo '<div class="container">
                            <div class="row">';
                            while($repeticiones>0){
                                $repeticiones--;
                                $row = mysqli_fetch_assoc($resultado);
                                echo '<div class="col-md-4">
                                <div class="carousel-inner">
                                    <div class="item active">
                                    <a href="plato.php?id='.$row["idplato"].'">
                                    <img class="image" src="img/' . $row["link"] . '">
                                    </a> 
                                    <div class="carousel-caption">
                                            <h3 class="objeto">' . $row["nombre"] . '</h3>
                                            <p class="objeto"> ' . $row["tipo"] . '</p>
                                        </div>   
                                    </div>
                            </div> 
                        </div>';
                            }
                            echo '</div> </div> <br><br>';
                        }
            }
        }else{
    
        $resultado = mysqli_query($conexion, $consultaImc);
        $repeticiones = mysqli_num_rows($resultado);

        for ($i = 0; $i < ($repeticiones / 3); $i++) {
            echo '<div class="container">
        <div class="row">';
            while($repeticiones>0){
                $repeticiones--;
                $row = mysqli_fetch_assoc($resultado);
                echo '<div class="col-md-4">
                        <div class="carousel-inner">
                            <div class="item active">
                            <a href="plato.php?id='.$row["idplato"].'">
                            <img class="image" src="img/' . $row["link"] . '">
                            </a> 
                            <div class="carousel-caption">
                                    <h3 class="objeto">' . $row["nombre"] . '</h3>
                                    <p class="objeto"> ' . $row["tipo"] . '</p>
                                </div>   
                            </div>
                    </div> 
                </div>';
            }
            echo '</div> </div> <br><br>';
        }
        }
        ?>
    </form>

</body>