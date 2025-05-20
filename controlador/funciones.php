<?php 

    function ver_herramientas(){ // esto es para todo las herramientas
        
        global $conexion;
        $sql = 'SELECT * FROM herramientas';
        $resultado = mysqli_query($conexion,$sql);

        $filas = [];

        while ($fila = mysqli_fetch_assoc($resultado)){
            $filas[] = $fila;
        
        }

        echo json_encode (['Info' => 'ok','DATOS' => $filas]);

    }
    
    //---------------------------------------------------------------------------------------------------------------------------------
    
    function ver_herramienta() { // esto es para una sola herramienta

        global $conexion;

        $codigo = intval($_GET['codigo']);  //metodo para solicitar el id mediante url = GET
        $sql = 'SELECT * FROM herramientas WHERE codigo = ?'; // consulta SQL con parametro WHERE agregado
        $prepare = mysqli_prepare($conexion, $sql); // transforma la consulta y la envia a la base de datos PhpmyAdmin

        mysqli_stmt_bind_param($prepare, 'i', $codigo);  //($prepare= sentencia preparada, i [integer] = tipo de dato, $id_empleado = la variable de arriba que sera utilizada para la consulta )
        mysqli_stmt_execute($prepare);
        $resultado = mysqli_stmt_get_result($prepare); // trae el resultado de la consulta.

        $filas = [];

        while ($fila = mysqli_fetch_assoc($resultado)) {
            $filas[] = $fila;
        }

        echo json_encode(['Info' => 'ok', 'DATOS' => $filas]);
    }

    //---------------------------------------------------------------------------------------------------------------------------------

    function agregar_herramienta(){  // el insert de toda la vida, vieja confiable
        
        global $conexion;
        
        $info = json_decode(file_get_contents('php://input'),true);
    
        $codigo         = $info['codigo'] ?? '';
        $marca          = $info['marca'] ?? '';
        $codigo_herra   = $info['codigo_herra'] ?? '';
        $nombre         = $info['nombre'] ?? '';
        $valor          = $info['valor']?? '';

        $sql = "INSERT INTO herramientas VALUES ('$codigo','$marca','$codigo_herra','$nombre',NOW(),'$valor')";
        $resultado = mysqli_query($conexion,$sql);
        
        if($resultado)
            echo json_encode(['Info' => 'ok', 'Mensaje' => 'herramienta agregado']);
        else
            echo json_encode(['Info' => 'Error', 'Mensaje' => 'herramienta NO agregado']);
        
    }

    //---------------------------------------------------------------------------------------------------------------------------------

    function actualizar_herramienta(){ // actualizar todo una herramienta
        
        global $conexion;

        $info = json_decode(file_get_contents('php://input'),true);    
            
        $codigo         = $info['codigo'] ?? '';
        $marca          = $info['marca'] ?? '';
        $codigo_herra   = $info['codigo_herra'] ?? '';
        $nombre         = $info['nombre'] ?? '';
        $valor          = $info['valor']?? '';

        $sql = "UPDATE herramientas SET codigo = '$codigo', marca = '$marca', codigo_herra ='$codigo_herra', nombre ='$nombre', fecha = now(), valor ='$valor' WHERE codigo = $codigo";
        $resultado = mysqli_query($conexion,$sql);
        if($resultado)
            echo json_encode(['Info' => 'ok', 'Mensaje' => 'herramienta actualizado']);
        else
            echo json_encode(['Info' => 'Error', 'Mensaje' => 'herramienta NO actualizado']);
    }

    //---------------------------------------------------------------------------------------------------------------------------------

    function eliminar_herramienta(){ 
            
            global $conexion;

            $info = json_decode(file_get_contents('php://input'),true);    
            
            $codigo    = $info['codigo'] ?? '';

            $sql = "DELETE FROM herramientas WHERE codigo = $codigo";
            $resultado = mysqli_query($conexion,$sql);

            if($resultado)
                echo json_encode(['Info' => 'ok', 'Mensaje' => 'herramienta Borrado']);
            else
                echo json_encode(['Info' => 'Error', 'Mensaje' => 'herramienta NO borrado']);
    }

    //---------------------------------------------------------------------------------------------------------------------------------

    function actualizar_campos_herramienta(){ // funciona pero hay que optimizar 
        
        global $conexion;

        $info = json_decode(file_get_contents('php://input'),true);  
            
        $codigo         = $info['codigo'] ?? '';

        $marca          = $info['marca'] ?? '';
        $codigo_herra   = $info['codigo_herra'] ?? '';
        $nombre         = $info['nombre'] ?? '';
        $valor          = $info['valor']?? '';

        if(isset($info['marca'])){
            $sql = "UPDATE herramientas SET marca = '$marca', fecha= NOW() WHERE codigo = $codigo";
            $resultado = mysqli_query($conexion,$sql);
            if($resultado)
                echo json_encode(['Info' => 'ok', 'Mensaje' => 'marca herramienta id: ' .$codigo. ' modificado']);
            else
                echo json_encode(['Info' => 'Error', 'Mensaje' => 'marca herramienta id:' .$codigo. 'NO modificado']);
        }
        if(isset($info['codigo_herra'])){
            $sql = "UPDATE herramientas SET codigo_herra = '$codigo_herra', fecha= NOW() WHERE codigo = $codigo";
            $resultado = mysqli_query($conexion,$sql);
            if($resultado)
                echo json_encode(['Info' => 'ok', 'Mensaje' => 'codigo_herramienta id: ' .$codigo. ' modificado']);
            else
                echo json_encode(['Info' => 'Error', 'Mensaje' => 'codigo_herramienta id: ' .$codigo. ' NO modificado']);
        }
        if(isset($info['nombre'])){
            $sql = "UPDATE herramientas SET nombre = '$nombre', fecha= NOW() WHERE codigo = $codigo";
            $resultado = mysqli_query($conexion,$sql);
            if($resultado)
                echo json_encode(['Info' => 'ok', 'Mensaje' => 'nombre herramienta id: ' .$codigo. ' modificado']);
            else
                echo json_encode(['Info' => 'Error', 'Mensaje' => 'nombre herramienta id: ' .$codigo. ' NO modificado']);
        }
        if(isset($info['valor'])){
            $sql = "UPDATE herramientas SET valor = '$valor', fecha= NOW() WHERE codigo = $codigo";
            $resultado = mysqli_query($conexion,$sql);
            if($resultado)
                echo json_encode(['Info' => 'ok', 'Mensaje' => 'valor herramienta id: ' .$codigo. ' modificado']);
            else
                echo json_encode(['Info' => 'Error', 'Mensaje' => 'valor herramienta id: ' .$codigo. ' NO modificado']);
        }

    }



?>