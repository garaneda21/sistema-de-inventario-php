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
    <link rel="stylesheet" href="styles/tablas.css">
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

            <h1>Productos</h1>
            <!-- Botón Añadir Producto -->
            <a href="#" class="add-product-btn">Añadir Producto</a>

            <!-- Tabla de productos -->
            <table class="products-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Fila de ejemplo -->
                    <tr>
                        <td>1</td>
                        <td>Producto A</td>
                        <td>Electrónica</td>
                        <td>$100.00</td>
                        <td>Un excelente producto.</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Producto B</td>
                        <td>Hogar</td>
                        <td>$50.00</td>
                        <td>Muy útil para la casa.</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Producto C</td>
                        <td>Deporte</td>
                        <td>$30.00</td>
                        <td>Ideal para actividad física.</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Producto C</td>
                        <td>Deporte</td>
                        <td>$30.00</td>
                        <td>Ideal para actividad física.</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Producto C</td>
                        <td>Deporte</td>
                        <td>$30.00</td>
                        <td>Ideal para actividad física.</td>
                    </tr>
                </tbody>
            </table>

        </main>
    </div>
</body>

</html>