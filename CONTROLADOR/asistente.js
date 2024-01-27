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

// Función para manejar las preguntas y respuestas
function handleQuestions(transcript) {
    let respuesta = ''; // Variable para almacenar la respuesta
    
    if (transcript.includes('horario del local')) {
        respuesta = "Puedes encontrarnos desde las 9 de la mañana y hasta las 5 de la tarde de lunes a domingo los 365 días del año";
    } else if (transcript.includes('¿qué carne venden?')) {
        respuesta = "Tenemos una variedad de carne, maciza, trompa, costilla, cueritos, surtida y buche, además de ofrecerte refresco, jugo o cerveza";
    } else if (transcript.includes('¿qué precios tienen?')) {
        respuesta = "Te ofrecemos: tacos a 22 pesos, 1/4 de kilo a solo 75 pesos, el medio kilo a 150 pesos, 3/4 de kilo a 225 pesos, 1 kg a solo 300 pesos, refresco y jugos a 22 pesos y cerveza a 25 pesos";
    } else {
        respuesta = 'Lo siento, no entiendo la pregunta.';
    }

    // Verifica si ya se ha dado una respuesta antes de decir una nueva respuesta
    if (!hasAnswered) {
        speak(respuesta);
        hasAnswered = true;
    }
}
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
            } else {
                // Agrega el manejo de preguntas y respuestas
                handleQuestions(transcript);
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
    const buttonText = isAssistantActive ? 'Desactivar Asistente' : 'Activar Asistente';
    assistantButton.textContent = buttonText;
}

// Agregar un evento de clic al botón para activar/desactivar el asistente
const assistantButton = document.getElementById('assistantButton');
assistantButton.addEventListener('click', toggleAssistant);


// Verificar si el navegador es compatible con el reconocimiento de voz
if (!('SpeechRecognition' in window) && !('webkitSpeechRecognition' in window)) {
    // Si el reconocimiento de voz no es compatible con el navegador
    console.log('Reconocimiento de voz no compatible.');
}
