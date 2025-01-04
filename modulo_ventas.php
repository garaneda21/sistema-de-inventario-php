<?php
require_once "includes/config_session.php";
require_once "includes/modulo_ventas/lista_productos.php";
require_once "includes/input_escaner_vista.php";
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
    <link rel="stylesheet" href="styles/modulo_ventas/busqueda.css">
    <link rel="stylesheet" href="styles/modulo_productos/modal_ingreso_producto.css">
    <link rel="stylesheet" href="styles/cuadricula_de_productos.css">
    <link rel="stylesheet" href="styles/barra_lateral_de_productos.css">
    <link rel="stylesheet" href="styles/tablas_venta_producto.css">
    <link rel="stylesheet" href="styles/mensaje_sin_productos.css">
    <link rel="stylesheet" href="styles/notificacion.css">
</head>

<body>
    <!-- Contenedor principal -->
    <div class="main-container">
        <!-- Panel lateral -->
        <?php require_once "elementos_ui/barra_lateral.php" ?>

        <!-- Área de contenido principal -->
        <main class="content">

            <!-- Formulario para búsqueda y paginación -->
            <form method="get" class="search-pagination-form">
                <!-- Barra de búsqueda -->
                <div class="search-container">
                    <input type="text" name="busqueda" placeholder="Buscar producto..." class="search-input" value="<?php echo isset($_GET['busqueda']) ? htmlspecialchars($_GET['busqueda']) : ''; ?>">
                    <button type="submit" class="search-button">Buscar</button>
                </div>

                
                <div class="pagination-container">
                    <button type="submit" name="pagina" value="1" class="pagination-button">1</button>
                    <button type="submit" name="pagina" value="2" class="pagination-button">2</button>
                    <button type="submit" name="pagina" value="3" class="pagination-button">3</button>
                    
                </div>
            </form>


            <div class="product-grid">

                <?php
                insertar_productos($productos);
                ?>

            </div>

        </main>


        <div class="sidebar-productos">
            <div class="formulario-de-tabla">
                <form action="includes/modulo_ventas/venta.php" method="post">

                    <?php require "elementos_ui/mensaje_sin_productos.html" ?>

                    <table class="table-adjusted">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Unidad</th>
                                <th>Precio</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tabla-productos">

                        </tbody>
                    </table>

                    <div class="form-footer">
                        <button type="submit" class="button-submit">
                            <div class="icon icon-big">
                                <img src="img/botones/shopping-cart.svg" alt="">
                            </div>
                            <p>Registrar Venta</p>
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>


            <!-- Modal -->
    <div id="productModal" class="modal">
        <div class="modal-content">
            <div class="modal-title">
                Producto no encontrado, Ingrese datos para continuar...
            </div>

            <!-- Cerrar botón -->
            <button id="close-btn" class="close-btn">&times;</button>

            <!-- Cuerpo del modal -->
            <div class="modal-body">
                <form id="product-form" action="includes/modulo_productos_pendientes/ingresar_producto_pendiente.php" method="post">
                    <div class="modal-row">
                        <label for="barcode" class="modal-label">Código de Barras:</label>
                        <input type="text" id="barcode" name="codigo_de_barra" class="modal-input" placeholder="Usar escaner aquí...">
                    </div>
                    <div class="modal-row">
                        <label for="product-name" class="modal-label">Nombre del Producto:</label>
                        <input type="text" id="product-name" name="nombre_producto" class="modal-input" placeholder="Nombre del producto..." required>
                    </div>
                    <div class="modal-row">
                        <label for="unit-measure" class="modal-label">Unidad de Medida:</label>
                        <select id="unit-measure" name="unidad_de_medida" class="modal-input" required>
                            <option value="">Seleccione una unidad de medida para el producto...</option>
                            <option value="1">Unidad</option>
                            <option value="2">Kilo</option>
                        </select>
                    </div>

                    <input name="modulo_origen" type="text" value='<?=$_SERVER["PHP_SELF"]?>' hidden>

                    <div class="modal-row">
                        <button type="submit" class="modal-submit">Guardar Producto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Formulario oculto para escaner -->
    <form action="includes/input_escaner.php" method="get" id="formulario-escaner" hidden>
        <?php
        datos_producto_obtenido_por_escaner();
        ?>

        <input id="input-escaner" name="input_escaner" type="text">
        <input name="modulo_origen" type="text" value='<?=$_SERVER["PHP_SELF"]?>'>
    </form>

    <div id="notification-container"></div>

    <script src="js/agregar_a_tabla_venta.js"></script>
    <script src="js/input_escaner.js"></script>
    <script src="js/modal_producto_pendiente.js"></script>
    <script src="js/notificacion.js"></script>

    <script>
        if (sessionStorage.getItem('productos_a_vender')) {
            const productos = JSON.parse(sessionStorage.getItem('productos_a_vender'));

            for (const key in productos) {
                producto = productos[key];
                agregar_a_tabla(producto.id, producto.nombre, producto.unidad, producto.precio, true);
            }
        }
    </script>
    <script>
        producto_obtenido_por_escaner = document.getElementById("datos-input-escaner");

        if (producto_obtenido_por_escaner) {
            const id_producto = producto_obtenido_por_escaner.dataset.id_producto;
            const nombre = producto_obtenido_por_escaner.dataset.nombre;
            const stock_actual = producto_obtenido_por_escaner.dataset.stock_actual;
            const codigo_de_barra = producto_obtenido_por_escaner.dataset.codigo_de_barra;
            const unidad = producto_obtenido_por_escaner.dataset.unidad;
            const precio = producto_obtenido_por_escaner.dataset.precio;

            if (!id_producto) {
                mostrar_modal_producto_no_encontrado(codigo_de_barra);
            } else {
                agregar_a_tabla(id_producto, nombre, unidad, precio, stock_actual);
                showNotification("Producto escaneado exitosamente")
            }
        }
    </script>
</body>

</html>
