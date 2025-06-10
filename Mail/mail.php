<?php
    $nombre   = $_GET['nombre'];
    $correo = $_GET['correo'];
    //$mensaje = $_GET['mensaje'];
    
    $mensaje = '
<html>
<head>
</head>
<body>
  <p>Estimados Alumnos</p>
  <br>
  <p>Debido a las fuertes lluvias que se aproximan en 15 dias más, suspenderemos el examen transversal.</p>
  <br>
  <p>Sentimos las molestias que esto genera. Sin embargo tendremos los examenes via cachipun.</p>
  <br>
  <br>
  <p>Atte</p>
  <table>
    <tr>
      <td><img width="80%" src="https://enmelipilla.cl/benjamin_nunez/assets/pruebamail.jpg" alt="Logo Firma"></td>
    </tr>
  </table>
</body>
</html>
';
    
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Cabeceras adicionales
    $cabeceras .= 'From: Mauricio Catron <mcatronl@duoc.cl>' . "\r\n";
    $cabeceras .= 'Cc: ya.larraguibel@duocuc.cl' . "\r\n";
    
    mail($correo,'Suspención de Eccámenes Transverzales ⚠',$mensaje,$cabeceras);
    
    echo "<script>alert('Correo enviado correctamente')</script>";
    echo "<script>location.href = 'https://enmelipilla.cl/benjamin_nunez/vista'</script>";
    
    
?>