<?php 

declare(strict_types=1);

require_once "includes/db.php";
require_once "includes/modulo_ventas/lista_productos_modelo.php";
require_once "includes/modulo_ventas/lista_productos_vista.php";

$productos = obtener_productos($pdo);

