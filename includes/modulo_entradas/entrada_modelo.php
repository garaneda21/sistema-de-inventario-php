<?php

declare(strict_types=1);

function registrar_entrada(object $pdo)
{
    // Registrar Entrada
    $consulta = "INSERT INTO entrada VALUES ();";
    $stmt = $pdo->prepare($consulta);
    $stmt->execute();

    $id_entrada = $pdo->lastInsertID();
    return $id_entrada;
}

function registrar_entrada_de_producto(
    object $pdo,
    int $id_producto,
    int $id_entrada,
    int|float $cantidad,
    string $vencimiento
) {
    if (strlen($vencimiento) === 0) {
        $vencimiento = null;
    }

    // Registrar productos en la entrada

    $consulta = "INSERT INTO entrada_producto VALUES 
        (:id_producto, :id_entrada, :cantidad_entrada, :stock_actual_entrada,  :fecha_vencimiento);
    ";
    $stmt = $pdo->prepare($consulta);

    $stmt->bindParam(":id_producto", $id_producto);
    $stmt->bindParam(":id_entrada", $id_entrada);
    $stmt->bindParam(":cantidad_entrada", $cantidad);
    $stmt->bindParam(":stock_actual_entrada", $cantidad);
    $stmt->bindParam(":fecha_vencimiento", $vencimiento);

    $stmt->execute();
}
