<?php

Class Usuario{
    public $nombreUsuario, $password, $peso, $altura, $alergia, $genero;

    public function __construct($nombreUsuario, $password, $peso, $altura, $alergia, $genero){
        $this->nombreUsuario = $nombreUsuario;
        $this->password = $password;
        $this->peso = $peso;
        $this->altura = $altura;
        $this->alergia = $alergia;
        $this->genero = $genero;
    }
} 

?>