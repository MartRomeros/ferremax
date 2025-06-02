<?php 
    $servidor = 'localhost';
    $usuario = 'cen74533_bduser_bomberos';
    $password = 'ASY5131.2025';
    $base_datos = 'cen74533_bomberos';

    $conexion = mysqli_connect($servidor,$usuario,$password,$base_datos);
    
    if (!$conexion)
        echo "NO CONECTADO";
?>