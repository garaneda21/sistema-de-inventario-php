<?php 

declare(strict_types=1);

function entradas_del_dia(object $pdo) {
    $consulta = "SELECT id_entrada FROM entrada WHERE fecha_entrada >= CURDATE() AND fecha_entrada < CURDATE() + INTERVAL 1 DAY;";
    $stmt = $pdo->prepare($consulta);
    $stmt->execute();

    $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $entradas_del_dia = 0;

    foreach ($resul as $entrada) {
        $entradas_del_dia += (float) productos_en_entrada($pdo, $entrada["id_entrada"]);
    }

    return $entradas_del_dia;
}

function productos_en_entrada(object $pdo, int $id_entrada) {
    $consulta = "SELECT sum(cantidad_entrada) as suma_cantidad_entrada FROM entrada_producto WHERE id_entrada = :id_entrada;";
    $stmt = $pdo->prepare($consulta);

    $stmt->bindParam(":id_entrada", $id_entrada);

    $stmt->execute();
    
    $resul = $stmt->fetch(PDO::FETCH_ASSOC);

    return (float) $resul["suma_cantidad_entrada"];
}