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
    const productoCard = document.querySelector(`.product-item[data-id='${id_producto}']`);


    if (productoCard) {
        const nombre = productoCard.dataset.nombre;
        const unidad = productoCard.dataset.unidad;
        const entradas = JSON.parse(productoCard.dataset.entradas)

        // Actualizar título del modal
        modalTitle.textContent = `${nombre}: Ingrese el lote del que venderá`;

        // Limpiar cuerpo del modal
        modalBody.innerText = ""

        // Agregar informacion de los lotes
        entradas.forEach(element => {
            const entradaDiv = document.createElement('div');
            const fecha_entrada = element.fecha_entrada;
            const fecha_vencimiento = element.fecha_vencimiento.split(' ')[0];
            const stock_actual_entrada = unidad !== "Unidad" ? element.stock_actual_entrada : Number(element.stock_actual_entrada);


            entradaDiv.classList.add("modal-item");

            if(unidad === "Unidad") {
                Number(element.stock_actual_entrada);
            }

            entradaDiv.innerHTML = `
                <div class="modal-row">
                    <div class="row-item"><strong>Fecha entrada: </strong><span>${fecha_entrada}</span></div>
                    <div class="row-item"><strong>Vence: </strong><span>${fecha_vencimiento}</span></div>
                    <div class="row-item"><strong>Stock Actual: </strong><span>${stock_actual_entrada} ${unidad}</span></div>
                </div>
            `

            modalBody.appendChild(entradaDiv);
        });


        modal.style.display = "block"; // Muestra el modal
    }
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