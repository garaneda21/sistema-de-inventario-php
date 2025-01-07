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
    require_once "ingresar_producto_contr.php";

    /* Comprobar Errores
        - Strings más largos que lo permitido
        - Input Incorrecto (string en campo numérico)
        - Producto que ya existe    
    */
    // MANEJO DE ERRORES
    $errores = [];

    if (nombre_supera_varchar_maximo($nombre_producto)) {
        $errores["nombre_supera_limite"] = "El nombre del producto supera el límite de caracteres de la base de datos (250 caracteres). El nombre debe se más corto";
    }
    if (codigo_supera_varchar_maximo($codigo_de_barra)) {
        $errores["codigo_supera_limite"] = "El codigo de barras supera el límite de la base de datos (25 caracteres). No se puede ingresar ese codigo";
    }
    if (!is_numeric($precio)) {
        $errores["precio_no_numerico"] = "El precio ingresado debe ser un número";
    }
    if (!is_numeric($costo)) {
        $errores["costo_no_numerico"] = "El precio de compra ingresado debe ser un número";
    }
    if (!is_numeric($stock_minimo)) {
        $errores["stock_minimo_no_numerico"] = "El stock minimo debe ser un número";
    }
    if (!is_numeric($tiempo_alerta_vencimiento)) {
        $errores["tiempo_alerta_no_numerico"] = "El tiempo para advertencia de vencimiento debe ser un número";
    }

    require_once "../config_session.php";

    if ($errores) {
        $_SESSION["errores_producto"] = $errores;
        header("Location: ../../modulo_productos.php");
        die();
    }

    ingresar_producto($pdo, $nombre_producto, $costo, $precio, $unidad_de_medida, $stock_minimo, $codigo_de_barra, $requiere_fecha_vencimiento, $tiempo_alerta_vencimiento);

    // Cerrar conexion con base de datos (hacer siempre);
    $pdo = null;
    $stmt = null;

    header("Location: ../../modulo_productos.php?ingresar_producto=exito");
} catch (PDOException $e) {
    die("Fallo al ingresar producto: " . $e->getMessage());
}
