<?php 
declare(strict_types=1);

function lista_productos_pendientes(array $productos) {

    if (!$productos) {
        echo "<p class='empty-message'>No hay tarjetas disponibles</p>";
        return;
    }

    foreach ($productos as $producto) {
        [
            'id_producto'     => $id_producto,
            'nombre_producto' => $nombre_producto,
            'codigo_de_barra' => $codigo_de_barra,
            'nombre_unidad'   => $nombre_unidad
        ] = $producto;

        echo "
        <div class='card'>
            <div class='card-content'>
                <h3>$nombre_producto</h3>
                <p>Unidad: $nombre_unidad</p>
                <p>$codigo_de_barra</p>
            </div>
            <button onclick=\"mostrar_modal_actualizar_producto('$id_producto', '$codigo_de_barra', '$nombre_producto');\">Editar producto</button>
        </div>
        ";
    }         
}
