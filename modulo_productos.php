

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

            <h1>Productos</h1>
            <!-- Botón Añadir Producto -->
            <a href="#" class="add-product-btn">Añadir Producto</a>

            <!-- Tabla de productos -->
            <table class="products-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Total Vendidos</th>
                        <th>Stock Actual</th>
                        <th>Stock Mínimo</th>
                        <th>Código de Barra</th>
                        <th>Tiempo para Alerta <br> de Vencimiento</th>
                        <th>Categoría</th>
                        <th>Unidad de Medida</th>
                        <th>Editar Entrada</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                    require_once "includes/db.php";
                    require_once "includes/vista_productos/tabla_productos_modelo.php";

                    $productos = obtener_productos($pdo);

                    foreach ($productos as $producto) {
                        
                        echo "<tr>";
                        echo "    <td>" . $producto["nombre_producto"] . "</td>";
                        echo "    <td>" . $producto["total_vendidos"] . "</td>";
                        echo "    <td>" . $producto["stock_actual"] . "</td>";
                        echo "    <td>" . $producto["stock_minimo"] . "</td>";
                        echo "    <td>" . $producto["codigo_de_barra"] . "</td>";
                        echo "    <td>" . $producto["tiempo_alerta_vencimiento"] . "</td>";
                        echo "    <td>" . $producto["nombre_categoria"] . "</td>";
                        echo "    <td>" . $producto["nombre_unidad"] . "</td>";
                        echo "    <td> <button>Lapiz</button> </td>";
                        echo "</tr>";
                    }         

                    ?>
                </tbody>
            </table>

        </main>
    </div>
</body>

</html>