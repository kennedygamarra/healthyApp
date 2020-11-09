<!DOCTYPE html>
<html lang="es">

<head>

    <title>PIA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./style.css">

</head>

<body>
    <form method="post" action="login.php">
        <nav class="navbar footer">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Health Via</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Contactanos</a></li>
                </ul>
            </div>
        </nav>
        <br><br>
        <div class="row">
            <div class="col-md-5">
            </div>
            <div class="col-md-2">
                <h1 class="display-1">Health Via</h1>
                <br>
                <h1 class="display-1">Login</h1>
                <div class="form-group">
                    <br>
                    <label for="Usuario">Usuario:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Ingresa tu usuario">
                </div>
                <div class="form-group">
                    <label for="Contraseña">Contraseña:</label>
                    <input type="password" class="form-control" name="contraseña" placeholder="Ingresa tu contraseña">
                </div>
                <span><a href="registrar.php">No tengo una cuenta</a></span>
                <br>
                <div class="form-group">
                    <button type="submit" name="login" onclick="accion();" class="btn">Aceptar</button>
                </div>
                <?php
                include "conexion.php";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $nombre = $_POST["nombre"];
                    $contraseña = $_POST["contraseña"];

                    if ($nombre == null or $contraseña == null) {

                        echo "Por favor llene todos los campos";
                    } else {

                        $consultar = "SELECT contraseña FROM usuario WHERE nombre = '$nombre'";

                        $resultado = mysqli_query($conexion, $consultar);
                        $row = mysqli_fetch_array($resultado);
                        $pw = $row['contraseña'];

                        if (password_verify($contraseña, $pw)) {
                            echo "USUARIO EXISTE";
                            header('Location: index.php');
                            //ya que el usuario existe que lo envie a donde deba.

                        } else {

                            echo '<div class="alert alert-danger">
    <strong>Error al iniciar sesion</strong>
    </div>'; //Fail
                        }
                    }
                }
                ?>
            </div>
        </div>
    </form>

</body>