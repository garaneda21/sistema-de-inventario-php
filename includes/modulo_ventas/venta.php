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
        $salida_total = 0.0;
        $id_producto;

        foreach ($producto as $lote) {
            [
                'id_producto' => $id_producto,
                'id_entrada' => $id_entrada,
                'cantidad' => $cantidad,
                'precio' => $precio
            ] = $lote;

            
            $id_producto = (int) $id_producto;
            $id_entrada = (int) $id_entrada;
            $cantidad = (float) $cantidad;
            
            actualizar_lote($pdo, $id_producto, $id_entrada, $cantidad);
            
            $salida_total += $cantidad;
        }

        registrar_salida_de_producto($pdo, $id_producto, $id_salida, $salida_total);
    }

    $pdo = null;
    $stmt = null;

    header("Location: ../../modulo_ventas.php?registrar_salida=exito");
} catch (PDOException $e) {
    die("Fallo al registrar salida: " . $e->getMessage());
}