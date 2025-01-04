<?php 

declare(strict_types=1);

function mostar_entradas_realizadas(array $entradas_realizadas_en_el_dia)  {

    $contador = 1;
    $id_entrada_anterior = 0;

    $timestamp = "2013-09-30 01:16:06";

    foreach ($entradas_realizadas_en_el_dia as $entrada) {
        // echo "<pre>";
        // print_r($entrada);
        // echo "</pre>";

        [
            'nombre_producto' => $nombre_producto,
            'nombre_unidad' => $nombre_unidad,
            'id_entrada' => $id_entrada,
            'cantidad_entrada' => $cantidad_entrada,
            'fecha_entrada' => $fecha_entrada
        ] = $entrada;
        

        if ($id_entrada_anterior !== $id_entrada) {
            $id_entrada_anterior = $id_entrada;
            
            // cerrar tarjeta anterior
            if ($id_entrada_anterior !== 0) {
                echo "</ul>";
                echo "</section>";
            }
            
            // abrir nueva tarjeta
            echo "<section class='row'>";
            echo "<h4>Entrada $contador</h4>";
            echo "<ul class='sub-card'>";
            
            $contador++;
        }

        echo "
            <li class='sub-row'>
                <span class='sub-element'>$nombre_producto</span>
                <span class='data'>$cantidad_entrada $nombre_unidad</span>
                <span class='data'>" . date("H:i:s", strtotime($fecha_entrada)) . "</span>
            </li>
        ";
    }
}