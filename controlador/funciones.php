<?php 

    function ver_herramientas(){ // esto es para todo las herramientas
        
        global $conexion;
        $sql = 'SELECT * FROM tbl_benjamin_nunez';
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
        $sql = 'SELECT * FROM tbl_benjamin_nunez WHERE codigo = ?'; // consulta SQL con parametro WHERE agregado
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
        $imagen         = $info['imagen']?? '';

        $sql = "INSERT INTO tbl_benjamin_nunez VALUES ('$codigo','$marca','$codigo_herra','$nombre',NOW(),'$valor','$imagen')";
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
        $imagen         = $info['imagen']?? '';

        $sql = "UPDATE tbl_benjamin_nunez SET codigo = '$codigo', marca = '$marca', codigo_herra ='$codigo_herra', nombre ='$nombre', fecha = now(), valor ='$valor', imagen = '$imagen' WHERE codigo = $codigo";
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

            $sql = "DELETE FROM tbl_benjamin_nunez WHERE codigo = $codigo";
            $resultado = mysqli_query($conexion,$sql);

            if($resultado)
                echo json_encode(['Info' => 'ok', 'Mensaje' => 'herramienta Borrado']);
            else
                echo json_encode(['Info' => 'Error', 'Mensaje' => 'herramienta NO borrado']);
    }

    //---------------------------------------------------------------------------------------------------------------------------------

    function actualizar_campos_herramienta() {
        global $conexion;
    
        $info = json_decode(file_get_contents('php://input'), true);
        $codigo = $info['codigo'] ?? '';
    
        if (!$codigo) {
            echo json_encode(['Error' => true, 'Mensaje' => 'Código no proporcionado']);
            return;
        }
    
        $campos = [];
        if (isset($info['marca']))         $campos[] = "marca = '" . mysqli_real_escape_string($conexion, $info['marca']) . "'";
        if (isset($info['codigo_herra']))  $campos[] = "codigo_herra = '" . mysqli_real_escape_string($conexion, $info['codigo_herra']) . "'";
        if (isset($info['nombre']))        $campos[] = "nombre = '" . mysqli_real_escape_string($conexion, $info['nombre']) . "'";
        if (isset($info['valor']))         $campos[] = "valor = '" . mysqli_real_escape_string($conexion, $info['valor']) . "'";
        if (isset($info['imagen']))        $campos[] = "imagen = '" . mysqli_real_escape_string($conexion, $info['imagen']) . "'";
    
        if (empty($campos)) {
            echo json_encode(['Error' => true, 'Mensaje' => 'No hay campos para actualizar']);
            return;
        }
    
        $campos[] = "fecha = NOW()"; // actualiza la fecha siempre
        $sql = "UPDATE tbl_benjamin_nunez SET " . implode(', ', $campos) . " WHERE codigo = " . intval($codigo);
    
        $resultado = mysqli_query($conexion, $sql);
    
        if ($resultado) {
            echo json_encode(['Info' => 'ok', 'Mensaje' => 'Herramienta ID ' . $codigo . ' modificada con éxito']);
        } else {
            echo json_encode(['Error' => true, 'Mensaje' => 'Error al modificar herramienta ID ' . $codigo, 'ErrorSQL' => mysqli_error($conexion)]);
        }
    }


?>