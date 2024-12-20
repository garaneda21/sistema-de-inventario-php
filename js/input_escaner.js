let barcode = '';
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

    if (event.key === 'Enter' && barcode.length > 8) {
        barcode = barcode.replace('Enter', '');
        form = document.getElementById("formulario-escaner");

        form.input_escaner.value = barcode
        barcode = ''; // Resetea el buffer

        form.submit();
    }
});

