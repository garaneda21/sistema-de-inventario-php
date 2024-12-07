<?php 
declare(strict_types=1);



function tabla_de_productos(array $productos) {

    if ($productos) {
        echo "
        <table class=\"products-table\">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Unidad de medida</th>
                    <th>Total vendidos</th>
                    <th>Stock actual</th>
                    <th>Stock mínimo<br>(para alerta de stock)</th>
                    <th>Código de barra</th>
                    <th>Alerta de <br> vencimiento<br>[días]</th>
                    <th>Editar Entrada</th>
                </tr>
            </thead>
            <tbody>
        ";

        foreach ($productos as $producto) {

            echo "<tr>";
            echo "    <td>" . $producto["nombre_producto"] . "</td>";
            echo "    <td>$ " . $producto["precio"] . "</td>";
            echo "    <td>" . $producto["nombre_categoria"] . "</td>";
            echo "    <td>" . $producto["nombre_unidad"] . "</td>";
            echo "    <td>" . $producto["total_vendidos"] . "</td>";
            echo "    <td>" . $producto["stock_actual"] . "</td>";
            echo "    <td>" . $producto["stock_minimo"] . "</td>";
            echo "    <td>" . $producto["codigo_de_barra"] . "</td>";
            echo "    <td>" . $producto["tiempo_alerta_vencimiento"] . "</td>";
            echo "    <td> <button>Lapiz</button> </td>";
            echo "</tr>";
        }         

        echo "
            </tbody>
        </table>
        ";

    } else {
        echo "No se pudo obtener los productos de la base de datos";
    }

}
