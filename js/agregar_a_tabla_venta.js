const agregar_a_tabla = (id, nombre, unidad, precio, stock_actual, por_session = false) => {
    
    const comprobar_fila = document.getElementById(id);
    if (comprobar_fila) {
        return; // Si existe el elemento no ejecutar funcion
    } 
    
    const tabla = document.getElementById("tabla-productos")

    const nuevaFila = document.createElement("tr");
    nuevaFila.setAttribute("id", id);

    nuevaFila.innerHTML = `
        <td>
            <input type="hidden" name="productos[${id}][id_producto]" value="${id}" required>
            ${nombre}
        </td>
    `

    if (unidad !== "Unidad") {
        nuevaFila.innerHTML += `
            <td>
                <input class="table-input" type="text" name="productos[${id}][cantidad]" value="1" required> 
            </td>
        `
    } else {
        nuevaFila.innerHTML += `
            <td>
                <input class="table-input" type="number" min=1 max=${stock_actual} name="productos[${id}][cantidad]" value="1" required>
            </td>
        `
    }

    nuevaFila.innerHTML += `
        <td>
            ${unidad}
        </td>
        <td>
            <input type="hidden" name="productos[${id}][precio]" value="${precio}">
            $${precio}
        </td>
        <td>
            <button type="button" class="button-remove-row" onclick="quitarFila(this, ${id})">&times;</button>
        </td>
    `


    tabla.appendChild(nuevaFila);

    verificar_tabla_vacia();

    // -------------------------------------------------
    // ----- Guardar datos en la sesión -----
    // -------------------------------------------------
    
    if (por_session) {
        return;
    }

    // Recuperar los datos actuales de sessionStorage
    let productos = JSON.parse(sessionStorage.getItem('productos_a_vender')) || {};

    // Agregar el nuevo producto
    productos[id] = ({ id, nombre, unidad, precio, stock_actual });

    // Guardar nuevamente en sessionStorage
    sessionStorage.setItem('productos_a_vender', JSON.stringify(productos));

}

// Función para quitar una fila
function quitarFila(boton, id) {
    const fila = boton.closest("tr");
    fila.remove();

    let productos = JSON.parse(sessionStorage.getItem('productos_a_vender')) || {};

    // eliminar el producto
    delete productos[id];

    // Guardar nuevamente en sessionStorage
    sessionStorage.setItem('productos_a_vender', JSON.stringify(productos));

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
