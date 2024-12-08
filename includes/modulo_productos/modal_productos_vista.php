<?php 

function datos_categorias(array $categorias) {
    foreach ($categorias as $categoria) {
        echo "<option value=\"" . $categoria["id_categoria"] . "\">" . $categoria["nombre_categoria"] . "</option>";
    }
}

function datos_unidad(array $unidades_de_medida) {
    foreach ($unidades_de_medida as $unidad) {
        echo "<option value=\"" . $unidad["id_unidad"] . "\">" . $unidad["nombre_unidad"] . "</option>";
    }
}