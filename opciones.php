<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Inventario</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/layout.css">
    <style>
        .content {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
            background-color: white;
        }

        .export-button {
            display: flex;
            align-items: center;
            gap: 10px;
            background-color: var(--azul);
            color: white;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            text-align: center;
            transition: background-color 0.3s;
            border: none;
        }

        .export-button:hover {
            background-color: #0056b3;
        }

        .export-icon {
            width: 28px;
            height: 28px;
            filter: invert();
        }
    </style>
</head>

<body>

    <div class="main-container">
        <?php require_once "elementos_ui/barra_lateral.php" ?>

        <main class="content">

            <h2>Exportar Inventario</h2>

            <form action="includes/opciones/exportar_inventario.php" method="post">

                <button class="export-button" type="submit">
                    <svg class="export-icon" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="512" height="512">
                        <path d="M14,7V.46c.913,.346,1.753,.879,2.465,1.59l3.484,3.486c.712,.711,1.245,1.551,1.591,2.464h-6.54c-.552,0-1-.449-1-1Zm-1,12h3v-2h-3v2Zm-5-4h3v-2h-3v2Zm0,4h3v-2h-3v2Zm13.976-9h-6.976c-1.654,0-3-1.346-3-3V.024c-.161-.011-.322-.024-.485-.024H7C4.243,0,2,2.243,2,5v14c0,2.757,2.243,5,5,5h10c2.757,0,5-2.243,5-5V10.485c0-.163-.013-.324-.024-.485Zm-3.976,9c0,1.103-.897,2-2,2H8c-1.103,0-2-.897-2-2v-6c0-1.103,.897-2,2-2h3c1.103,0,2,.897,2,2v2h3c1.103,0,2,.897,2,2v2Z" />
                    </svg>
                    Exportar inventario como archivo Excel (.xlsx)
                </button>
            </form>


        </main>
    </div>
</body>

</html>