<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['registrar'])) {

        $nombre = $_POST["nombre"];
        $contraseña = $_POST["contraseña"];
        $peso = $_POST["peso"];
        $altura = $_POST["altura"];
        $genero = $_POST["genero"];
        $alergia = $_POST["alergia"];

        $insertar = "INSERT INTO usuario(nombre, contraseña, peso, altura, alergia, genero) VALUES ('$nombre',
'$contraseña','$peso','$altura','$alergia','$genero')";

        $resultado = mysqli_query($conexion, $insertar);
        if (!$resultado) {
            echo "error al registrar";
        } else {

            echo "Registro exitoso";
        }
        mysqli_close($conexion);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
    
    
    }
}