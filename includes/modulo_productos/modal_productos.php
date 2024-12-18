<?php 

declare(strict_types=1);

require_once "includes/db.php";
require_once "includes/modulo_productos/modal_productos_modelo.php";
require_once "includes/modulo_productos/modal_productos_vista.php";

$unidades_de_medida = obtener_unidad($pdo);

// Cerrar conexion con base de datos (hacer siempre);
$pdo = null;
$stmt = null;
