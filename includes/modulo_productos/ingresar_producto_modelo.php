<?php

declare(strict_types=1);

function ingresar_producto(object $pdo, string $nombre_producto, int $precio, int $id_categoria, int $id_unidad, int $stock_minimo, string $codigo_de_barra, int $tiempo_alerta_vencimiento) {
    $consulta = "INSERT INTO producto (
            nombre_producto, 
            stock_minimo, 
            codigo_de_barra, 
            tiempo_alerta_vencimiento, 
            id_categoria, 
            id_unidad
        ) VALUES
        (:nombre_producto, :stock_minimo, :codigo_de_barra, :tiempo_alerta_vencimiento, :id_categoria, :id_unidad);
    ";

    $instruccion = $pdo->prepare($consulta);

    $instruccion->bindParam(":nombre_producto", $nombre_producto);
    $instruccion->bindParam(":stock_minimo", $stock_minimo);
    $instruccion->bindParam(":codigo_de_barra", $codigo_de_barra);
    $instruccion->bindParam(":tiempo_alerta_vencimiento", $tiempo_alerta_vencimiento);
    $instruccion->bindParam(":id_categoria", $id_categoria);
    $instruccion->bindParam(":id_unidad", $id_unidad);

    $instruccion->execute();

    // obtener resultado de la base de datos como un array asociativo (php)
    $resul = $instruccion->fetch(PDO::FETCH_ASSOC);
    return $resul;
}
