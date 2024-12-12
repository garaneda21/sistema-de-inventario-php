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
    <link rel="stylesheet" href="styles/modulo_productos/modal_ingreso_producto.css">
    <!-- <link rel="stylesheet" href="styles/formulario.css"> -->
</head>

<body>

    <!-- Contenedor principal -->
    <div class="main-container">
        <!-- Panel lateral -->
        <?php require_once "barra_lateral.php" ?>

        <!-- Área de contenido principal -->
        <main class="content">

            <!-- Botón para abrir el modal -->
            <button id="open-modal-btn" class="button-submit">Ingresar nuevo producto</button>

            <!-- Tabla de productos -->
            <?php
            tabla_de_productos($productos);
            ?>

            <!-- Modal -->
            <div id="productModal" class="modal">
                <div class="modal-content">
                    <div class="modal-title">
                        Ingresar Nuevo Producto
                    </div>

                    <!-- Cerrar botón -->
                    <button id="close-btn" class="close-btn">&times;</button>

                    <!-- Cuerpo del modal -->
                    <div class="modal-body">
                        <form id="product-form" action="includes/modulo_productos/ingresar_producto.php" method="post">
                            <div class="modal-row">
                                <label for="product-name" class="modal-label">Nombre del Producto:</label>
                                <input type="text" id="product-name" name="nombre_producto" class="modal-input" placeholder="Empanada de queso" required>
                            </div>
                            <div class="modal-row">
                                <label for="product-price" class="modal-label">Precio:</label>
                                <input type="number" id="product-price" name="precio" class="modal-input" min="0" placeholder="$2000" required>
                            </div>
                            <div class="modal-row">
                                <label for="product-category" class="modal-label">Categoría:</label>
                                <select id="product-category" name="categoria" class="modal-input" required>
                                    <option value="">Seleccione una categoría...</option>
                                    <?php
                                    datos_categorias($categorias);
                                    ?>
                                </select>
                            </div>
                            <div class="modal-row">
                                <label for="unit-measure" class="modal-label">Unidad de Medida:</label>
                                <select id="unit-measure" name="unidad_de_medida" class="modal-input" required>
                                    <option value="">Seleccione una unidad de medida para el producto...</option>
                                    <?php
                                    datos_unidad($unidades_de_medida);
                                    ?>
                                </select>
                            </div>
                            <div class="modal-row">
                                <label for="min-stock" class="modal-label">Stock Mínimo (dependerá de la unidad):</label>
                                <input type="number" id="min-stock" name="stock_minimo" min="0" class="modal-input" required>
                            </div>
                            <div class="modal-row">
                                <label for="barcode" class="modal-label">Código de Barras (puede quedar vacío):</label>
                                <input type="text" id="barcode" name="codigo_de_barra" class="modal-input" placeholder="Usar escaner aquí...">
                            </div>
                            <div class="modal-row">
                                <label for="requires-expiry" class="modal-label">Requiere Fecha de Vencimiento:</label>
                                <select id="requires-expiry" name="requiere_fecha_vencimiento" class="modal-input" required>
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="modal-row" id="expiry-time-container" hidden>
                                <label for="expiry-time" class="modal-label">Tiempo para Advertencia de Vencimiento (días):</label>
                                <input type="number" id="expiry-time" name="tiempo_alerta_vencimiento" class="modal-input">
                            </div>
                            <div class="modal-row">
                                <button type="submit" class="modal-submit">Guardar Producto</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </main>

    </div>


    <script src="js/modal.js"></script>
</body>

</html>