// Obtener el modal y el botón de apertura
let modal = document.getElementById("productModal");
let openModalBtn = document.getElementById("open-modal-btn");
let closeModalBtn = document.getElementById("close-btn");

function mostrar_modal_producto_no_encontrado(codigo_de_barra) {
    modal.style.display = "flex";

    if (!codigo_de_barra) {
        return;
    }

    let inputBarcode = document.getElementById("barcode");
    inputBarcode.value = codigo_de_barra;
}

// Cerrar el modal
closeModalBtn.onclick = function () {
    modal.style.display = "none"; // Oculta el modal
}

// Cerrar el modal si se hace clic fuera del contenido
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

