<?php
require_once "includes/modulo_productos/tabla_productos.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Inventario</title>
    <link rel="stylesheet" href="styles/layout.css">
    <link rel="stylesheet" href="styles/tablas.css">
    <link rel="stylesheet" href="styles/modal.css">
    <link rel="stylesheet" href="styles/formulario.css">
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
            <h1>Productos</h1>

            <!-- Botón Añadir Producto -->
            <button class="open-modal-btn" id="openModalBtn">Abrir Modal</button>

            <!-- Tabla de productos -->
            <?php
            tabla_de_productos($productos);
            ?>

            <!-- Overlay oscuro -->
            <div class="modal-overlay" id="modalOverlay">
                <!-- Contenedor del modal -->
                <div class="modal">
                    <h2>Ingresar nuevo producto al inventario</h2>

                    <form class="form-container" action="includes/vista_productos/ingresar_producto.php" method="post">
                        <label>Nombre del producto</label>
                        <input type="text" name="nombre_producto" placeholder="Ingrese nombre del producto" required>

                        <label>Precio</label>
                        <input type="number" name="precio" placeholder="$ 1000" required>



                        <label>Categoría</label>
                        <select name="categoria" required>
                            <option value="">Seleccione una opción</option>
                            <option value="opcion1">Opción 1</option>
                            <option value="opcion2">Opción 2</option>
                            <option value="opcion3">Opción 3</option>
                        </select>

                        <label>Unidad de medida</label>
                        <select name="unidad_de_medida" required>
                            <option value="">Seleccione una opción</option>
                            <option value="1">Opción 1</option>
                            <option value="2">Opción 2</option>
                            <option value="3">Opción 3</option>
                        </select>

                        <label>Stock mínimo (para alerta de bajo stock)</label>
                        <input type="number" name="stock_minimo" placeholder="Stock mínimo" required>

                        <label>Código de barras</label>
                        <input type="number" name="codigo_de_barra" placeholder="Código de barras" required>

                        <label>Tiempo para activar alerta de vencimiento (días)</label>
                        <input type="number" name="tiempo_alerta_vencimiento" placeholder="días para activar alerta de vencimiento" required>

                        
                        <button type="submit">Enviar</button>
                    </form>


                    <!-- Botones del modal -->
                    <button class="cancel-btn" id="closeModalBtn">Cancelar</button>
                </div>

            </div>
        </main>
    </div>

    <script src="js/modal.js"></script>
</body>

</html>