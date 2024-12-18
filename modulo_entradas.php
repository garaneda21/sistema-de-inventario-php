<?php
require_once "includes/modulo_entradas/lista_productos.php"
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
    <link rel="stylesheet" href="styles/cuadricula_de_productos.css">
    <link rel="stylesheet" href="styles/barra_lateral_de_productos.css">
    <link rel="stylesheet" href="styles/tablas_ingreso_producto.css">
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

            <div class="product-grid">

                <?php
                insertar_productos($productos);
                ?>

            </div>

        </main>

        <div class="sidebar-productos">
            <div class="formulario-de-tabla">

                <form action="includes/modulo_entradas/entrada.php" method="post">
    
                    <table class="table-adjusted">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th width="80px">Cantidad</th>
                                <th width="70px">Unidad</th>
                                <th width="150px">Fecha de Vencimiento</th>
                                <th width="50px">Quitar</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-productos">
    
                        </tbody>
                    </table>
    
                    <div class="form-footer">
                        <button type="submit" class="button-submit">
                            <div class="icon icon-big">
                                <img src="img/botones/completed.png" alt="">
                            </div>
                            <p>Ingresar productos al inventario</p>
                        </button>
                    </div>
                </form>
            </div>


        </div>
    </div>

    <script src="js/agregar_a_tabla_ingreso.js"></script>
</body>

</html>
