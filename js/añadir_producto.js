function agregar_a_tabla(id, nombre, precio) {
    const tableBody = document.getElementById("tabla-productos");

    // Crear una fila para el producto
    const nueva_fila = document.createElement('tr');

    const celda_nombre = document.createElement('td');
    celda_nombre.textContent = nombre;

    const celda_cantidad = document.createElement('td');
    celda_cantidad.textContent = '1'

    const celda_precio = document.createElement('td');
    celda_precio.textContent = precio;

    const celda_quitar = document.createElement('td');
    const boton_quitar = document.createElement('button');
    boton_quitar.textContent = 'Quitar';
    boton_quitar.style.cursor = 'pointer';
    boton_quitar.onclick = function () {
        nueva_fila.remove();
    };

    celda_quitar.appendChild(boton_quitar);

    // Agregar las celdas a la fila
    nueva_fila.appendChild(celda_nombre);
    nueva_fila.appendChild(celda_cantidad);
    nueva_fila.appendChild(celda_precio);
    nueva_fila.appendChild(celda_quitar);

    // Agregar la fila a la tabla lateral
    tableBody.appendChild(nueva_fila);
}