<?php 

declare(strict_types=1);

function obtener_productos(object $pdo) {
    // realizar consulta de forma segura
    $consulta = "SELECT * FROM producto;";
    $instruccion = $pdo->prepare($consulta);
    $instruccion->execute();

    // obtener resultado de la base de datos como un array asociativo (php)
    $resul = $instruccion->fetch(PDO::FETCH_ASSOC);
    return $resul;
}