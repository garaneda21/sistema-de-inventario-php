const agregar_a_tabla = (id_producto, id_entrada, nombre, unidad, precio, stock_actual_entrada) => {
    
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
            <input type="hidden" name="productos[${id_producto}][${id_entrada}][nombre]" value="${id_entrada}" required>
            ${id_entrada}
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
            ${precio}
        </td>
        <td>
            <button type="button" class="button-remove-row" onclick="quitarFila(this)">&times;</button>
        </td>
    `


    tabla.appendChild(nuevaFila);
}

// Función para quitar una fila
function quitarFila(boton) {
    const fila = boton.closest("tr");
    fila.remove();
}
