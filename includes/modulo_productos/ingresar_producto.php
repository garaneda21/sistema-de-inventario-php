<?php 

declare(strict_types=1);

$nombre_producto            = $_POST["nombre_producto"];
$precio                     = (int) $_POST["precio"];
$categoria                  = (int) $_POST["categoria"];
$unidad_de_medida           = (int) $_POST["unidad_de_medida"];
$stock_minimo               = (int) $_POST["stock_minimo"];
$codigo_de_barra            = $_POST["codigo_de_barra"];
$tiempo_alerta_vencimiento  = (int) $_POST["tiempo_alerta_vencimiento"];

require_once "../db.php";
require_once "ingresar_producto_modelo.php";

// Comprobar Errores
// ...
// Comprobar Errores

// $resul = ingresar_producto($pdo, $nombre_producto, $precio, $categoria, $unidad_de_medida, $stock_minimo, $codigo_de_barra, $tiempo_alerta_vencimiento);

var_dump($resul);

// Cerrar conexion con base de datos (hacer siempre);
$pdo = null;
$stmt = null;