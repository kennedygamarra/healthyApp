<?php

include "conexion.php";


$nombre= $_POST["nombre"];
$contraseña= $_POST["contraseña"];
$peso= $_POST["peso"];
$altura= $_POST["altura"];
$genero= $_POST["genero"];
$alergia= $_POST["alergia"];

$insertar = "INSERT INTO usuario(nombre,contraseña, peso, altura,alergia, genero) VALUES ('$nombre',
'$contraseña','$peso','$altura','$alergia','$genero')";



