<?php
require_once "includes/modulo_entradas/lista_productos.php"
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
    <link rel="stylesheet" href="styles/cuadricula_de_productos.css">
    <link rel="stylesheet" href="styles/barra_lateral_de_productos.css">
    <link rel="stylesheet" href="styles/tablas_ingreso_producto.css">
</head>

<body>
    <?php require_once "navbar.php" ?>

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
                            <th>Cantidad</th>
                            <th>Unidad</th>
                            <th>Fecha de Vencimiento</th>
                            <th>Quitar</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-productos">

                    </tbody>
                </table>

                <div class="form-footer">
                    <button type="submit" class="button-submit">
                        <div class="icon icon-big">
                            <img src="img/botones/completed.png" alt="">
                        </div>
                        <p>Ingresar productos al inventario</p>
                    </button>
                </div>
            </form>

        </div>
    </div>

    <script src="js/agregar_a_tabla_ingreso.js"></script>
</body>

</html>