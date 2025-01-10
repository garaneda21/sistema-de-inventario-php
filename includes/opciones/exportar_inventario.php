<?php

declare(strict_types=1);

try {
    require_once "../../vendor/autoload.php";
    require_once "../db.php";
    require_once "exportar_inventario_modelo.php";

    
    $inventario = obtener_productos_para_exportar($pdo);

    array_unshift($inventario, ['Nombre Producto', 'Codigo de Barra', 'Unidad', 'Precio Compra', 'Precio Venta', 'Stock']);

    $xlsx = Shuchkin\SimpleXLSXGen::fromArray($inventario);
    $xlsx->downloadAs('inventario.xlsx');

    $pdo = null;
    $stmt = null;

    header("Location: ../../modulo_ventas.php?registrar_salida=exito");
} catch (PDOException $e) {
    die("Fallo al exportar inventario: " . $e->getMessage());
}