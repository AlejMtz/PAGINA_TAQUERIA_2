let isAssistantActive = false;
let recognition; // Declara la variable de reconocimiento fuera del if

// Función para que el asistente hable
function speak(message) {
    const utterance = new SpeechSynthesisUtterance(message);
    utterance.lang = 'es-ES'; // Establece el idioma que prefieras
    window.speechSynthesis.speak(utterance);
}

// Función para cambiar de página y anunciar la página
function changePageAndAnnounce(pageName) {
    const pageWithoutExtension = pageName.split('.').slice(0, -1).join('.'); // Elimina la extensión
    speak(`Cambiando a la página de ${pageWithoutExtension}`);
    window.location.href = pageName;
}

// Declara una bandera para controlar si ya se ha dado una respuesta
let hasAnswered = false;
// Función para activar o desactivar el asistente
function toggleAssistant() {
    if (!isAssistantActive) {
        // Inicializa el reconocimiento de voz solo cuando se activa el asistente
        recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
        recognition.continuous = true;
        recognition.lang = 'es-ES'; // Establece el idioma que prefieras

        recognition.onstart = () => {
            console.log('Asistente activado.');
        };

        recognition.onresult = (event) => {
            const transcript = event.results[event.results.length - 1][0].transcript.toLowerCase();
            // Resto del código para manejar comandos de voz como en tu ejemplo original
            if (transcript.includes('inicio')) {
                changePageAndAnnounce('inicio.html');
            } else if (transcript.includes('ubicación')) {
                changePageAndAnnounce('ubicacion.html');
            } else if (transcript.includes('más productos')) {
                changePageAndAnnounce('+productos.html');
            } else if (transcript.includes('pedido')) {
                changePageAndAnnounce('cliente.php');
            } else if (transcript.includes('adiós chester')) {
                // Desactiva el asistente si se dice "adiós chester"
                isAssistantActive = false;
                console.log('Asistente desactivado.');
            } else if (transcript.includes('llevame a la página de')) {
                // Reconoce comandos como "llevame a la página de inicio"
                const pageCommand = transcript.replace('llevame a la página de', '').trim();
                if (pageCommand in pageKeywords) {
                    changePageAndAnnounce(pageKeywords[pageCommand]);
                } else {
                    speak('Lo siento, no entendí a qué página deseas ir.');
                }
            }
        };

        recognition.onend = () => {
            if (isAssistantActive) {
                console.log('Asistente desactivado.');
                recognition.start(); // Vuelve a escuchar cuando finaliza un comando
            }
        };

        recognition.start(); // Inicia el reconocimiento de voz
    } else {
        // Detén el reconocimiento de voz cuando se desactiva el asistente
        if (recognition) {
            recognition.stop();
        }
        console.log('Asistente desactivado.');
    }

    // Cambia el estado del asistente
    isAssistantActive = !isAssistantActive;

    // Actualiza el texto del botón para reflejar el estado del asistente
    const assistantButton = document.getElementById('assistantButton');
    assistantButton.classList.toggle('activo', isAssistantActive);
   
}

const assistantButton = document.getElementById('assistantButton');
    assistantButton.addEventListener('click', toggleAssistant);

    assistantButton.addEventListener('mousedown', () => {
        assistantButton.classList.add('presionado');
    });

    assistantButton.addEventListener('mouseup', () => {
        assistantButton.classList.remove('presionado');
    });

    if (!('SpeechRecognition' in window) && !('webkitSpeechRecognition' in window)) {
        console.log('Reconocimiento de voz no compatible.');
    }
