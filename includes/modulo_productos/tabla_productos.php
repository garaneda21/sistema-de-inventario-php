<?php 

declare(strict_types=1);

require_once "includes/db.php";
require_once "includes/modulo_productos/tabla_productos_modelo.php";
require_once "includes/modulo_productos/tabla_productos_vista.php";

$productos = obtener_productos($pdo);

// Cerrar conexion con base de datos (hacer siempre);
// $pdo = null;
// $stmt = null;

