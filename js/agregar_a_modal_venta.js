// Obtiene el modal
const modal = document.getElementById("productModal");

// Obtiene el botón de cerrar
const closeBtn = document.getElementById("close-btn");

// Elementos del modal que serán actualizados dinámicamente
const modalTitle = document.getElementById("modal-title");
const modalBody = document.getElementById("modal-body");

// Función para abrir el modal
function openModal(id_producto) {
    // Encuentra la terjeta del producto correspondiente
    const productoCard = document.getElementById(`${id_producto}`);

    const nombre = productoCard.dataset.nombre;
    const unidad = productoCard.dataset.unidad;
    const precio = productoCard.dataset.precio;
    const entradas = JSON.parse(productoCard.dataset.entradas)

    // Actualizar título del modal
    modalTitle.textContent = `${nombre}: Ingrese el lote del que venderá`;

    // Limpiar cuerpo del modal
    modalBody.innerText = ""

    // Agregar informacion de los lotes
    let contador = 1;
    entradas.forEach(entrada => {

        const valor_contador = contador;
        const id_entrada = entrada.id_entrada;
        const fecha_entrada = entrada.fecha_entrada;
        const fecha_vencimiento = !entrada.fecha_vencimiento ? "No vence" : entrada.fecha_vencimiento.split(' ')[0];
        const stock_actual_entrada = unidad !== "Unidad" ? entrada.stock_actual_entrada : Number(entrada.stock_actual_entrada);

        if (unidad === "Unidad") {
            Number(entrada.stock_actual_entrada);
        }

        const entradaDiv = document.createElement('div');
        entradaDiv.classList = "modal-item";
        

        entradaDiv.onclick = () => {            
            agregar_a_tabla(valor_contador, id_producto, id_entrada, nombre, unidad, precio, stock_actual_entrada);
            modal.style.display = "none";
        };

        entradaDiv.innerHTML = `
                <div class="modal-row">
                    <div class="row-item"><strong>ID: </strong><span>${contador}</span></div>
                    <div class="row-item"><strong>Fecha entrada: </strong><span>${fecha_entrada}</span></div>
                    <div class="row-item"><strong>Vence: </strong><span>${fecha_vencimiento}</span></div>
                    <div class="row-item"><strong>Stock Actual: </strong><span>${stock_actual_entrada} ${unidad}</span></div>
                </div>
            `

        modalBody.appendChild(entradaDiv);
        contador++;
    });

    modal.style.display = "block"; // Muestra el modal
}


// Función para cerrar el modal
closeBtn.onclick = function () {
    modal.style.display = "none"; // Oculta el modal
}

// Cierra el modal si el usuario hace clic fuera del contenido
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}