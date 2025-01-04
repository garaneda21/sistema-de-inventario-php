<?php 

declare(strict_types=1);

$nombre_producto = $_POST["nombre_producto"];
$unidad_de_medida = (int) $_POST["unidad_de_medida"];
$codigo_de_barra = $_POST["codigo_de_barra"];
$modulo_origen = $_POST["modulo_origen"];

try {
    require_once "../db.php";
    require_once "ingresar_producto_pendiente_modelo.php";

    /* Comprobar Errores
        - Inputs Vacíos
        - Strings más largos que lo permitido
        - Input Incorrecto (string en campo numérico)
        - Producto que ya existe    
    */

    ingresar_producto($pdo, $nombre_producto, $unidad_de_medida, $codigo_de_barra);

    $pdo = null;
    $stmt = null;

    // añadir productos a la sessión

    header("Location: $modulo_origen?ingresar_producto=exito");
} catch (PDOException $e) {
    die("Fallo al ingresar producto: " . $e->getMessage());
}


