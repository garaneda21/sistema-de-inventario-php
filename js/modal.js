// Seleccionar elementos del DOM
const openModalBtn = document.getElementById('openModalBtn');
const modalOverlay = document.getElementById('modalOverlay');
const closeModalBtn = document.getElementById('closeModalBtn');
const acceptBtn = document.getElementById('acceptBtn');

// Abrir el modal
openModalBtn.addEventListener('click', () => {
    modalOverlay.style.display = 'flex'; // Mostrar el overlay con flexbox
});

// Cerrar el modal (al pulsar cancelar)
closeModalBtn.addEventListener('click', () => {
    modalOverlay.style.display = 'none'; // Ocultar el overlay
});

// Opción de aceptar
acceptBtn.addEventListener('click', () => {
    alert('Aceptado');
    modalOverlay.style.display = 'none'; // Cerrar el modal después de aceptar
});

// Cerrar el modal al hacer clic fuera del contenido
modalOverlay.addEventListener('click', (e) => {
    if (e.target === modalOverlay) {
        modalOverlay.style.display = 'none'; // Ocultar el overlay
    }
});