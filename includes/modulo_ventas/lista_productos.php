<?php

declare(strict_types=1);

require_once "includes/db.php";
require_once "includes/modulo_ventas/lista_productos_modelo.php";
require_once "includes/modulo_ventas/lista_productos_vista.php";

$productos = obtener_productos($pdo);

foreach ($productos as &$producto) {
    [
        'id_producto'       => $id_producto,
        'nombre_producto'   => $nombre_producto,
        'stock_actual'      => $stock_actual,
        'stock_minimo'      => $stock_minimo,
        'codigo_de_barra'   => $codigo_de_barra,
        'nombre_categoria'  => $nombre_categoria,
        'nombre_unidad'     => $nombre_unidad,
        'precio'            => $precio
    ] = $producto;

    $entradas = obtener_entradas_producto($pdo, (int) $id_producto);
    $producto["entradas"] = $entradas;
}

