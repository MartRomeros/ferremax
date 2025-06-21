<?php
$url = "https://enmelipilla.cl/benjamin_nunez/api/";
$response = @file_get_contents($url);
$data = json_decode($response, true);
$productos = $data['DATOS'];
?>


<!DOCTYPE html>
    <html lang="es">
    <head>
      <meta charset="UTF-8">
      <title>Formulario - Crud Api</title>
      <link rel="stylesheet" href="assets/css/estiloCrud.css">
    </head>
    
    <body>
    
      <h2>Seccion Admin</h2>
        <div class="container">
            <form id="formHerramientaPost">
              <input type="number" name="codigo" placeholder="C車digo" required />
              <input type="text" name="marca" placeholder="Marca" required />
              <input type="text" name="codigo_herra" placeholder="C車digo Herramienta" required />
              <input type="text" name="nombre" placeholder="Nombre" required />
              <input type="number" name="valor" placeholder="Valor" required />
              <input type="text" name="imagen" placeholder="URL Imagen" />
              <button type="submit">Agregar Herramienta</button>
            </form>
            
            <div id="respuestaPost"></div>
            
            <form id="formHerramientaPut">
              <input type="number" name="codigo" placeholder="C車digo" required />
              <input type="text" name="marca" placeholder="Marca" required/>
              <input type="text" name="codigo_herra" placeholder="C車digo Herramienta" required />
              <input type="text" name="nombre" placeholder="Nombre" required />
              <input type="number" name="valor" placeholder="Valor" required/>
              <input type="text" name="imagen" placeholder="URL Imagen" required/>
              <button type="submit">Modificar Herramienta</button>
            </form>
            
            <div id="respuestaPut"></div>
            
            <form id="formHerramientaPatch">
              <input type="number" name="codigo" placeholder="C車digo" required />
              <input type="text" name="marca" placeholder="Marca"/>
              <input type="text" name="codigo_herra" placeholder="C車digo Herramienta" />
              <input type="text" name="nombre" placeholder="Nombre" />
              <input type="number" name="valor" placeholder="Valor" />
              <input type="text" name="imagen" placeholder="URL Imagen" />
              <button type="submit">Modificar Campo Herramienta</button>
            </form>
            
            <div id="respuestaPatch"></div>
            
            <form id="formHerramientaDelete">
              <input type="number" name="codigo" placeholder="C車digo" required />
              <button type="submit">Eliminar Herramienta</button>
            </form>
            
            <div id="respuestaDelete"></div>
        </div>
        
        <h2>Listado de herramientas</h2>
    
        <div class="container">
            <table border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Marca</th>
                        <th>Código Herramienta</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Valor</th>
                        <th>Imagen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($producto['codigo']); ?></td>
                            <td><?php echo htmlspecialchars($producto['marca']); ?></td>
                            <td><?php echo htmlspecialchars($producto['codigo_herra']); ?></td>
                            <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($producto['fecha']); ?></td>
                            <td>$<?php echo number_format($producto['valor'], 2, ',', '.'); ?></td>
                            <td>
                                <img src="<?php echo htmlspecialchars($producto['imagen']); ?>" alt="Imagen" width="80" height="80">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- Enlazar el JS al final del body -->
        <script src="vista/js/formularioCrud.js"></script>
        
    </body>
</html>