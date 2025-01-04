<?php 

declare(strict_types=1);

function obtener_producto(object $pdo, string $codigo_de_barra) {
    $consulta = "SELECT
	        p.id_producto, 
	        p.nombre_producto,
            p.stock_actual,
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
    return $producto_obtenido_por_escaner;
}
