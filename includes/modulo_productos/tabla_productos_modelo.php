<?php 

declare(strict_types=1);

function obtener_productos(object $pdo) {
    // realizar consulta de forma segura
    $consulta = "
        SELECT
            p.nombre_producto,
            p.stock_actual,
            p.stock_minimo,
            p.codigo_de_barra,
            p.tiempo_alerta_vencimiento,
            u.nombre_unidad,
            pr.precio,
            c.costo
        FROM producto p
        LEFT JOIN unidad_de_medida u ON p.id_unidad = u.id_unidad
        LEFT JOIN precio pr ON p.id_producto = pr.id_producto
        LEFT JOIN costo c ON p.id_producto = c.id_producto;
    ";
    $stmt = $pdo->prepare($consulta);
    $stmt->execute();

    // obtener resultado de la base de datos como un array asociativo (php)
    $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resul;
}
