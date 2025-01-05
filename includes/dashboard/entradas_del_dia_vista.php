<?php 

declare(strict_types=1);

function mostar_entradas_realizadas(array $entradas_realizadas_en_el_dia)  {

    if (!$entradas_realizadas_en_el_dia) {
        echo "
            <div class='mensaje-vacio'>
                No se han ingresado productos hoy 
                
                <svg xmlns='http://www.w3.org/2000/svg' id='Layer_1' data-name='Layer 1' viewBox='0 0 24 24' width='512' height='512'><path d='M15,18H0V4A3,3,0,0,1,3,1h9a3,3,0,0,1,3,3Zm2,0h7V13H17ZM19,5H17v6h7V10A5.006,5.006,0,0,0,19,5ZM3.058,20A2.424,2.424,0,0,0,3,20.5a2.5,2.5,0,0,0,5,0,2.424,2.424,0,0,0-.058-.5Zm14,0a2.424,2.424,0,0,0-.058.5,2.5,2.5,0,0,0,5,0,2.424,2.424,0,0,0-.058-.5Z'/></svg>
            </div>
        ";

        return;
    }

    $contador = 1;
    $id_entrada_anterior = 0;


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