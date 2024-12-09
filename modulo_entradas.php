<?php
require_once "includes/modulo_entradas/lista_productos.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Inventario</title>
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles/layout.css">
    <link rel="stylesheet" href="styles/cuadricula_de_productos.css">
    <link rel="stylesheet" href="styles/barra_lateral_de_productos.css">
    <link rel="stylesheet" href="styles/tablas_ingreso_producto.css">
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

            <div class="product-grid">

                <?php
                insertar_productos($productos);
                ?>

            </div>

        </main>

        <div class="sidebar-productos">

            <form action="includes/modulo_entradas/entrada.php" method="post">

                <table class="table-adjusted">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad en el Lote</th>
                            <th>Unidad del Producto</th>
                            <th>Fecha de Vencimiento del lote</th>
                            <th>Quitar</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-productos">
                        <tr>
                            <td>hola</td>
                            <td>
                                <input class="table-input" type="number">
                            </td>
                            <td>KILOS</td>
                            <td>
                                <input type="date" class="table-input" id="dateInput">
                            </td>
                            <td>❌</td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-footer">
                    <button type="submit" class="button-submit">Ingresar Productos al Inventario</button>
                </div>
            </form>
        </div>
    </div>

    <script src="js/añadir_a_tabla_ingreso.js"></script>
</body>

</html>