<?php

declare(strict_types=1);

function mostrar_errores_de_venta()
{
    if (!isset($_SESSION["errores_en_cantidad_ingresada"])) {
        return;
    }

    $errores = $_SESSION["errores_en_cantidad_ingresada"];
    unset($_SESSION["errores_en_cantidad_ingresada"]);

    echo "
        <div id='errorModal' class='error-modal' onclick='if(event.target === this) this.style.display='none''>
        <div class='error-modal-content'>
            <h2>Errores</h2>
            <button id='error-close-btn' class='close-btn'>&times;</button>
    ";

    foreach ($errores as $error) {
        echo "
            <div class='error-card'>
                <p>Error al ingresar producto: " . $error["nombre_producto"] . "</p>
                <h3>" . $error["mensaje"] . "</h3>
            </div>
        ";
    }

    echo "
            </div>
        </div>
    ";
}
