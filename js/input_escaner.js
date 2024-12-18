let codigoDeBarra = '';
let lastKeyTime = Date.now();

document.addEventListener('keydown', (event) => {
    const currentTime = Date.now();
    const timeDiff = currentTime - lastKeyTime;

    if (timeDiff < 30) { // Si el tiempo entre teclas es muy bajo
        barcode += event.key; // Añadimos al código de barras
    } else {
        barcode = event.key; // Reset si no es rápido
    }

    lastKeyTime = currentTime;

    if (event.key === 'Enter') { // Código completo tras "Enter"
        console.log(`Código escaneado: ${barcode}`);
        // Aquí puedes añadir el código a tu lista
        barcode = ''; // Resetea el buffer
    }
});

