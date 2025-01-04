<?php

declare(strict_types=1);

try {
    require_once "includes/db.php";

    $consulta = "SELECT count(*) as cant_productos_pendientes FROM producto WHERE por_registrar = 1;";
    $stmt = $pdo->prepare($consulta);
    $stmt->execute();

    $resul = $stmt->fetch(PDO::FETCH_ASSOC);

    echo $resul["cant_productos_pendientes"];
} catch (PDOException $e) {
    die("Fallo al contar los productos pendientes para la barra lateral: " . $e->getMessage());
}


