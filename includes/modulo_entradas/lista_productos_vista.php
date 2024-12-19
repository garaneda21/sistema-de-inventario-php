<?php 

declare(strict_types=1);

function insertar_productos($productos) {
    foreach ($productos as $producto) {
        [
            'id_producto'       => $id_producto,
            'nombre_producto'   => $nombre_producto,
            'stock_actual'      => $stock_actual,
            'stock_minimo'      => $stock_minimo,
            'codigo_de_barra'   => $codigo_de_barra,
            'requiere_fecha_vencimiento' => $requiere_fecha_vencimiento,
            'nombre_unidad'     => $nombre_unidad,
        ] = $producto;

        if($nombre_unidad === "Unidad") {
            $stock_actual = (int) $stock_actual;
        }
        
        echo "
            <div class='product-item' onclick=\"agregar_a_tabla($id_producto, '$nombre_producto', '$nombre_unidad', $requiere_fecha_vencimiento);\">
                <div class='product-name'>$nombre_producto</div>
                <span class='stock'>Stock: $stock_actual $nombre_unidad</span>
            </div>
        ";
    }
}
