<?php
require_once "includes/dashboard/entradas_del_dia.php";

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Inventario</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/layout.css">
    <link rel="stylesheet" href="styles/pantalla_de_carga.css">
    <link rel="stylesheet" href="styles/pantalla_principal/dashboard.css">
    <style>
        .mensaje-vacio {
            display: flex;
            flex-direction: column;
            margin: 50px 0px;
            color: gray;
            font-size: 20px;
            text-align: center;
        }

        .mensaje-vacio svg {
            margin: 10px;
            width: 50px;
            height: 50px;
            fill: darkgray;
            align-self: center;
        }
    </style>
    <style>
        /* Filas principales */
        .row {
            padding: 8px 0;
        }

        /* Títulos de las filas principales */
        .row h4 {
            font-weight: bold;
            margin: 4px;
        }

        /* Estilo de las subtarjetas */
        .sub-card {
            list-style: none;
            padding: 0;
            margin: 0;
            background-color: var(--azul);
            border-radius: 8px;
            border: 1px solid #156ACF;
            overflow: hidden;
        }

        /* Estilo de las filas dentro de las subtarjetas */
        .sub-row {
            display: flex;
            align-items: center;
            padding: 4px;
            border-bottom: 1px solid #156ACF;
            /* Esta es la línea separadora */
            font-size: 0.9rem;
        }

        .sub-row:last-child {
            border-bottom: none;
        }

        /* Elementos dentro de las subtarjetas */
        .sub-element {
            flex: 2;
            color: white;
            font-weight: bold;
        }

        .data {
            flex: 1;
            text-align: center;
            color: white;
        }
    </style>
</head>

<body>

    <div class="main-container">
        <?php require_once "elementos_ui/barra_lateral.php" ?>

        <main class="content">

            <div class="dashboard">
                <div class="dashboard-row simple-info">
                    <div class="card-button verde">
                        Ventas del día<br>
                        <span><?= $salidas_del_dia ?></span>
                    </div>
                    <div class="card-button verde">
                        Ingresos del día<br>
                        <span>$<?= $ingresos_del_dia ?></span>
                    </div>
                    <div class="card-button azul">
                        Entradas del día<br>
                        <span><?= $entradas_del_dia ?></span>
                    </div>
                    <div class="card-button rosa">
                        Productos en bajo stock<br>
                        <span><?= $productos_en_bajo_stock ?></span>
                    </div>
                    <div class="card-button naranja">
                        Productos agotados<br>
                        <span><?= $productos_agotados ?></span>
                    </div>
                    <div class="card-button rojo">
                        Lotes por vencer<br>
                        <span><?= $lotes_por_vencer ?></span>
                    </div>
                </div>

                <div class="dashboard-row general-info">
                    <div class="info-card" style="grid-column: span 3;">
                        <h3>Ventas realizadas en el día</h3>
                    </div>
                    <div class="info-card" style="grid-column: span 3;">
                        <h3>Entradas realizadas en el día</h3>

                        <?php mostar_entradas_realizadas($entradas_realizadas_en_el_dia); ?>

                    </div>
                    <div class="info-card" style="grid-column: span 3;">
                        <h3>Productos próximos a vencer</h3>
                    </div>
                    <div class="info-card" style="grid-column: span 3;">
                        <h3>Productos con bajo stock</h3>
                    </div>
                    <div class="info-card" style="grid-column: span 3;">
                        <h3>Productos agotados</h3>
                    </div>
                </div>
            </div>

        </main>


    </div>

    <!-- <div id="loading-screen">
        <div class="loader"></div>
        <p>Cargando...</p>
    </div> -->
</body>

</html>