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


function datos_de_salida(object $pdo) {
    $consulta = "SELECT id_salida FROM salida WHERE fecha_salida >= CURDATE() AND fecha_salida < CURDATE() + INTERVAL 1 DAY AND id_motivo = 1;";
    $stmt = $pdo->prepare($consulta);
    $stmt->execute();

    $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $salidas_del_dia = 0;
    $ingresos_del_dia = 0;

    foreach ($resul as $salida) {
        $datos = cantitad_e_ingreso_total_en_salida($pdo, $salida["id_salida"]);

        $salidas_del_dia += (float) $datos["suma_cantidad_salida"]; 
        $ingresos_del_dia += (int) $datos["ingreso_total_salida"];
    }

    return [
        "salidas_del_dia" => $salidas_del_dia, 
        "ingresos_del_dia" => $ingresos_del_dia
    ];
}

function cantitad_e_ingreso_total_en_salida(object $pdo, int $id_salida) {
    $consulta = "SELECT SUM(sp.cantidad_salida) as suma_cantidad_salida, SUM(sp.cantidad_salida * p.precio) as ingreso_total_salida
        FROM salida_producto sp LEFT JOIN precio p ON p.id_producto = sp.id_producto
        WHERE id_salida = :id_salida and fecha_fin_precio IS NULL;
    ";
    // consulta = "SELECT sum(cantidad_salida) as suma_cantidad_salida FROM salida_producto WHERE id_salida = :id_salida;";
    $stmt = $pdo->prepare($consulta);
    $stmt->bindParam(":id_salida", $id_salida);
    $stmt->execute();
    
    $resul = $stmt->fetch(PDO::FETCH_ASSOC);

    return $resul;
}

function obtener_productos_en_bajo_stock(object $pdo) {
    $consulta = "SELECT COUNT(*) AS productos_en_bajo_stock FROM producto WHERE stock_actual <= stock_minimo AND stock_actual > 0;";
    $stmt = $pdo->prepare($consulta);
    $stmt->execute();

    $resul = $stmt->fetch(PDO::FETCH_ASSOC);

    return $resul["productos_en_bajo_stock"];
}

function obtener_productos_agotados(object $pdo) {
    $consulta = "SELECT COUNT(*) AS productos_agotados FROM producto WHERE stock_actual = 0;";
    $stmt = $pdo->prepare($consulta);
    $stmt->execute();

    $resul = $stmt->fetch(PDO::FETCH_ASSOC);

    return $resul["productos_agotados"];
}

function obtener_lotes_por_vencer(object $pdo) {
    $consulta = "SELECT COUNT(*) AS lotes_por_vencer FROM producto p 
        RIGHT JOIN entrada_producto ep ON p.id_producto = ep.id_producto
        WHERE requiere_fecha_vencimiento = 1 
        AND tiempo_alerta_vencimiento > DATEDIFF(fecha_vencimiento, NOW()) > 0
        AND DATEDIFF(fecha_vencimiento, NOW()) > 0;
    ";
    $stmt = $pdo->prepare($consulta);
    $stmt->execute();

    $resul = $stmt->fetch(PDO::FETCH_ASSOC);

    return $resul["lotes_por_vencer"];
}

function obtener_entradas_realizadas_en_el_dia($pdo) {
    $consulta = "SELECT nombre_producto, nombre_unidad, e.id_entrada, cantidad_entrada, fecha_entrada FROM producto p 
        JOIN unidad_de_medida u ON p.id_unidad = u.id_unidad
        JOIN entrada_producto ep ON p.id_producto = ep.id_producto
        JOIN entrada e ON e.id_entrada = ep.id_entrada
        WHERE fecha_entrada >= CURDATE() AND fecha_entrada < CURDATE() + INTERVAL 1 DAY
        ORDER BY fecha_entrada;
    ";
    $stmt = $pdo->prepare($consulta);
    $stmt->execute();

    $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $resul;
}