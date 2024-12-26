<?php

declare(strict_types=1);

$productos = $_POST["productos"];

try {
    require_once "../db.php";
    require_once "venta_modelo.php";

    /* Comprobar Errores
        - Inputs Vacíos
        - Strings más largos que lo permitido
        - Input Incorrecto (string en campo numérico)
        - Producto que ya existe    
        - tipos float tienen que ser de dos decimales, no mas
        - Números Negativos
    */

    $id_salida = (int) registrar_salida($pdo);

    foreach ($productos as $producto) {

        [
            'id_producto' => $id_producto,
            'cantidad' => $cantidad,
            // 'precio' => $precio
        ] = $producto;

        $id_producto = (int) $id_producto;
        $cantidad = (float) $cantidad;
        $salida_total = $cantidad;

        $lotes = obtener_entradas_producto($pdo, $id_producto);

        registrar_salida_de_producto($pdo, $id_producto, $id_salida, $cantidad);

        foreach ($lotes as $lote) {

            [
                'id_entrada' => $id_entrada,
                'stock_actual_entrada' => $stock_actual_entrada,
                'fecha_vencimiento' => $fecha_venc
            ] = $lote;

            $id_entrada = (int) $id_entrada;
            $stock_actual_entrada = (float) $stock_actual_entrada;

            //           10              25
            if($stock_actual_entrada < $cantidad) {
                actualizar_lote($pdo, $id_producto, $id_entrada, $stock_actual_entrada);
                $cantidad -= $stock_actual_entrada;
            } else {
                actualizar_lote($pdo, $id_producto, $id_entrada, $cantidad);
                $cantidad = 0;
                break;
            }
        }
    }

    actualizar_cantidad_de_productos($pdo, $id_producto, $id_salida, $salida_total);

    $pdo = null;
    $stmt = null;

    header("Location: ../../modulo_ventas.php?registrar_salida=exito");
} catch (PDOException $e) {
    die("Fallo al registrar salida: " . $e->getMessage());
}

