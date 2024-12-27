// Obtener el modal y el botón de apertura
var modal = document.getElementById("productModal");
var openModalBtn = document.getElementById("open-modal-btn");
var closeModalBtn = document.getElementById("close-btn");

function mostrar_modal_producto_no_encontrado() {
    modal.style.display = "flex";
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

