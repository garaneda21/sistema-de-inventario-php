function agregar_a_tabla(id, nombre, unidad) {
    const tableBody = document.getElementById("tabla-productos");

    // Crear una fila para el producto
    const nueva_fila = document.createElement('tr');

    // Texto del nombre con input oculto con id del producto
    const celda_nombre = document.createElement('td');
    const input_nombre_id = document.createElement('input');
    input_nombre_id.setAttribute('name', `productos[${id}][id_producto]`);
    input_nombre_id.setAttribute('type', "hidden");
    input_nombre_id.setAttribute('value', `${id}`);
    input_nombre_id.setAttribute('readonly', '');
    celda_nombre.textContent = nombre;
    celda_nombre.appendChild(input_nombre_id);

    // Input de la Cantidad del Producto
    const celda_cantidad = document.createElement('td');
    const input_cantidad = document.createElement('input');
    input_cantidad.setAttribute('name', `productos[${id}][cantidad]`);
    input_cantidad.setAttribute('class', 'table-input');
    input_cantidad.setAttribute('type', 'number');
    input_cantidad.setAttribute('value', '1');
    if(unidad !== "Unidad") {
        input_cantidad.setAttribute('min', '0');
    } else {
        input_cantidad.setAttribute('min', '1');
    }
    input_cantidad.setAttribute('required', '');
    celda_cantidad.appendChild(input_cantidad);

    // Texto con la unidad del producto
    const celda_unidad = document.createElement('td');
    celda_unidad.textContent = unidad;

    // Input con el vencimiento del producto
    const celda_vencimiento = document.createElement('td');
    const input_vencimiento = document.createElement('input');
    input_vencimiento.setAttribute('name', `productos[${id}][vencimiento]`);
    input_vencimiento.setAttribute('class', 'table-input');
    input_vencimiento.setAttribute('type', 'date');
    input_vencimiento.setAttribute('required', '');
    celda_vencimiento.appendChild(input_vencimiento);

    // Botón para quitar el producto
    const celda_quitar = document.createElement('td');
    const boton_quitar = document.createElement('button');
    boton_quitar.textContent = 'X';
    boton_quitar.style.cursor = 'pointer';
    boton_quitar.onclick = function () {
        nueva_fila.remove();
    };
    boton_quitar.setAttribute('class', 'button-remove-row')
    celda_quitar.appendChild(boton_quitar);

    // Agregar las celdas a la fila
    nueva_fila.appendChild(celda_nombre);
    nueva_fila.appendChild(celda_cantidad);
    nueva_fila.appendChild(celda_unidad);
    nueva_fila.appendChild(celda_vencimiento);
    nueva_fila.appendChild(celda_quitar);

    // Agregar la fila a la tabla lateral
    tableBody.appendChild(nueva_fila);
}