<?php

declare(strict_types=1);

$id_producto        = (int) $_POST["id_producto"];
$codigo_de_barra    = $_POST["codigo_de_barra"];
$nombre_producto    = $_POST["nombre_producto"];
$costo              = (int) $_POST["costo"];
$precio             = (int) $_POST["precio"];
$stock_minimo       = (int) $_POST["stock_minimo"];
$requiere_fecha_vencimiento = (int) $_POST["requiere_fecha_vencimiento"];
$tiempo_alerta_vencimiento  = (int) $_POST["tiempo_alerta_vencimiento"];

try {
    require_once "../db.php";
    require_once "actualizar_productos_pendientes_modelo.php";

    /* Comprobar Errores
        - Inputs Vacíos
        - Strings más largos que lo permitido
        - Input Incorrecto (string en campo numérico)
        - Producto que ya existe    
    */

    actualizar_producto_pendiente($pdo, $id_producto, $codigo_de_barra, $nombre_producto, $costo, $precio, $stock_minimo, $requiere_fecha_vencimiento, $tiempo_alerta_vencimiento);
    
    $pdo = null;
    $stmt = null;

    header("Location: ../../modulo_productos_pendientes.php?ingresar_producto=exito");
} catch (PDOException $e) {
    die("Fallo al actualizar producto pendiente: " . $e->getMessage());
}
