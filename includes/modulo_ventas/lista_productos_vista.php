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


        if($nombre_unidad === "Unidad") {
            $stock_actual = (int) $stock_actual;
        }

        if ($stock_actual === 0) {
            echo "
                <div class='product-item no-stock' onclick=\"agregar_a_tabla($id_producto, '$nombre_producto', '$nombre_unidad', $precio, '$stock_actual');\">
                    <div class='product-name'> $nombre_producto</div>
                    <div class='product-price'>$$precio</div>
                    <span class='stock no-stock'>Stock: Agotado</span>
                </div>
            ";
        } else if ($stock_minimo > $stock_actual) {
            echo "
                <div class='product-item' onclick=\"agregar_a_tabla($id_producto, '$nombre_producto', '$nombre_unidad', $precio, '$stock_actual');\">
                    <div class='product-name'> $nombre_producto</div>
                    <div class='product-price'>$$precio</div>
                    <span class='stock low-stock'>Stock: $stock_actual $nombre_unidad</span>
                </div>
            ";
        } else {
            echo "
                <div class='product-item' onclick=\"agregar_a_tabla($id_producto, '$nombre_producto', '$nombre_unidad', $precio, '$stock_actual');\">
                    <div class='product-name'> $nombre_producto</div>
                    <div class='product-price'>$$precio</div>
                    <span class='stock'>Stock: $stock_actual $nombre_unidad</span>
                </div>
            ";
        }
    }
}
