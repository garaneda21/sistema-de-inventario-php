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
</head>

<body>

    <div class="main-container">
        <?php require_once "elementos_ui/barra_lateral.php" ?>

        <main class="content">

        <form action="includes/opciones/crear_xlsx.php" method="post">
            <button type="submit">Exportar inventario</button>
        </form>


        </main>
    </div>
</body>

</html>
