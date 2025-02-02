function showNotification(message) {
    const container = document.getElementById('notification-container');

    // Crear la notificación
    const notification = document.createElement('div');
    notification.className = 'notification';

    // Contenido de la notificación
    notification.innerHTML = `
        <svg class="icon" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="512" height="512"><path d="m12,0C5.383,0,0,5.383,0,12s5.383,12,12,12,12-5.383,12-12S18.617,0,12,0Zm-.091,15.419c-.387.387-.896.58-1.407.58s-1.025-.195-1.416-.585l-2.782-2.696,1.393-1.437,2.793,2.707,5.809-5.701,1.404,1.425-5.793,5.707Z"/></svg>
        ${message}
        <button class="close-btn">&times;</button>
        <div class="progress-bar"></div>
    `;

    // Agregar la notificación al contenedor
    container.appendChild(notification);

    // Cerrar al hacer clic en el botón de cerrar
    notification.querySelector('.close-btn').addEventListener('click', () => {
        notification.remove();
    });

    // Eliminar automáticamente después de 3 segundos
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Ejemplo de uso
