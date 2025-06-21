<?php
    
    header('Content-Type:application/json');
    
    require_once 'db/conexion.php';
    require_once 'controlador/funciones.php';
    
    $metodo = $_SERVER['REQUEST_METHOD'];

     switch($metodo){
        case 'GET':
        if (isset($_GET['codigo'])) {
            ver_herramienta(); 
        } else {
            ver_herramientas();
        }
            break;
        case 'POST':
            agregar_herramienta();
            break;
        case 'PUT':
            actualizar_herramienta();
            break;
        case 'PATCH':
            actualizar_campos_herramienta();
            break;
        case 'DELETE':
            eliminar_herramienta();
            break;
        
    }

?>
