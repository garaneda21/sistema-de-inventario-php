<?php

declare(strict_types=1);

function obtener_productos(object $pdo, string $busqueda, int $limite, int $offset)
{
    $consulta = "
        SELECT
            p.id_producto,
            p.nombre_producto,
            p.stock_actual,
            p.stock_minimo,
            p.codigo_de_barra,
            u.nombre_unidad,
            pr.precio,
            c.costo
        FROM producto p
        LEFT JOIN unidad_de_medida u ON p.id_unidad = u.id_unidad
        LEFT JOIN precio pr ON p.id_producto = pr.id_producto
        LEFT JOIN costo c ON p.id_producto = c.id_producto
        WHERE LOWER(p.nombre_producto) LIKE LOWER(:busqueda)
        ORDER BY p.nombre_producto
        LIMIT :limite OFFSET :offset
        ;";
    $stmt = $pdo->prepare($consulta);
    $stmt->bindValue(":busqueda", "%$busqueda%", PDO::PARAM_STR);
    $stmt->bindValue(":limite", $limite, PDO::PARAM_INT);
    $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
    $stmt->execute();

    // obtener resultado de la base de datos como un array asociativo (php)
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Calcular total de productos para paginación
    $consulta = "SELECT COUNT(*) AS total FROM producto WHERE LOWER(nombre_producto) LIKE LOWER(:busqueda);";
    $stmt = $pdo->prepare($consulta);
    $stmt->bindValue(":busqueda", "%$busqueda%", PDO::PARAM_STR);
    $stmt->execute();
    $total_items = $stmt->fetch(PDO::FETCH_ASSOC)["total"];
    $total_pages = ceil($total_items / $limite);

    return [
        "productos" => $productos,
        "total_items" => $total_items,
        "total_pages" => $total_pages
    ];
}

