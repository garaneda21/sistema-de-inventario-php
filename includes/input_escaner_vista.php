<?php 

declare(strict_types=1);

function datos_producto_obtenido_por_escaner () {
    if (isset($_SESSION["producto_obtenido_por_escaner"])) {
        [
            'id_producto' => $id_producto,
            'nombre_producto' => $nombre_producto,
            'stock_actual' => $stock_actual,
            'requiere_fecha_vencimiento' => $requiere_fecha_vencimiento,
            'nombre_unidad' => $nombre_unidad,
            'precio' => $precio
        ] = $_SESSION["producto_obtenido_por_escaner"];

        unset($_SESSION["producto_obtenido_por_escaner"]);

        echo "<div id='datos-input-escaner' data-id_producto='$id_producto' data-nombre='$nombre_producto' data-stock_actual='$stock_actual' data-unidad='$nombre_unidad'  data-precio='$precio' data-requiere_fecha_vencimiento='$requiere_fecha_vencimiento'></div>";
    } else {
        echo "No se ha escaneado aún";
    }
}
