<?php

declare(strict_types=1);

function obtener_unidad_de_medida(object $pdo) {
    // realizar consulta de forma segura
    $consulta = "SELECT * FROM unidad_de_medida WHERE id_unidad = '2';";
    $instruccion = $pdo->prepare($consulta);
    $instruccion->execute();

    // obtener resultado de la base de datos como un array asociativo (php)
    $resultado = $instruccion->fetch(PDO::FETCH_ASSOC);
    return $resultado;
}