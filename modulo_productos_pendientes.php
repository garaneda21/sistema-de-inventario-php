<?php
require_once "includes/modulo_productos_pendientes/productos_pendientes.php"
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
    <style>
        .product-list-container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-content {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .card-content h3 {
            margin: 0;
            font-size: 24px;
            color: #333;
            text-transform: uppercase;
        }

        .card-content p {
            margin: 0;
            font-size: 18px;
            color: #666;
        }

        .card button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .card button:hover {
            background-color: #0056b3;
        }

        .empty-message {
            display: flex;
            flex-direction: column;
            color: darkgray;
            margin-left: auto;
            margin-right: auto;
            padding: 20px;
            border-radius: 8px;
            font-size: 28px;
            align-items: center;
            text-align: center;
            width: 60%;
        }

        .empty-message svg {
            margin: 20px;
            width: 50px;
            height: 50px;
            fill: darkgray;
        }

        @media (max-width: 600px) {
            .container {
                width: 100%;
                padding: 10px;
            }
        }
    </style>
</head>

<body>

    <!-- Contenedor principal -->
    <div class="main-container">
        <!-- Panel lateral -->
        <?php require_once "elementos_ui/barra_lateral.php" ?>

        <!-- Área de contenido principal -->
        <main class="content">
            <div class="product-list-container" id="product-list">

                <h1>Terminar de ingresar productos</h1>

                <?php
                lista_productos_pendientes($productos);
                ?>

            </div>


            <div id="productModal" class="modal">
                <div class="modal-content">
                    <div class="modal-title">
                        Actualizar datos de producto
                    </div>

                    <!-- Cerrar botón -->
                    <button id="close-btn" class="close-btn">&times;</button>

                    <!-- Cuerpo del modal -->
                    <div class="modal-body">
                        <form id="product-form" action="includes/modulo_productos_pendientes/actualizar_productos_pendientes.php" method="post">
                            <div class="modal-row">
                                <label for="barcode" class="modal-label">Código de Barras</label>
                                <input type="text" id="barcode" name="codigo_de_barra" class="disabled-input" readonly>
                                <input type="text" id="id-producto" name="id_producto" hidden>
                            </div>
                            <div class="modal-row">
                                <label for="product-name" class="modal-label">Nombre del Producto:</label>
                                <input type="text" id="product-name" name="nombre_producto" class="modal-input" placeholder="Nombre del producto..." required>
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
                                <label for="min-stock" class="modal-label">Stock Mínimo</label>
                                <input type="number" id="min-stock" name="stock_minimo" min="0" class="modal-input" value="10" required>
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
                                <input type="number" id="expiry-time" name="tiempo_alerta_vencimiento" class="modal-input" value="14">
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

    <script>

        // Obtener el modal y el botón de apertura
        let modal = document.getElementById("productModal");
        let closeModalBtn = document.getElementById("close-btn");

        let inputIdProduct = document.getElementById("id-producto");
        let inputBarcode = document.getElementById("barcode");
        let productName = document.getElementById("product-name");
        
        function mostrar_modal_actualizar_producto(id_producto, codigo_de_barra, nombre_producto) {
            modal.style.display = "flex";
            inputIdProduct.value = id_producto;
            inputBarcode.value = codigo_de_barra;            
            productName.value = nombre_producto;
        }
        
        // Cerrar el modal
        closeModalBtn.onclick = function () {
            modal.style.display = "none"; // Oculta el modal
        }
        
        // Cerrar el modal si se hace clic fuera del contenido
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

    </script>
</body>

</html>
