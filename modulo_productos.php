<?php
require_once "includes/vista_productos/tabla_productos.php"
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
            <a href="#" class="add-product-btn">Añadir Producto</a>

            <!-- Tabla de productos -->
            <?php
            tabla_de_productos($productos);
            ?>


            <!-- Botón que abre el modal -->
            <button class="open-modal-btn" id="openModalBtn">Abrir Modal</button>

            <!-- Overlay oscuro -->
            <div class="modal-overlay" id="modalOverlay">
                <!-- Contenedor del modal -->
                <div class="modal">
                    <h2>Ingresar nuevo producto al inventario</h2>

                    <form class="form-container">
                        <label for="name">Nombre del producto</label>
                        <input type="text" id="name" name="name" placeholder="Ingrese nombre del producto" required>

                        <label for="name">Precio</label>
                        <input type="number" id="name" name="name" placeholder="$ 1000" required>

                        <label for="category">Categoría</label>
                        <select id="category" name="category" required>
                            <option value="">Seleccione una opción</option>
                            <option value="opcion1">Opción 1</option>
                            <option value="opcion2">Opción 2</option>
                            <option value="opcion3">Opción 3</option>
                        </select>

                        <label for="category">Unidad de medida</label>
                        <select id="category" name="category" required>
                            <option value="">Seleccione una opción</option>
                            <option value="opcion1">Opción 1</option>
                            <option value="opcion2">Opción 2</option>
                            <option value="opcion3">Opción 3</option>
                        </select>

                        <label for="name">Stock mínimo (para alerta de bajo stock)</label>
                        <input type="number" id="name" name="name" placeholder="Stock mínimo" required>

                        <label for="name">Código de barras</label>
                        <input type="number" id="name" name="name" placeholder="Código de barras" required>

                        <label for="name">Tiempo para activar alerta de vencimiento (días)</label>
                        <input type="number" id="name" name="name" placeholder="días para activar alerta de vencimiento" required>

                        
                        <button type="submit">Enviar</button>
                    </form>


                    <!-- Botones del modal -->
                    <button class="accept-btn" id="acceptBtn">Aceptar</button>
                    <button class="cancel-btn" id="closeModalBtn">Cancelar</button>
                </div>
            </div>
        </main>
    </div>

    <script src="js/modal.js"></script>
</body>

</html>