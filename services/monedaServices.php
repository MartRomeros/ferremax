<?php
$apiUrl = 'https://mindicador.cl/api';

// Obtener datos desde API
if (ini_get('allow_url_fopen')) {
    $json = file_get_contents($apiUrl);
} else {
    $curl = curl_init($apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $json = curl_exec($curl);
    curl_close($curl);
}

$dailyIndicators = json_decode($json);

// Variables globales de monedas
$valorDolar = $dailyIndicators->dolar->valor ?? 0;
$valorEuro  = $dailyIndicators->euro->valor ?? 0;

// Función: CLP a USD
function formatearADolar($precioEnPesos) {
    global $valorDolar;
    if ($valorDolar <= 0) return "N/A";
    $precioDolares = $precioEnPesos / $valorDolar;
    return '$' . number_format($precioDolares, 2);
}

// Función: CLP a EUR
function formatearAEuro($precioEnPesos) {
    global $valorEuro;
    if ($valorEuro <= 0) return "N/A";
    $precioEuros = $precioEnPesos / $valorEuro;
    return '€' . number_format($precioEuros, 2);
}

// Función opcional: CLP bien formateado
function formatearCLP($precioEnPesos) {
    return '$' . number_format($precioEnPesos, 0, ',', '.');
}




?>