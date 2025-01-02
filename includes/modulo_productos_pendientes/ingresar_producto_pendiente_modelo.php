<?php

declare(strict_types=1);

function ingresar_producto(object $pdo, string $nombre_producto, int $unidad_de_medida, string $codigo_de_barra) {
    // Insertar Producto
    $consulta = "INSERT INTO producto (
            nombre_producto, 
            codigo_de_barra, 
            id_unidad
        ) VALUES
        (:nombre_producto, :codigo_de_barra, :id_unidad);
    ";

    $stmt = $pdo->prepare($consulta);

    $stmt->bindParam(":nombre_producto", $nombre_producto);
    $stmt->bindParam(":codigo_de_barra", $codigo_de_barra);
    $stmt->bindParam(":id_unidad", $unidad_de_medida);

    $stmt->execute();
    $id_producto = $pdo->lastInsertID();

    // Insertar Precio y Costo

    $consulta = "INSERT INTO precio (precio, id_producto) VALUES (0, :id_producto);";
    $stmt = $pdo->prepare($consulta);
    $stmt->bindParam(":id_producto", $id_producto);
    $stmt->execute();

    $consulta = "INSERT INTO costo (costo, id_producto) VALUES (0, :id_producto);";
    $stmt = $pdo->prepare($consulta);
    $stmt->bindParam(":id_producto", $id_producto);
    $stmt->execute();
}
