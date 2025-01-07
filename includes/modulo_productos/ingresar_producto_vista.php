<?php

declare(strict_types=1);

function mostrar_errores_de_producto()
{
    if (!isset($_SESSION["errores_producto"])) {
        return;
    }

    $errores = $_SESSION["errores_producto"];
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
                <h3>" . $error . "</h3>
            </div>
        ";
    }

    echo "
            </div>
        </div>
    ";
}
