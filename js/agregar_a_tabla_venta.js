const agregar_a_tabla = (contador, id_producto, id_entrada, nombre, unidad, precio, stock_actual_entrada) => {
    
    const comprobar_fila = document.getElementById(`[${id_producto}][${id_entrada}]`);
    console.log(comprobar_fila);
    if (comprobar_fila) {
        return; // Si existe el elemento no ejecutar funcion
    } 
    
    const tabla = document.getElementById("tabla-productos")

    const nuevaFila = document.createElement("tr");
    nuevaFila.setAttribute("id", `[${id_producto}][${id_entrada}]`);
    nuevaFila.dataset.id_producto = id_producto;
    nuevaFila.dataset.id_producto = id_entrada;


    nuevaFila.innerHTML = `
        <td>
            <input type="hidden" name="productos[${id_producto}][${id_entrada}][id_producto]" value="${id_producto}" required>
            <input type="hidden" name="productos[${id_producto}][${id_entrada}][id_entrada]" value="${id_entrada}" required>
            ${contador}
        </td>
        <td>
            ${nombre}
        </td>
    `

    if (unidad !== "Unidad") {
        nuevaFila.innerHTML += `
            <td>
                <input class="table-input" type="text" name="productos[${id_producto}][${id_entrada}][cantidad]" value="1" required> 
            </td>
        `
    } else {
        nuevaFila.innerHTML += `
            <td>
                <input class="table-input" type="number" min=1 max=${stock_actual_entrada} name="productos[${id_producto}][${id_entrada}][cantidad]" value="1" required>
            </td>
        `
    }

    nuevaFila.innerHTML += `
        <td>
            ${unidad}
        </td>
        <td>
            <input type="hidden" name="productos[${id_producto}][${id_entrada}][precio]" value="${precio}">
            $${precio}
        </td>
        <td>
            <button type="button" class="button-remove-row" onclick="quitarFila(this)">&times;</button>
        </td>
    `


    tabla.appendChild(nuevaFila);

    verificar_tabla_vacia();
}

// Función para quitar una fila
function quitarFila(boton) {
    const fila = boton.closest("tr");
    fila.remove();

    verificar_tabla_vacia();
}

// Función para verificar si la tabla está vacía
function verificar_tabla_vacia() {
    const tabla = document.getElementById("tabla-productos");
    const mensaje = document.getElementById("mensaje-sin-productos");

    // Si la tabla no tiene filas, mostramos el mensaje
    if (tabla.rows.length === 0) {
        mensaje.classList.add("visible");
    } else {
        mensaje.classList.remove("visible");
    }
}
