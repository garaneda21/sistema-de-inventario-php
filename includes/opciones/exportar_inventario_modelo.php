<?php

declare(strict_types=1);

function obtener_productos_para_exportar(object $pdo) {
    $consulta = "WITH costos_recientes AS (
            SELECT id_producto, costo AS precio_compra
            FROM costo
            WHERE fecha_fin_costo IS NULL
        ),
        precios_recientes AS (
            SELECT id_producto, precio AS precio_venta
            FROM precio
            WHERE fecha_fin_precio IS NULL
        ),
        stock_actual AS (
            SELECT id_producto, SUM(stock_actual_entrada) AS stock
            FROM entrada_producto
            GROUP BY id_producto
        )
        SELECT 
            p.nombre_producto,
            p.codigo_de_barra,
            u.nombre_unidad,
            cr.precio_compra,
            pr.precio_venta,
            sa.stock
        FROM producto p
        JOIN unidad_de_medida u ON u.id_unidad = p.id_unidad
        LEFT JOIN costos_recientes cr ON cr.id_producto = p.id_producto
        LEFT JOIN precios_recientes pr ON pr.id_producto = p.id_producto
        LEFT JOIN stock_actual sa ON sa.id_producto = p.id_producto;
    ";
    $stmt = $pdo->prepare($consulta);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_NUM);
}