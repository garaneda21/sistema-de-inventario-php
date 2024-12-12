<?php

declare(strict_types=1);

function ingresar_producto(object $pdo, string $nombre_producto, int $precio, int $id_categoria, int $id_unidad, int $stock_minimo, string $codigo_de_barra, int $requiere_fecha_vencimiento, int $tiempo_alerta_vencimiento) {
    var_dump($codigo_de_barra);
    // Insertar Producto
    $consulta = "INSERT INTO producto (
            nombre_producto, 
            stock_minimo, 
            codigo_de_barra, 
            tiempo_alerta_vencimiento, 
            requiere_fecha_vencimiento,
            id_categoria, 
            id_unidad
        ) VALUES
        (:nombre_producto, :stock_minimo, :codigo_de_barra, :tiempo_alerta_vencimiento, :requiere_fecha_vencimiento, :id_categoria, :id_unidad);
    ";

    $stmt = $pdo->prepare($consulta);

    $stmt->bindParam(":nombre_producto", $nombre_producto);
    $stmt->bindParam(":stock_minimo", $stock_minimo);
    $stmt->bindParam(":codigo_de_barra", $codigo_de_barra);
    $stmt->bindParam(":requiere_fecha_vencimiento", $requiere_fecha_vencimiento);
    $stmt->bindParam(":tiempo_alerta_vencimiento", $tiempo_alerta_vencimiento);
    $stmt->bindParam(":id_categoria", $id_categoria);
    $stmt->bindParam(":id_unidad", $id_unidad);

    $stmt->execute();
    $id_producto = $pdo->lastInsertID();

    // Insertar Precio

    $consulta = "INSERT INTO precio (precio, id_producto) VALUES (:precio, :id_producto);";
    $stmt = $pdo->prepare($consulta);

    $stmt->bindParam(":precio", $precio);
    $stmt->bindParam(":id_producto", $id_producto);

    $stmt->execute();
}
