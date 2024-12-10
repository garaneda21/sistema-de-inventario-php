<?php

declare(strict_types=1);

$productos = $_POST["productos"];

var_dump($productos);

try {
    require_once "../db.php";
    require_once "entrada_modelo.php";

    /* Comprobar Errores
        - Inputs Vacíos
        - Strings más largos que lo permitido
        - Input Incorrecto (string en campo numérico)
        - Producto que ya existe    
        - tipos float tienen que ser de dos decimales, no mas
    */

    $id_entrada = (int) registrar_entrada($pdo);

    foreach ($productos as $producto) {
        [
            'id_producto'   => $id_producto,
            'cantidad'      => $cantidad,
            'vencimiento'   => $vencimiento
        ] = $producto;


        $id_producto = (int) $id_producto;
        $cantidad = (float) $cantidad;

        registrar_entrada_de_producto($pdo, $id_producto, $id_entrada, $cantidad, $vencimiento);
    }

    $pdo = null;
    $stmt = null;

    header("Location: ../../modulo_entradas.php?registrar_entrada=exito");
} catch (PDOException $e) {
    die("Fallo al registrar entrada: " . $e->getMessage());
}
