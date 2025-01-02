<?php

declare(strict_types=1);

function ingresar_producto(object $pdo, string $nombre_producto, string $codigo_de_barra) {
    // Insertar Producto
    $consulta = "INSERT INTO producto (
            nombre_producto, 
            codigo_de_barra, 
        ) VALUES
        (:nombre_producto, :stock_minimo, :codigo_de_barra, :tiempo_alerta_vencimiento, :requiere_fecha_vencimiento, :id_unidad);
    ";

    $stmt = $pdo->prepare($consulta);

    $stmt->bindParam(":nombre_producto", $nombre_producto);
    $stmt->bindParam(":codigo_de_barra", $codigo_de_barra);

    $stmt->execute();
    $id_producto = $pdo->lastInsertID();

    // Insertar Precio

    $consulta = "INSERT INTO precio (precio, id_producto) VALUES (:precio, :id_producto);";
    $stmt = $pdo->prepare($consulta);

    $stmt->bindParam(":precio", $precio);
    $stmt->bindParam(":id_producto", $id_producto);

    $stmt->execute();

    $consulta = "INSERT INTO costo (costo, id_producto) VALUES (:costo, :id_producto);";
    $stmt = $pdo->prepare($consulta);

    $stmt->bindParam(":costo", $costo);
    $stmt->bindParam(":id_producto", $id_producto);

    $stmt->execute();
}
