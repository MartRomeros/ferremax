<?php 
    $servidor = 'hopper.proxy.rlwy.net';
    $usuario = 'root';
    $password = 'FlsbTDudlzbnfVqEJxPUNDuuajHfdBJk';
    $base_datos = 'railway';
    $puerto = 39733;

    $conexion = mysqli_connect($servidor,$usuario,$password,$base_datos,$puerto);
    
    if (!$conexion)
        echo "NO CONECTADO";
?>