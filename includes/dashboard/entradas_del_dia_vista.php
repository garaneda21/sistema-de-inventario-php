<?php 

declare(strict_types=1);

function mostrar_entradas_realizadas(array $entradas_realizadas_en_el_dia)  {

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

function mostrar_ventas_realizadas(array $entradas_realizadas_en_el_dia)  {

    if (!$entradas_realizadas_en_el_dia) {
        echo "
            <div class='mensaje-vacio'>
                No se han realizado ventas hoy
                
                <svg xmlns='http://www.w3.org/2000/svg' id='Filled' viewBox='0 0 24 24' width='512' height='512'><path d='M24,9a3,3,0,0,0-3-3H18A6,6,0,0,0,6,6H3A3,3,0,0,0,0,9V19a5.006,5.006,0,0,0,5,5H19a5.006,5.006,0,0,0,5-5ZM8,6a4,4,0,0,1,8,0Z'/></svg>
            </div>
        ";

        return;
    }
}

function mostar_productos_por_vencer($productos_por_vencer) {
    if (!$productos_por_vencer) {
        echo "
            <div class='mensaje-vacio'>
                No hay productos que vencerán en el inventario
                
                <svg xmlns='http://www.w3.org/2000/svg' id='Layer_1' data-name='Layer 1' viewBox='0 0 24 24'>
                <path d='m20.905,3.095c-.458-2.105-2.482-3.095-3.905-3.095-1.178,0-2,.78-2,1.898v4.976l-1.437-1.437-1.415,1.414,1.793,1.793-1.269,1.269-2.543-2.543-1.414,1.414,2.543,2.543-1.4,1.4-3.293-3.293-1.414,1.414,3.293,3.293-1.08,1.08c-1.374-1.155-3.004-2.015-4.808-2.426l-.815-.186-.327.769c-.965,2.271-1.415,5.328-1.415,9.622v1h1c4.294,0,7.352-.45,9.622-1.416l.769-.327-.186-.814c-.41-1.804-1.27-3.434-2.426-4.808l1.08-1.08,3.293,3.293,1.414-1.414-3.293-3.293,1.4-1.4,2.543,2.543,1.414-1.414-2.543-2.543,1.269-1.269,1.793,1.793,1.414-1.414-1.437-1.438h4.976c1.118,0,1.898-.822,1.898-2,0-1.423-.989-3.447-3.095-3.905ZM4.5,21c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z'/>
                </svg>

            </div>
        ";

        return;
    }
}

function mostar_productos_con_bajo_stock($productos_con_bajo_stock) {
    if (!$productos_con_bajo_stock) {
        echo "
            <div class='mensaje-vacio'>
                Por Implementar !
                
                <svg xmlns='http://www.w3.org/2000/svg' id='Layer_1' data-name='Layer 1' viewBox='0 0 24 24' width='512' height='512'><path d='M10.4,16.9l2.12,2.12-4.25,4.25c-.49,.49-1.13,.73-1.77,.73s-1.28-.24-1.77-.73L.45,19.07l2.1-2.14,2.45,2.4V0h3V19.29l2.4-2.4Zm3.6,6.1h10V13H14v10ZM16,1V9h8V1h-8Z'/></svg>
            </div>
        ";

        return;
    }
}

function mostar_productos_agotados($productos_agotados) {
    if (!$productos_agotados) {
        echo "
            <div class='mensaje-vacio'>
                Por Implementar !
                
                <svg xmlns='http://www.w3.org/2000/svg' id='Layer_1' data-name='Layer 1' viewBox='0 0 24 24'>
                    <path d='m23.561.439c-.586-.586-1.535-.586-2.121,0l-2.806,2.806c-1.847-1.403-4.141-2.246-6.633-2.246C5.935,1,1,5.935,1,12c0,2.493.843,4.787,2.246,6.633l-2.806,2.806c-.586.586-.586,1.535,0,2.121.293.293.677.439,1.061.439s.768-.146,1.061-.439l2.806-2.806c1.847,1.403,4.141,2.246,6.633,2.246,6.065,0,11-4.935,11-11,0-2.493-.843-4.787-2.246-6.633l2.806-2.806c.586-.585.586-1.536,0-2.121ZM4,12c0-4.411,3.589-8,8-8,1.665,0,3.211.512,4.493,1.386l-11.107,11.107c-.874-1.282-1.386-2.828-1.386-4.493Zm16,0c0,4.411-3.589,8-8,8-1.665,0-3.211-.512-4.493-1.386l11.107-11.107c.874,1.282,1.386,2.828,1.386,4.493Z'/>
                </svg>
            </div>
        ";

        return;
    }
}