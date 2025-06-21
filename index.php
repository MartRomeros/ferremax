<?php
$url = "https://enmelipilla.cl/benjamin_nunez/api/";
$response = @file_get_contents($url);
$data = json_decode($response, true);
$productos = $data['DATOS'];

require_once('services/monedaServices.php');

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Ferremax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/estilos.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="icon" type="image/svg+xml" href="assets/descarga.svg">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>



<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="assets/descarga.svg" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./index.php">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./clima.html">Clima</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./crud.php">Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container-fluid productos">
        <h3>Nuestros Productos <i class="bi bi-wrench"></i></h3>
        <section class="row">

            <?php foreach ($productos as $producto):?>

                <div class="card col-lg-3">
                    <img src="<?= $producto['imagen'] ?>" alt="Imagen del producto" class="card-img-top">
                    <div class="card-body">
                        <h4 class="card-title"><?= $producto['nombre'] ?></h4>
                        <p class="card-subtitle">Codigo: <?= $producto["codigo_herra"]?>, Marca: <?= $producto["marca"] ?></p>

                        <div class="precios">

                            <div clas="moneda">
                                <h5>CLP:</h5>
                                <h5>USD:</h5>
                                <h5>EUR:</h5>
                            </div>

                            <div class="valor">
                                <h5><?= formatearCLP($producto["valor"]) ?></h5>
                                <h5><?= formatearADolar($producto["valor"]) ?></h5>
                                <h5><?= formatearAEuro($producto["valor"]) ?></h5>
                            </div>

                        </div>                     
                    </div>
                </div>

            <?php endforeach ?>

        </section>
    </main>
    
    <main class="container-fluid formulario-contacto">
        <section class="row form-row">
            <h1>Formulario de contacto</h1>
            <form action="https://enmelipilla.cl/benjamin_nunez/Mail/mail.php" method="get" class="col-lg-6">
              <fieldset>
                <label for="fname">Nombre Completo:</label>
                <input type="text" name="nombre" placeholder="John" required>
              </fieldset>

              <fieldset>
                <label for="lname">Email:</label>
                <input type="mail" name="correo" placeholder="usuario@empresa.com" required>
              </fieldset>

              <fieldset>
                <label for="lname">Mensaje:</label>
                <textarea name="mensaje" rows="4" cols="50" placeholder="Mensaje"></textarea>
              </fieldset>
              
                <input type="submit" value="Enviar" id="boton">
            </form>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
    <script src="assets/js/apiMonedas.js"></script>
</body>
</html>