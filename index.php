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
    <form method="post" action="registrar.php">
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
            <div class="col-sm-2">
            </div>
            <div class="col-sm-2">
            <h1 class="display-1">Health Via</h1>
                <div class="form-group">
                    <br>
                    <label for="Usuario">Usuario:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Ingresa tu usuario">
                </div>
                <div class="form-group">
                    <label for="Contraseña">Contraseña:</label>
                    <input type="password" class="form-control" name="contraseña" placeholder="Ingresa tu contraseña">
                </div>
                <div class="form-group">
                    <label for="Peso">Peso:</label>
                    <input type="text" class="form-control" name="peso" placeholder="Ingresa tu altura en kg">
                </div>
                <div class="form-group">
                    <label for="Altura">Altura:</label>
                    <input type="text" class="form-control" name="altura" placeholder="Ingresa tu altura en cm">
                </div>
                <div class="form-group">
                    <label for="Genero">Genero:</label>
                    <select class="form-control" name="genero" id="Personas">
                        <option>Masculino</option>
                        <option>Femenino</option>
                        <option>Otro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Alergia">Alergia:</label>
                    <select class="form-control" name="alergia" id="Personas">
                        <option>Alergia al mani</option>
                        <option>Otra</option>
                        <option>Ninguna</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" name="registrar" class="btn">Registrar</button>
                </div>
                <div class="form-group">
                    <button type="submit" name="login" class="btn">Ya tengo una cuenta</button>
                </div>
            </div>
        </div>
    </form>

</body>

