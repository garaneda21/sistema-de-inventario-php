<?php

declare(strict_types=1);

function registrar_salida(object $pdo)
{
    $consulta = "INSERT INTO salida (id_motivo) VALUES (1);";
    $stmt = $pdo->prepare($consulta);
    $stmt->execute();

    $id_salida = $pdo->lastInsertID();
    return $id_salida;
}

function obtener_entradas_producto(object $pdo, int $id_producto)
{
    $consulta = "SELECT id_entrada, stock_actual_entrada, fecha_vencimiento FROM entrada_producto WHERE id_producto = :id_producto AND stock_actual_entrada > 0 ORDER BY fecha_vencimiento ASC;";
    $stmt = $pdo->prepare($consulta);
    $stmt->bindParam(":id_producto", $id_producto);
    $stmt->execute();

    $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $resul;
}

function actualizar_lote(
    object $pdo,
    int $id_producto,
    int $id_entrada,
    int|float $cantidad
) {
    $consulta = "UPDATE entrada_producto 
        SET stock_actual_entrada = stock_actual_entrada - :cantidad
        WHERE id_producto = :id_producto AND id_entrada = :id_entrada;
    ";

    $stmt = $pdo->prepare($consulta);

    $stmt->bindParam(":cantidad", $cantidad);
    $stmt->bindParam(":id_producto", $id_producto);
    $stmt->bindParam(":id_entrada", $id_entrada);

    $stmt->execute();
}


function registrar_salida_de_producto(
    object $pdo,
    int $id_producto,
    int $id_salida,
    int|float $salida_total,
) {
    $consulta = "INSERT INTO salida_producto VALUES (:id_producto, :id_salida, :cantidad_salida);";
    $stmt = $pdo->prepare($consulta);

    $stmt->bindParam(":id_producto", $id_producto);
    $stmt->bindParam(":id_salida", $id_salida);
    $stmt->bindParam(":cantidad_salida", $salida_total);

    $stmt->execute();
}

function actualizar_cantidad_de_productos(object $pdo, int $id_producto, int|float $salida_total)
{
    $consulta = "SELECT sum(stock_actual_entrada) as stock_restante FROM entrada_producto WHERE id_producto = :id_producto AND stock_actual_entrada > 0;";

    $stmt = $pdo->prepare($consulta);
    $stmt->bindParam(":id_producto", $id_producto);
    $stmt->execute();
    $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $stock_restante = $resul[0]["stock_restante"];

    $consulta = "UPDATE producto 
        SET stock_actual = :stock_restante, total_vendidos = total_vendidos + :salida_total
        WHERE id_producto = :id_producto;
    ";
    $stmt = $pdo->prepare($consulta);

    $stmt->bindParam(":stock_restante", $stock_restante);
    $stmt->bindParam(":salida_total", $salida_total);
    $stmt->bindParam(":id_producto", $id_producto);

    $stmt->execute();
}
