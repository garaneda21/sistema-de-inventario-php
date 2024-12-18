// Detecta si el parámetro "ingresar_producto=exito" está presente en la URL
if (window.location.search.includes('ingresar_producto=exito')) {
    // Muestra el modal de éxito
    const successModal = document.getElementById('success-modal');
    successModal.style.display = 'flex';

    // Agrega un evento para cerrar el modal al presionar cualquier tecla
    document.addEventListener('keydown', function () {
        successModal.style.display = 'none';
    });
}

