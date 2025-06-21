<?php
    $nombre   = $_GET['nombre'];
    $correo = $_GET['correo'];
    //$mensaje = $_GET['mensaje'];
    
    $mensaje = '
    <html>
    <head>
    </head>
    <body>
      <p>Se pudo amigos</p>
      <br>
      <p>Debido a las fuertes lluvias que se aproximan en 15 dias más, suspenderemos el examen transversal.</p>
      <br>
      <p>Sentimos las molestias que esto genera. Sin embargo tendremos los examenes via cachipun.</p>
      <br>
      <br>
      <p>Atte</p>
      <table>
        <tr>
          <td><img width="80%" src="https://enmelipilla.cl/benjamin_nunez/assets/pruebaimagen.gif" alt="Logo Firma"></td>
        </tr>
      </table>
    </body>
    </html>
    ';
            
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Cabeceras adicionales
    $cabeceras .= 'From: ServicioClinteFerremax <ServiciosAyuda@Ferremax.cl>' . "\r\n";
    $cabeceras .= 'Cc: benj.nuneza@duocuc.cl' . "\r\n";
    
    mail($correo,'Prueba de mensajeria por correo 🧰',$mensaje,$cabeceras);
    
    echo "<script>alert('Correo enviado correctamente')</script>";
    echo "<script>location.href = 'https://enmelipilla.cl/benjamin_nunez/'</script>";
    
    
?>