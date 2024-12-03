<?php
require_once 'includes/prueba_ctrl.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Inventario</title>
    <link rel="stylesheet" href="styles/layout.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <!-- Navbar superior -->
    <header class="navbar">
        <h1>Sistema de Inventario</h1>
    </header>

    <!-- Contenedor principal -->
    <div class="main-container">
        <!-- Panel lateral -->
        <aside>
            <!-- Logo -->
            <img src="https://via.placeholder.com/200x100" alt="Logo" class="logo">

            <!-- Botones principales -->
            <button>Ventas</button>
            <button>Entradas</button>

            <!-- Línea separadora -->
            <div class="separator"></div>

            <!-- Botones estándar -->
            <button class="small-button">Botón 1</button>
            <button class="small-button">Botón 2</button>
            <button class="small-button">Botón 3</button>
            <button class="small-button">Botón 4</button>
        </aside>

        <!-- Área de contenido principal -->
        <main class="content">
            <h2>Bienvenido</h2>
            <!-- Texto de prueba para probar el scroll -->

            <?php
                require_once 'includes/db.php';

                $datos = obtener_unidad_de_medida($pdo);

                $pdo = null;
                $stmt = null;
                
                print_r($datos);
            ?>
        </main>
    </div>
</body>
</html>
