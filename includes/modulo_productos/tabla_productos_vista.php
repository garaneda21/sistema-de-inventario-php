<?php 
declare(strict_types=1);



function tabla_de_productos(array $productos) {

    if ($productos) {
        echo "
        <table class=\"products-table\">
            <thead>
                <tr>
                    <th>Nombre producto</th>
                    <th>Precio de compra</th>
                    <th>Precio de venta</th>
                    <th>Medida</th>
                    <th>Stock actual</th>
                    <th>Stock mínimo</th>
                    <th>Alerta de vencimiento</th>
                    <th>Código de barra</th>
                    <th>Editar Datos</th>
                </tr>
            </thead>
            <tbody>
        ";

        foreach ($productos as $producto) {

            echo "<tr>";
            echo "    <td>" . $producto["nombre_producto"] . "</td>";
            echo "    <td>$" . $producto["costo"] . "</td>";
            echo "    <td>$" . $producto["precio"] . "</td>";
            echo "    <td>" . $producto["nombre_unidad"] . "</td>";
            echo "    <td>" . $producto["stock_actual"] . "</td>";
            echo "    <td>" . $producto["stock_minimo"] . "</td>";
            echo "    <td>" . $producto["tiempo_alerta_vencimiento"] . " días</td>";
            echo "    <td>" . $producto["codigo_de_barra"] . "</td>";
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
