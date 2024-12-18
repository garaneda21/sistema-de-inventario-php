<?php 

declare(strict_types=1);

$nombre_producto            = $_POST["nombre_producto"];
$costo                      = (int) $_POST["costo"];
$precio                     = (int) $_POST["precio"];
$unidad_de_medida           = (int) $_POST["unidad_de_medida"];
$stock_minimo               = (int) $_POST["stock_minimo"];
$codigo_de_barra            = (string) $_POST["codigo_de_barra"];
$requiere_fecha_vencimiento = (int) $_POST["requiere_fecha_vencimiento"];
$tiempo_alerta_vencimiento  = (int) $_POST["tiempo_alerta_vencimiento"];

try {
    require_once "../db.php";
    require_once "ingresar_producto_modelo.php";

    /* Comprobar Errores
        - Inputs Vacíos
        - Strings más largos que lo permitido
        - Input Incorrecto (string en campo numérico)
        - Producto que ya existe    
    */

    ingresar_producto($pdo, $nombre_producto, $costo, $precio, $unidad_de_medida, $stock_minimo, $codigo_de_barra, $requiere_fecha_vencimiento, $tiempo_alerta_vencimiento);

    // Cerrar conexion con base de datos (hacer siempre);
    $pdo = null;
    $stmt = null;

    header("Location: ../../modulo_productos.php?ingresar_producto=exito");
} catch (PDOException $e) {
    die("Fallo al ingresar producto: " . $e->getMessage());
}


