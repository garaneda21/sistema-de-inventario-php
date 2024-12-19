<?php 

declare(strict_types=1);

// Parámetros de búsqueda
$search = $_GET['busqueda'] ?? ''; // Término de búsqueda
$page = $_GET['page'] ?? 1;      // Página actual
$itemsPerPage = 20;             // Elementos por página
$offset = ($page - 1) * $itemsPerPage; // Calcula el desplazamiento

require_once "includes/db.php";
require_once "includes/modulo_productos/tabla_productos_modelo.php";
require_once "includes/modulo_productos/tabla_productos_vista.php";

$resul = obtener_productos($pdo, $search, $itemsPerPage, $offset);
$productos = $resul["productos"];

// $pdo = null;
// $stmt = null;

