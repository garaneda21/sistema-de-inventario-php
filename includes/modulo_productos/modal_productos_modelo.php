<?php 

declare(strict_types=1);

function obtener_categorias(object $pdo) {
    $consulta = "SELECT * FROM categoria";

    $instruccion = $pdo->prepare($consulta);
    $instruccion->execute();
    $resul = $instruccion->fetchAll(PDO::FETCH_ASSOC);
    return $resul;
}

function obtener_unidad(object $pdo) {
    $consulta = "SELECT * FROM unidad_de_medida";

    $instruccion = $pdo->prepare($consulta);
    $instruccion->execute();
    $resul = $instruccion->fetchAll(PDO::FETCH_ASSOC);
    return $resul;
}