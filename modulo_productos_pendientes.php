<?php

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
            font-size: 18px;
            color: #333;
        }

        .card-content p {
            margin: 0;
            font-size: 14px;
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

                <div class="card">
                    <div class="card-content">
                        <h3>Producto A</h3>
                        <p>Precio: $10.00</p>
                        <p>Unidad: Unidad</p>
                    </div>
                    <button onclick="alert('Abrir modal para producto: Producto A')">Editar producto</button>
                </div>
                <div class="card">
                    <div class="card-content">
                        <h3>Producto B</h3>
                        <p>Precio: $20.00</p>
                        <p>Unidad: Kg</p>
                    </div>
                    <button onclick="alert('Abrir modal para producto: Producto B')">Editar producto</button>
                </div>
                <div class="card">
                    <div class="card-content">
                        <h3>Producto C</h3>
                        <p>Precio: $15.00</p>
                        <p>Unidad: Litro</p>
                    </div>
                    <button onclick="alert('Abrir modal para producto: Producto C')">Editar producto</button>
                </div>
            </div>

        </main>

    </div>

</body>

</html>
