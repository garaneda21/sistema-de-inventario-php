<?php

declare(strict_types=1);

function insertar_productos($productos)
{
    foreach ($productos as $producto) {
        [
            'id_producto'       => $id_producto,
            'nombre_producto'   => $nombre_producto,
            'stock_actual'      => $stock_actual,
            'stock_minimo'      => $stock_minimo,
            'codigo_de_barra'   => $codigo_de_barra,
            'nombre_unidad'     => $nombre_unidad,
            'precio'            => $precio,
            'costo'             => $costo,
        ] = $producto;

        echo "
            <div class='product-item' onclick=\"agregar_a_tabla($id_producto, '$nombre_producto', '$nombre_unidad', $precio, $stock_actual);\">
                <div class='product-name'> $nombre_producto</div>
                <div class='product-price'>$$precio</div>
                <span class='stock'>Stock: $stock_actual $nombre_unidad</span>
            </div>
        ";
    }
}
