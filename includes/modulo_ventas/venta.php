<?php

declare(strict_types=1);

$productos = $_POST["productos"];

try {
    require_once "../db.php";
    require_once "venta_modelo.php";
    require_once "venta_contr.php";

    // MANEJAR ERRORES
    $errores = [];

    foreach ($productos as $producto) {
        [
            'id_producto' => $id_producto,
            'nombre_producto' => $nombre_producto,
            'cantidad' => $cantidad,
            'stock_actual' => $stock_actual
        ] = $producto;

        $nombre_producto = strtoupper($nombre_producto);

        if (!es_cantidad_mayor_a_cero($cantidad)) {
            $errores["cantidad_mayor_a_cero"] = [
                "nombre_producto" => $nombre_producto,
                "mensaje" => "La cantidad de venta ingresada es menor cero o negativa: ($cantidad)",
            ];
        }
        if (es_cantidad_mayor_a_stock_actual($cantidad, $stock_actual)) {
            $errores["cantidad_mayor_a_stock_actual"] = [
                "nombre_producto" => $nombre_producto,
                "mensaje" => "La cantidad de venta ingresada es mayor a la disponible en stock: (ingresado: $cantidad, stock_actual: $stock_actual)",
            ];
        }
        if (!es_valor_numerico($cantidad)) {
            $errores["no_es_numerico"] = [
                "nombre_producto" => $nombre_producto,
                "mensaje" => "La cantidad de venta ingresada debe ser un número",
            ];
        }
        if (!es_de_solo_dos_decimales($cantidad)) {
            $errores["es_de_solo_dos_decimales"] = [
                "nombre_producto" => $nombre_producto,
                "mensaje" => "La cantidad de venta ingresada debe tener más de dos decimales",
            ];
        }
    }

    require_once "../config_session.php";

    if($errores) {
        $_SESSION["errores_en_cantidad_ingresada"] = $errores;
        header("Location: ../../modulo_ventas.php");
        die();
    }

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

    actualizar_total_vendidos($pdo, $id_producto, $id_salida, $salida_total);

    $pdo = null;
    $stmt = null;

    header("Location: ../../modulo_ventas.php?registrar_salida=exito");
} catch (PDOException $e) {
    die("Fallo al registrar salida: " . $e->getMessage());
}

