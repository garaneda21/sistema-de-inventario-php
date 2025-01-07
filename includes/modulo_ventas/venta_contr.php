<?php


function is_input_empty($cantidad) {
    if (empty($cantidad)) {
        return true;
    } else {
        return false;
    }
}

function es_cantidad_mayor_a_cero($cantidad) {
    return $cantidad > 0 ? true : false;
}

function es_cantidad_mayor_a_stock_actual($cantidad, $stock_actual) {
    return $cantidad > $stock_actual ? true : false;
}

function es_valor_numerico($cantidad) {
    for ($i=0; $i < strlen($cantidad); $i++) { 
        if ($cantidad[$i] === ",") {
            $cantidad[$i] = ".";
        } 
    }

    return is_numeric($cantidad) ? true : false;
}

function es_de_solo_dos_decimales($cantidad) {
    if (strlen(substr(strrchr($cantidad, "."), 1)) > 2) {
        return false;
    } else {
        return true;
    }
}