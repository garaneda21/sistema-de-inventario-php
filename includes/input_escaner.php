<?php 

declare(strict_types=1);

$codigo_de_barra = $_GET["input_escaner"];

try {
    require_once "db.php";
    require_once "input_escaner_modelo.php";
    require_once "input_escaner_vista.php";

    /* Comprobar Errores 
    */

    $producto_obtenido_por_escaner = obtener_producto($pdo, $codigo_de_barra);

    var_dump($producto_obtenido_por_escaner);

} catch (\Throwable $th) {
    //throw $th;
}

var_dump($codigo_de_barra);