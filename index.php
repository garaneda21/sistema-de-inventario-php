<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Inventario</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/layout.css">
    <link rel="stylesheet" href="styles/dashboard.css">
</head>

<body>
    <!-- Navbar superior -->
    <header class="navbar">
        <h1>Sistema de Inventario</h1>
    </header>

    <!-- Contenedor principal -->
    <div class="main-container">
        <!-- Panel lateral -->
        <?php require_once "barra_lateral.php" ?>

        <!-- Área de contenido principal -->
        <main class="content">

            <div class="dashboard">
                <!-- Primera fila: 6 elementos en la cuadrícula -->
                <div class="dashboard-row simple-info">
                    <div class="card-button verde">Ventas del día<br><span>123</span></div>
                    <div class="card-button verde">Ingresos del día<br><span>$50000</span></div>
                    <div class="card-button azul">Entradas del día<br><span>45</span></div>
                    <div class="card-button rosa">Productos en bajo stock<br><span>20</span></div>
                    <div class="card-button naranja">Productos agotados<br><span>5</span></div>
                    <div class="card-button rojo">Productos por vencer<br><span>3</span></div>
                </div>

                <!-- Segunda fila: Elementos con 2 o 4 columnas de espacio -->
                <div class="dashboard-row general-info">
                    <div class="info-card" style="grid-column: span 3;">Resumen de Stock</div>
                    <div class="info-card" style="grid-column: span 3;">Análisis de Ventas</div>
                    <div class="info-card" style="grid-column: span 3;">Tendencias de Mercado</div>
                    <div class="info-card" style="grid-column: span 3;">Proveedores Actuales</div>
                    <div class="info-card" style="grid-column: span 3;">Historial Entradas</div>
                </div>
            </div>



        </main>
    </div>
</body>

</html>