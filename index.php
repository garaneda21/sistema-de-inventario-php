<?php
require_once "includes/dashboard/entradas_del_dia.php"
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
    <link rel="stylesheet" href="styles/dashboard.css">
</head>

<body>

    <!-- Contenedor principal -->
    <div class="main-container">
        <!-- Panel lateral -->
        <?php require_once "barra_lateral.php" ?>

        <!-- Área de contenido principal -->
        <main class="content">

            <div class="dashboard">
                <!-- Primera fila: 6 elementos en la cuadrícula -->
                <div class="dashboard-row simple-info">
                    <div class="card-button verde">
                        Ventas del día<br>
                        <span>123</span>
                    </div>
                    <div class="card-button verde">
                        Ingresos del día<br>
                        <span>$50000</span>
                    </div>
                    <div class="card-button azul">
                        Entradas del día<br>
                        <span><?= $entradas_del_dia ?></span>
                    </div>
                    <div class="card-button rosa">
                        Productos en bajo stock<br>
                        <span>20</span>
                    </div>
                    <div class="card-button naranja">
                        Productos agotados<br>
                        <span>5</span>
                    </div>
                    <div class="card-button rojo">
                        Productos por vencer<br>
                        <span>3</span>
                    </div>
                </div>

                <!-- Segunda fila: Elementos con 2 o 4 columnas de espacio -->
                <div class="dashboard-row general-info">
                    <div class="info-card" style="grid-column: span 3;">
                        Ventas realizadas en el día
                    </div>
                    <div class="info-card" style="grid-column: span 3;">
                        Entradas realizadas en el día
                    </div>
                    <div class="info-card" style="grid-column: span 3;">
                        Productos próximos a vencer
                    </div>
                    <div class="info-card" style="grid-column: span 3;">
                        Productos con bajo stock
                    </div>
                    <div class="info-card" style="grid-column: span 3;">
                        Productos agotados
                    </div>
                </div>
            </div>

        </main>


    </div>

    <!-- <div id="loading-screen">
        <div class="loader"></div>
        <p>Cargando...</p>
    </div> -->

    <!-- <script src="js/pantalla_de_carga.js"></script> -->
</body>

</html>
