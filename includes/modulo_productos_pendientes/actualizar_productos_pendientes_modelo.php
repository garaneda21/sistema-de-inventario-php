<?php

declare(strict_types=1);

function actualizar_producto_pendiente(object $pdo, int $id_producto, string $codigo_de_barra, string $nombre_producto, int $costo, int $precio, int $stock_minimo, int $requiere_fecha_vencimiento, int $tiempo_alerta_vencimiento) {

    // Actualizar Producto
    $consulta = "UPDATE producto SET
            nombre_producto = :nombre_producto,
            stock_minimo = :stock_minimo,
            tiempo_alerta_vencimiento = :tiempo_alerta_vencimiento,
            requiere_fecha_vencimiento = :requiere_fecha_vencimiento,
            por_registrar = 0
        WHERE por_registrar = 1 AND id_producto = :id_producto;
    ";
    $stmt = $pdo->prepare($consulta);
    $stmt->bindParam(":nombre_producto", $nombre_producto);
    $stmt->bindParam(":stock_minimo", $stock_minimo);
    $stmt->bindParam(":tiempo_alerta_vencimiento", $tiempo_alerta_vencimiento);
    $stmt->bindParam(":requiere_fecha_vencimiento", $requiere_fecha_vencimiento);
    $stmt->bindParam(":id_producto", $id_producto);
    
    $stmt->execute();


    // Actualizar Precio
    $consulta = "UPDATE precio SET precio = :precio
        WHERE id_producto = :id_producto
        ORDER BY fecha_inicio_precio DESC LIMIT 1;
    ";
    $stmt = $pdo->prepare($consulta);
    $stmt->bindParam(":precio", $precio);
    $stmt->bindParam(":id_producto", $id_producto);

    $stmt->execute();


    // Actualizar Costo
    $consulta = "UPDATE costo SET costo = :costo
        WHERE id_producto = :id_producto
        ORDER BY fecha_inicio_costo DESC LIMIT 1;
    ";
    $stmt = $pdo->prepare($consulta);
    $stmt->bindParam(":costo", $costo);
    $stmt->bindParam(":id_producto", $id_producto);

    $stmt->execute();
}