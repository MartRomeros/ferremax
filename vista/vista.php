<?php
    $url = "http://localhost/Ferremax/";
    $response = @file_get_contents($url);
    $data = json_decode($response, true);
    $productos = $data['DATOS'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Listado de Productos</title>
    
</head>
<body>
    <h1>Listado de Productos</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Código</th>
                <th>Marca</th>
                <th>Código Herramienta</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Valor</th>
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
                <td>$<?php echo number_format((float)$producto['valor'], 0, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>