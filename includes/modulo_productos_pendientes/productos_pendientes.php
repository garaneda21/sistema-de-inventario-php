<?php

declare(strict_types=1);

try {
    require_once "includes/db.php";
    require_once "productos_pendientes_modelo.php";
    require_once "productos_pendientes_vista.php";
    
    $productos = obtener_productos_pendientes($pdo);

} catch (PDOException $e) {
    die("Fallo al obtener productos pendientes: " . $e->getMessage());
}
