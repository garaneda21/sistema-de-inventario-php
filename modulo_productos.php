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
    <link rel="stylesheet" href="styles/modulo_ventas/busqueda.css">
    <link rel="stylesheet" href="styles/modulo_productos/modal_ingreso_producto.css">
    <link rel="stylesheet" href="styles/modulo_productos/modal_de_exito.css">
    <link rel="stylesheet" href="styles/notificacion.css">
    <!-- <link rel="stylesheet" href="styles/formulario.css"> -->
</head>

<body>

    <!-- Contenedor principal -->
    <div class="main-container">
        <!-- Panel lateral -->
        <?php require_once "elementos_ui/barra_lateral.php" ?>

        <!-- Área de contenido principal -->
        <main class="content">

            <form method="get" class="search-pagination-form">
                <!-- Barra de búsqueda -->
                <div class="search-container">
                    <input type="text" name="busqueda" placeholder="Buscar producto..." class="search-input" value="<?php echo isset($_GET['busqueda']) ? htmlspecialchars($_GET['busqueda']) : ''; ?>">
                    <button type="submit" class="search-button">Buscar</button>
                </div>


                <!-- <div class="pagination-container">
                    <button type="submit" name="pagina" value="1" class="pagination-button">1</button>
                    <button type="submit" name="pagina" value="2" class="pagination-button">2</button>
                    <button type="submit" name="pagina" value="3" class="pagination-button">3</button>
                    
                </div> -->
            </form>

            <!-- Botón para abrir el modal -->
            <button id="open-modal-btn" class="button-submit">
                <img class="icon" src="img/botones/add.png" alt="icono de añadir nuevo producto">
                Añadir nuevo producto
            </button>

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
                                <label for="barcode" class="modal-label">Código de Barras (puede quedar vacío):</label>
                                <input type="text" id="barcode" name="codigo_de_barra" class="modal-input" placeholder="Usar escaner aquí...">
                            </div>
                            <div class="modal-row">
                                <label for="product-name" class="modal-label">Nombre del Producto:</label>
                                <input type="text" id="product-name" name="nombre_producto" class="modal-input" placeholder="Empanada de queso" required>
                            </div>
                            <div class="modal-row">
                                <label for="product-cost" class="modal-label">Precio de compra:</label>
                                <input type="number" id="product-cost" name="costo" class="modal-input" min="0" placeholder="$1500" required>
                            </div>
                            <div class="modal-row">
                                <label for="product-price" class="modal-label">Precio de venta:</label>
                                <input type="number" id="product-price" name="precio" class="modal-input" min="0" placeholder="$2000" required>
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
                                <label for="min-stock" class="modal-label">Stock Mínimo</label>
                                <input type="number" id="min-stock" name="stock_minimo" min="0" class="modal-input" required>
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

        <!-- Notificación de Éxito -->
        <div id="notification-container"></div>

    </div>


    <script src="js/notificacion.js"></script>
    <script src="js/modulo_productos/modal.js"></script>
    <script>
        if (window.location.search.includes('ingresar_producto=exito')) {
            showNotification("Nuevo producto ingresado con éxito");
        }
    </script>
</body>

</html>