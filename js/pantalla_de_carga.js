// Muestra la pantalla de carga al inicio
window.onload = function () {
    const loadingScreen = document.getElementById("loading-screen");

    // Retraso para que la transición sea más fluida (opcional)
    setTimeout(() => {
        loadingScreen.classList.add("hidden");
    }, 500); // Ajusta el tiempo según tu preferencia
};
