
    // Obtener el botón modal y el contenido del modal
    const botonModal = document.querySelector('.boton-modal label');
    const contenidoModal = document.querySelector('.content-modal p'); // Cambia esto según la estructura de tu modal

    // Agregar un evento de clic al botón modal
    botonModal.addEventListener('click', () => {
        // Obtener el texto del contenido del modal
        const textoModal = contenidoModal.innerText;

        // Crear un objeto SpeechSynthesisUtterance con el texto del modal
        const utterance = new SpeechSynthesisUtterance(textoModal);
        utterance.lang = 'es-ES'; // Establece el idioma que prefieras

        // Hacer que el asistente de voz hable el contenido del modal
        window.speechSynthesis.speak(utterance);
    });