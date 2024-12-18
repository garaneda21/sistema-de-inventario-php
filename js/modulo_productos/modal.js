// Obtener el modal y el botón de apertura
var modal = document.getElementById("productModal");
var openModalBtn = document.getElementById("open-modal-btn");
var closeModalBtn = document.getElementById("close-btn");

// Mostrar el modal
openModalBtn.onclick = function () {
    modal.style.display = "flex"; // Muestra el modal
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

// Mostrar/ocultar el campo de "Tiempo para advertencia de vencimiento"
var requiresExpiry = document.getElementById("requires-expiry");
var expiryTimeContainer = document.getElementById("expiry-time-container");

requiresExpiry.addEventListener("change", function () {
    if (this.value === "1") {
        expiryTimeContainer.style.display = "flex"; // Muestra el campo
        document.getElementById("expiry-time").removeAttribute("disabled");
    } else {
        expiryTimeContainer.style.display = "none"; // Oculta el campo
        document.getElementById("expiry-time").setAttribute("disabled", "true");
    }
});
