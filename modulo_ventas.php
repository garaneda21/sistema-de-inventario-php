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
        <?php require_once "barra_lateral.php" ?>

        <!-- Área de contenido principal -->
        <main class="content">

            <div class="product-grid">
                <!-- Producto 1 -->
                <div class="product-item" onclick="agregar_a_tabla(0, 'coca cola', 1100);">
                    <div class="product-name">Delicioso Mezcla Gourmet para Toda Ocasión</div>
                    <div class="product-price">$10.00</div>
                    <span class="stock">Stock: 25 unidades</span>
                    <span class="category">Herramientas</span>
                </div>

                <div class="product-item" onclick="agregar_a_tabla(0, 'pan', 1100);">
                    <div class="product-name">Delicioso Mezcla Gourmet para Toda Ocasión</div>
                    <div class="product-price">$10.00</div>
                    <span class="stock">Stock: 25 unidades</span>
                    <span class="category">Herramientas</span>
                </div>

                <div class="product-item" onclick="agregar_a_tabla(0, 'zanahoria', 1100);">
                    <div class="product-name">Delicioso Mezcla Gourmet para Toda Ocasión</div>
                    <div class="product-price">$10.00</div>
                    <span class="stock">Stock: 25 unidades</span>
                    <span class="category">Herramientas</span>
                </div>
            </div>

        </main>

        <div class="sidebar-productos">
            <table class="products-table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Quitar</th>
                    </tr>
                </thead>
                <tbody id="tabla-productos">
                    <tr>
                        <td>hola</td>
                        <td>hola</td>
                        <td>hola</td>
                        <td>❌</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="js/añadir_producto.js"></script>
</body>

</html>