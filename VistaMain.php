<?php
$url = "https://enmelipilla.cl/benjamin_nunez/";
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
    <link rel="stylesheet" href="vista/css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
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
                        <h5 class="card-title">' . $value["nombre"] . '</h5>
                        <ul class="details">
                            <li>Marca: ' . $value["marca"] . '</li>
                            <li>Codigo: ' . $value["codigo_herra"] . '</li>
                            <li class="valor">Precio: ' . $value["valor"] . '</li>
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
        <h3>Dias feriados en los que no atendemos</h3>
        <div class="header">
            <h1><i class="fas fa-calendar-alt"></i> Feriados de Chile</h1>
            <p class="lead">Información oficial actualizada</p>
        </div>

        <div class="btn-container">
            <button id="btnFeriados" class="btn-action btn-primary">
                <i class="fas fa-sync-alt"></i> Actualizar
            </button>
            <button id="btnClima" class="btn-action btn-secondary">
                <i class="fas fa-cloud-sun"></i> Clima
            </button>
            <button id="btnGeografia" class="btn-action btn-secondary">
                <i class="fas fa-mountain"></i> Geografía
            </button>
        </div>

        <div class="loader" id="loader"></div>

        <table id="tablaFeriados" class="table">
            <thead>
                <tr>
                    <th><i class="far fa-calendar"></i> Fecha</th>
                    <th><i class="fas fa-info-circle"></i> Título</th>
                    <th><i class="fas fa-tag"></i> Tipo</th>
                    <th><i class="fas fa-lock"></i> Inalienable</th>
                    <th><i class="fas fa-ellipsis-h"></i> Extra</th>
                </tr>
            </thead>
            <tbody id="cuerpoTabla">
                <!-- Los datos de feriados se cargarán aquí -->
            </tbody>
        </table>

        <div class="section-folder">
            <i class="fas fa-info-circle"></i> Información oficial proporcionada por el Gobierno de Chile
        </div>

    </main>

    <main class="container-fluid">
        <h3>Nuestros comentarios</h3>
        <div id="listaUsuarios" class="row"></div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
    <script src="vista/js/apiMonedas.js"></script>
    <!-- Enlaza tu script correctamente desde la carpeta 'js' -->
    <script src="vista/js/apiUsuarios.js"></script>
    <script src="vista/js/apiFeriados.js"></script>
</body>

</html>