<?php 

function datos_unidad(array $unidades_de_medida) {
    foreach ($unidades_de_medida as $unidad) {
        echo "<option value=\"" . $unidad["id_unidad"] . "\">" . $unidad["nombre_unidad"] . "</option>";
    }
}
