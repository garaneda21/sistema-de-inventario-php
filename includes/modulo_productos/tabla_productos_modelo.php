<?php 

declare(strict_types=1);

function obtener_productos(object $pdo) {
    // realizar consulta de forma segura
    $consulta = "
        SELECT
            p.nombre_producto,
            p.total_vendidos,
            p.stock_actual,
            p.stock_minimo,
            p.codigo_de_barra,
            p.tiempo_alerta_vencimiento,
            c.nombre_categoria,
            u.nombre_unidad,
            pr.precio
        FROM producto p
        LEFT JOIN categoria c ON p.id_categoria = c.id_categoria
        LEFT JOIN unidad_de_medida u ON p.id_unidad = u.id_unidad
        LEFT JOIN precio pr ON p.id_producto = pr.id_producto;
    ";
    $stmt = $pdo->prepare($consulta);
    $stmt->execute();

    // obtener resultado de la base de datos como un array asociativo (php)
    $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resul;
}