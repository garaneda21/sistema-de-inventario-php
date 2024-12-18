<?php 

declare(strict_types=1);

function obtener_unidad(object $pdo) {
    $consulta = "SELECT * FROM unidad_de_medida";

    $stmt = $pdo->prepare($consulta);
    $stmt->execute();
    $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resul;
}
