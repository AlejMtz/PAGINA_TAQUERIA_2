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
    // Aquí puedes implementar la lógica para mostrar los productos en el carrito
    // Por ejemplo, puedes actualizar una lista en la página que muestra los productos seleccionados.
    // También puedes mostrar el total y otros detalles del carrito.
}

// Función para enviar los productos al servidor utilizando AJAX
function enviarProductosAlServidor() {
    // Supongamos que tienes un archivo llamado 'guardar_detalles_pedido.php' en tu servidor
    // que manejará la solicitud AJAX para guardar los productos en la base de datos.

    // Crea una nueva instancia de XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Define la URL del archivo PHP que manejará la solicitud AJAX
    var url = 'guardar_detalles_pedido.php';

    // Define el método HTTP y la URL de destino
    xhr.open('POST', url, true);

    // Define el encabezado de la solicitud
    xhr.setRequestHeader('Content-Type', 'application/json');

    // Convierte el arreglo 'productos' a formato JSON
    var productosJSON = JSON.stringify(productos);

    // Define la función que se ejecutará cuando se complete la solicitud AJAX
    xhr.onload = function() {
        if (xhr.status === 200) {
            // La solicitud se completó con éxito, puedes realizar acciones adicionales si es necesario
            console.log('Productos guardados con éxito.');
        } else {
            // Ocurrió un error al procesar la solicitud
            console.error('Error al guardar los productos.');
        }
    };

    // Envía la solicitud AJAX con los datos de los productos
    xhr.send(productosJSON);
}

// Ejemplo de cómo agregar un producto al carrito cuando el cliente hace clic en un botón
document.querySelectorAll('.add-to-cart').forEach(function(button, index) {
    button.addEventListener('click', function() {
        var productoSeleccionado = {
            nombre: button.getAttribute('data-product'),
            precio: parseFloat(button.getAttribute('data-precio')),
            cantidad: 1 // Puedes ajustar la cantidad según la interacción del cliente
        };
        agregarProductoAlCarrito(productoSeleccionado);
    });
});

// Ejemplo de cómo eliminar un producto del carrito cuando el cliente hace clic en un botón
document.querySelectorAll('.remove-from-cart').forEach(function(button, index) {
    button.addEventListener('click', function() {
        eliminarProductoDelCarrito(index);
    });
});

// Ejemplo de cómo enviar los productos al servidor cuando el cliente confirma el pedido
document.getElementById('confirmar-pedido').addEventListener('click', function() {
    enviarProductosAlServidor();
});
function validarFormulario() {
    // Obtener referencias a los campos y mensajes de error
    var nombre = document.getElementById("nombre");
    var apellidos = document.getElementById("apellidos");
    var direccion = document.getElementById("direccion");
    var telefono = document.getElementById("telefono");
    var fecha = document.getElementById("fecha");

    var nombreError = document.getElementById("nombreError");
    var apellidosError = document.getElementById("apellidosError");
    var direccionError = document.getElementById("direccionError");
    var telefonoError = document.getElementById("telefonoError");
    var fechaError = document.getElementById("fechaError");

    // Inicializar mensajes de error
    nombreError.textContent = "";
    apellidosError.textContent = "";
    direccionError.textContent = "";
    telefonoError.textContent = "";
    fechaError.textContent = "";

    // Variables para validar teléfono y correo (puedes ajustar estas expresiones regulares según tus requisitos)
    var telefonoPattern = /^\d+$/;

    // Flag para validar
    var isValid = true;

    // Validar nombre (solo letras)
    if (!/^[A-Za-z\s]+$/.test(nombre.value)) {
        nombreError.textContent = "Nombre no válido (solo letras y espacios)";
        isValid = false;
    }

    // Validar apellidos (solo letras)
    if (!/^[A-Za-z\s]+$/.test(apellidos.value)) {
        apellidosError.textContent = "Apellidos no válidos (solo letras y espacios)";
        isValid = false;
    }

    // Validar teléfono (solo números)
    if (!telefonoPattern.test(telefono.value)) {
        telefonoError.textContent = "Teléfono no válido (solo números)";
        isValid = false;
    }

    // Validar fecha (puedes agregar más validaciones según tus necesidades)
    function validarFecha() {
        var fecha = document.getElementById("fecha");
        var fechaError = document.getElementById("fechaError");
    
        // Inicializar mensaje de error
        fechaError.textContent = "";
    
        // Obtener la fecha actual
        var fechaActual = new Date();
    
        // Obtener la fecha ingresada por el usuario
        var fechaIngresada = new Date(fecha.value);
    
        // Verificar si la fecha ingresada es válida (no es un valor no válido como NaN)
        if (isNaN(fechaIngresada)) {
            fechaError.textContent = "Fecha inválida";
            return false; // La fecha no es válida
        }
    
        // Verificar si la fecha ingresada es anterior a la fecha actual
        if (fechaIngresada < fechaActual) {
            fechaError.textContent = "La fecha no puede ser anterior a la actual";
            return false; // La fecha no es válida
        }
    
        return true; // La fecha es válida
    }
    

    // Si alguno de los campos no es válido, evita enviar el formulario
    if (!isValid) {
        return false;
    }

    // Si todos los campos son válidos, el formulario se enviará
    return true;
}
function validarDireccion() {
    var direccion = document.getElementById("direccion");
    var direccionError = document.getElementById("direccionError");
    
    // Inicializar mensaje de error
    direccionError.textContent = "";

    // Verificar si la dirección tiene al menos una cierta longitud mínima (por ejemplo, 5 caracteres)
    if (direccion.value.length < 8) {
        direccionError.textContent = "La dirección debe tener al menos 8 caracteres";
        return false; // La dirección no es válida
    }

    return true; // La dirección es válida
}




