let isAssistantActive = false;
let recognition;

function speak(message) {
    const utterance = new SpeechSynthesisUtterance(message);
    utterance.lang = 'es-ES';
    window.speechSynthesis.speak(utterance);
}

function changePageAndAnnounce(pageName) {
    const pageWithoutExtension = pageName.split('.').slice(0, -1).join('.');
    speak(`Cambiando a la página de ${pageWithoutExtension}`);
    window.location.href = pageName;
}

let hasAnswered = false;

function toggleAssistant() {
    if (!isAssistantActive) {
        recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
        recognition.continuous = true;
        recognition.lang = 'es-ES';

        recognition.onstart = () => {
            console.log('Asistente activado.');
        };

        recognition.onresult = (event) => {
            const transcript = event.results[event.results.length - 1][0].transcript.toLowerCase();

            if (transcript.includes('inicio')) {
                changePageAndAnnounce('inicio.html');
            } else if (transcript.includes('ubicación')) {
                changePageAndAnnounce('ubicacion.html');
            } else if (transcript.includes('más productos')) {
                changePageAndAnnounce('+productos.html');
            } else if (transcript.includes('pedido')) {
                changePageAndAnnounce('cliente.php');
            } else if (transcript.includes('adiós chester')) {
                isAssistantActive = false;
                console.log('Asistente desactivado.');
            } else if (transcript.includes('llevame a la página de')) {
                const pageCommand = transcript.replace('llevame a la página de', '').trim();
                if (pageCommand in pageKeywords) {
                    changePageAndAnnounce(pageKeywords[pageCommand]);
                } else {
                    speak('Lo siento, no entendí a qué página deseas ir.');
                }
            } else {
                handleQuestions(transcript);
            }
        };

        recognition.onend = () => {
            if (isAssistantActive) {
                console.log('Asistente desactivado.');
                recognition.start();
            }
        };

        recognition.start();
    } else {
        if (recognition) {
            recognition.stop();
        }
        console.log('Asistente desactivado.');
    }

    isAssistantActive = !isAssistantActive;

    setTimeout(() => {
        const assistantButton = document.getElementById('assistantButton');
        const imagePath = isAssistantActive ? '../imagenes/microfono-icon.png' : '../imagenes/microfono-icon.png';
        assistantButton.querySelector('img').src = imagePath;
    }, 0);
}

const assistantButton = document.getElementById('assistantButton');
assistantButton.addEventListener('click', toggleAssistant);

if (!('SpeechRecognition' in window) && !('webkitSpeechRecognition' in window)) {
    console.log('Reconocimiento de voz no compatible.');
}
