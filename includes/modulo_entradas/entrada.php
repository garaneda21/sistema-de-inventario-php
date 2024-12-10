<?php 

declare(strict_types=1);


// require_once "includes/db.php";

$productos = $_POST["productos"];

foreach ($productos as $producto) {
    var_dump($producto);
    echo "<br>";
}