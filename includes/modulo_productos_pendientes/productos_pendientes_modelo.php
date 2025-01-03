<?php 

declare(strict_types=1);

function obtener_productos_pendientes(object $pdo) {
    // realizar consulta de forma segura
    $consulta = "
        SELECT
            p.id_producto,
            p.nombre_producto,
            p.codigo_de_barra,
            u.nombre_unidad
        FROM producto p
        LEFT JOIN unidad_de_medida u ON p.id_unidad = u.id_unidad
        WHERE por_registrar = 1;
    ";
    $stmt = $pdo->prepare($consulta);
    $stmt->execute();

    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $productos;
}
