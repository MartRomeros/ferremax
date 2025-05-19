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
    <title>Ferremax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Ferremax</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Dias feriados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Comentarios</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container-fluid">

        <section class="row">

            <h3 class="col">Nuestros productos</h3>

            <select class="form-select col" onclick="mostrarValor()" id="valor">
                <option selected>Conversor de precios</option>
                <option value="dolar">A dolares</option>
                <option value="euros">A Euros</option>
            </select>
        </section>

        <!-- Parte del martin-->
        <section class="row">
            <?php
            foreach ($productos as $producto => $value) {
                echo '
                <div class="card col-lg-3">
                    
                    <div class="card-body">
                        <h5 class="card-title">'. $value["nombre"] .'</h5>
                        <ul class="details">
                            <li>Marca: '.$value["marca"] .'</li>
                            <li>Codigo: '.$value["codigo_herra"] .'</li>
                            <li class="valor">Precio: '.$value["valor"] .'</li>
                        </ul>                        
                    </div>
                </div>
                ';
            }
            ?>
        </section>
    </main>

    <main class="container-fluid">
        <!-- Parte del nicos-->

    </main>

    <main class="container-fluid">
        <!-- Parte del lukas-->

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
    <script src="js/apiMonedas.js"></script>
</body>

</html>