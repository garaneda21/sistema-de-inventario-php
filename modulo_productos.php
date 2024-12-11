<?php
require_once "includes/modulo_productos/tabla_productos.php";
require_once "includes/modulo_productos/modal_productos.php"
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
    <link rel="stylesheet" href="styles/tablas.css">
    <link rel="stylesheet" href="styles/modal.css">
    <link rel="stylesheet" href="styles/formulario.css">
</head>

<body>
    <?php require_once "navbar.php" ?>

    <!-- Contenedor principal -->
    <div class="main-container">
        <!-- Panel lateral -->
        <?php require_once "barra_lateral.php" ?>

        <!-- Área de contenido principal -->
        <main class="content">
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

                    <form class="form-container" action="includes/modulo_productos/ingresar_producto.php" method="post">
                        <label>Nombre del producto</label>
                        <input type="text" name="nombre_producto" placeholder="Ingrese nombre del producto" required>

                        <label>Precio</label>
                        <input type="number" name="precio" placeholder="$ 1000" required>



                        <label>Categoría</label>
                        <select name="categoria" required>
                            <option value="">Seleccione una opción</option>
                            <?php 
                            datos_categorias($categorias);
                            ?>
                        </select>

                        <label>Unidad de medida</label>
                        <select name="unidad_de_medida" required>
                            <option value="">Seleccione una opción</option>
                            <?php 
                            datos_unidad($unidades_de_medida);
                            ?>
                        </select>

                        <label>Stock mínimo (para alerta de bajo stock)</label>
                        <input type="number" name="stock_minimo" placeholder="Stock mínimo" required>

                        <label>Código de barras</label>
                        <input type="number" name="codigo_de_barra" placeholder="Código de barras">

                        <label>Tiempo para activar alerta de vencimiento (días)</label>
                        <input type="number" name="tiempo_alerta_vencimiento" placeholder="días para activar alerta de vencimiento">

                        
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