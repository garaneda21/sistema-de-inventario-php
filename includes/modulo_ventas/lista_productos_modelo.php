<?php

declare(strict_types=1);

function obtener_productos(object $pdo)
{
    $consulta = "
        SELECT
            p.id_producto,
            p.nombre_producto,
            p.stock_actual,
            p.stock_minimo,
            p.codigo_de_barra,
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

function obtener_entradas_producto(object $pdo, int $id_producto)
{
    $consulta = "SELECT ep.id_entrada, ep.stock_actual_entrada, ep.fecha_vencimiento, e.fecha_entrada FROM entrada_producto ep LEFT JOIN entrada e ON ep.id_entrada = e.id_entrada WHERE ep.id_producto = :id_producto AND ep.stock_actual_entrada > 0;";
    $stmt = $pdo->prepare($consulta);
    $stmt->bindParam(":id_producto", $id_producto);
    $stmt->execute();

    $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $resul;
}
