<?php 

    $servidor = 'localhost';
    $usuario = 'usuario_api';
    $password = 'Api.2025$';
    $base_datos = 'api_ferremax';

    $conexion = mysqli_connect($servidor,$usuario,$password,$base_datos);
    
    if (!$conexion)
        echo "NO CONECTADO";

?>