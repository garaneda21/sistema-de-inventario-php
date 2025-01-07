<?php 

declare(strict_types=1);

function obtener_producto(object $pdo, string $codigo_de_barra) {
    $consulta = "SELECT
	        p.id_producto, 
	        p.nombre_producto,
            p.requiere_fecha_vencimiento,
            u.nombre_unidad,
            pr.precio
        FROM producto p 
        LEFT JOIN unidad_de_medida u ON p.id_unidad = u.id_unidad
        LEFT JOIN precio pr ON p.id_producto = pr.id_producto
        WHERE codigo_de_barra = :codigo_de_barra;
    ";
    $stmt = $pdo->prepare($consulta);
    $stmt->bindParam(":codigo_de_barra", $codigo_de_barra);
    $stmt->execute();

    $producto_obtenido_por_escaner = $stmt->fetch(PDO::FETCH_ASSOC);

    $producto_obtenido_por_escaner["stock_actual"] = obtener_stock($pdo, (int) $producto_obtenido_por_escaner["id_producto"]);

    return $producto_obtenido_por_escaner;
}

function obtener_stock(object $pdo, int $id_producto) {
    $consulta = "SELECT sum(stock_actual_entrada) as stock_actual FROM entrada_producto WHERE id_producto = :id_producto AND stock_actual_entrada > 0;";
    $stmt = $pdo->prepare($consulta);
    $stmt->bindParam(":id_producto", $id_producto);
    $stmt->execute();

    $resul = $stmt->fetch(PDO::FETCH_ASSOC);

    return $resul["stock_actual"] ?? 0;
}