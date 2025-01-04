<?php 

declare(strict_types=1);

try {
    require_once "includes/db.php";
    require_once "includes/dashboard/entradas_del_dia_modelo.php";
    require_once "includes/dashboard/entradas_del_dia_vista.php";

    $entradas_del_dia = entradas_del_dia($pdo);

    $datos_salida = datos_de_salida($pdo);
    $salidas_del_dia = $datos_salida["salidas_del_dia"];
    $ingresos_del_dia = $datos_salida["ingresos_del_dia"];

    $productos_en_bajo_stock = obtener_productos_en_bajo_stock($pdo);

    $productos_agotados = obtener_productos_agotados($pdo);

    $lotes_por_vencer = obtener_lotes_por_vencer($pdo);

    $entradas_realizadas_en_el_dia = obtener_entradas_realizadas_en_el_dia($pdo);

} catch (PDOException $e) {
    die("Fallo al mostrar datos del panel principal: " . $e->getMessage());
}