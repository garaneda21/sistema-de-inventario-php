<?php
require_once "includes/modulo_ventas/lista_productos.php"
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
    <link rel="stylesheet" href="styles/tablas_venta_producto.css">
    <link rel="stylesheet" href="styles/modulo_ventas/modal_entradas.css">
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

            <form action="includes/modulo_ventas/venta.php" method="post">

                <table class="table-adjusted">
                    <thead>
                        <tr>
                            <th>ID</th>
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

    <?php 
     
    ?>


    <!-- Modal -->
    <div id="productModal" class="modal">
        <div class="modal-content">
            <!-- Título del modal -->
            <div class="modal-title" id="modal-title">
                PLÁTANO: Ingrese el lote del que venderá
            </div>

            <!-- Botón de cerrar -->
            <button id="close-btn" class="close-btn">&times;</button>


            <!-- Cuerpo del modal -->
            <div class="modal-body" id="modal-body">
                <!-- Ejemplo de rectángulo con información del producto -->
                <div class="modal-item">
                    <div class="modal-row">
                        <div class="row-item"><strong>Fecha entrada: </strong> <span>14:14<br>2025 Diciembre 6</span></div>
                        <div class="row-item"><strong>Vence: </strong> <span>15 días <br> 2025-06-02</span> </div>
                        <div class="row-item"><strong>Stock Actual: </strong> <span>30 Unidad </span></div>
                    </div>
                </div>

            </div>
        </div>
    </div>





    <script src="js/agregar_a_tabla_venta.js"></script>
    <script src="js/agregar_a_modal_venta.js"></script>
</body>

</html>