// Define un arreglo 'productos' para almacenar los productos seleccionados
var productos = [];

// Función para agregar un producto al arreglo 'productos'
function agregarProductoAlCarrito(producto) {
    productos.push(producto);
    // Actualizar la vista del carrito o realizar otras acciones necesarias
    actualizarCarrito();
}

// Función para eliminar un producto del arreglo 'productos' por su índice
function eliminarProductoDelCarrito(index) {
    productos.splice(index, 1);
    // Actualizar la vista del carrito o realizar otras acciones necesarias
    actualizarCarrito();
}

// Función para actualizar la vista del carrito
function actualizarCarrito() {
    // Implementa la lógica para mostrar los productos en el carrito (por ejemplo, actualizar una lista en la página).
    // También puedes mostrar el total y otros detalles del carrito.
}

// Función para enviar los productos al servidor utilizando AJAX
function enviarProductosAlServidor() {
    // Implementa la lógica para enviar los productos al servidor utilizando AJAX.
}

// Función para procesar el comando de voz y agregar productos al carrito
function procesarComandoDeVoz(comando) {
    // Divide el comando en palabras
    const palabras = comando.split(' ');

    // Busca palabras clave para determinar la intención del usuario
    if (palabras.includes('agrega') && palabras.includes('al') && palabras.includes('carrito')) {
        // Encuentra la cantidad y el producto en el comando
        const cantidadIndex = palabras.indexOf('cantidad');
        const productoIndex = palabras.indexOf('producto');

        if (cantidadIndex !== -1 && productoIndex !== -1 && cantidadIndex < productoIndex) {
            const cantidad = parseInt(palabras[cantidadIndex + 1]);
            const producto = palabras.slice(productoIndex + 1).join(' ');

            if (!isNaN(cantidad) && producto.length > 0) {
                // Crea un objeto de producto
                const productoSeleccionado = {
                    nombre: producto,
                    precio: 0, // Puedes ajustar el precio según tu lógica
                    cantidad: cantidad
                };

                // Agrega el producto al carrito
                agregarProductoAlCarrito(productoSeleccionado);

                // Responde al usuario
                decir(`Agregado al carrito: ${cantidad} ${producto}`);
            } else {
                decir('No entendí la cantidad o el producto. Por favor, intenta de nuevo.');
            }
        } else {
            decir('No entendí la cantidad o el producto. Por favor, intenta de nuevo.');
        }
    } else {
        decir('No entendí tu comando. Por favor, intenta de nuevo.');
    }
}

// Función para que el asistente hable (síntesis de voz)
function decir(mensaje) {
    const synth = window.speechSynthesis;
    const utterance = new SpeechSynthesisUtterance(mensaje);
    synth.speak(utterance);
}

// Iniciar el reconocimiento de voz cuando el usuario haga clic en un botón
document.querySelector('#escuchar-btn').addEventListener('click', function () {
    const recognition = new webkitSpeechRecognition();

    // Configura las opciones del reconocimiento
    recognition.continuous = false;
    recognition.lang = 'es-ES';

    // Configura el evento de resultado del reconocimiento
    recognition.onresult = function (event) {
        const transcript = event.results[0][0].transcript.toLowerCase();
        procesarComandoDeVoz(transcript);
    };

    // Iniciar el reconocimiento de voz
    recognition.start();
});
