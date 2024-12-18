<?php

declare(strict_types=1);

// Parámetros de búsqueda
$search = $_GET['busqueda'] ?? ''; // Término de búsqueda
$page = $_GET['page'] ?? 1;      // Página actual
$itemsPerPage = 20;             // Elementos por página
$offset = ($page - 1) * $itemsPerPage; // Calcula el desplazamiento

require_once "includes/db.php";
require_once "includes/modulo_ventas/lista_productos_modelo.php";
require_once "includes/modulo_ventas/lista_productos_vista.php";

$resul = obtener_productos($pdo, $search, $itemsPerPage, $offset);
$productos = $resul["productos"];

foreach ($productos as &$producto) {
    [
        'id_producto'       => $id_producto,
        'nombre_producto'   => $nombre_producto,
        'stock_actual'      => $stock_actual,
        'stock_minimo'      => $stock_minimo,
        'codigo_de_barra'   => $codigo_de_barra,
        'nombre_unidad'     => $nombre_unidad,
        'precio'            => $precio,
        'costo'             => $costo
    ] = $producto;

    $entradas = obtener_entradas_producto($pdo, (int) $id_producto);
    $producto["entradas"] = $entradas;
}

