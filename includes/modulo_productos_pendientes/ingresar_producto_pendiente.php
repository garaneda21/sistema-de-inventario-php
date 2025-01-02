<?php 

declare(strict_types=1);

$nombre_producto = $_POST["nombre_producto"];
$codigo_de_barra = $_POST["codigo_de_barra"];

try {
    require_once "../db.php";
    require_once "ingresar_producto_pendiente_modelo.php";

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


