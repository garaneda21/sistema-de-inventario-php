<?php

declare(strict_types=1);

function nombre_supera_varchar_maximo (string $nombre_producto) {
    strlen($nombre_producto) > 250 ? true : false;
}

function codigo_supera_varchar_maximo (string $codigo_de_barra) {
    strlen($codigo_de_barra) > 25 ? true : false;
}
