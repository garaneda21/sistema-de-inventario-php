<?php 

declare(strict_types=1);

try {
    require_once "includes/db.php";
    require_once "includes/dashboard/entradas_del_dia_modelo.php";


    $entradas_del_dia = entradas_del_dia($pdo);
    
    

} catch (PDOException $e) {
    die("Fallo al registrar entrada: " . $e->getMessage());
}