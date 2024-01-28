<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
     <script src="../CONTROLADOR/carrito.js"></script>
    


    <style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,700;1,400&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    list-style: none;
}

body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    background-image: linear-gradient(135deg, orangered,#FF2E00, #FF4500, #FF5C00, #FF7300, #FF8B00, #FFA200);
    background-size: 500%;
    animation: fanimado 10s infinite;
}

.container {
    max-width: 1200px;
    margin: 100px auto 0;
    padding: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}

.header-content container h2{
    margin-left: 120px;
    margin-bottom: 250px;
}


.menu {
    position: absolute;
    top: -235px;
    left: 0;
    right: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.logo {
    margin-top: 100px;
    margin-left: -60px;
}

.logo img {
    width: 150px;
    margin-top: 100px;
    animation: girarLogo 3s linear forwards; /* forwards hace que la animación se detenga al final */
}

@keyframes girarLogo {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

.menu .navbar ul li a {
    font-size: 25px;
    padding: 20px;
    color: aliceblue;
    display: block;
    font-weight: 600;
    margin-top: -70px;
}

.menu .navbar ul li {
    position: relative;
    float: left;
}

#menu {
    display: none;
}

.menu label {
    cursor: pointer;
    display: none;
}

.header-content {
    text-align: center;
}

.header-content h1 {
    font-size: 55px;
    line-height: 80px;
    color: #F9FAFC;
    text-transform: uppercase;
    margin-bottom: 35px;
}

.header-content p {
    font-size: 30px;
    color: aliceblue;
    padding: 0 250px;
    margin-bottom: 25px;
}

@media (max-width: 991px) {
    .menu {
        padding: 30px;
    }

    .menu label {
        display: initial;
    }

    .menu .navbar {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background-color: #323337;
        display: none;
    }

    .menu .navbar ul li {
        width: 100%;
    }

    #menu:checked ~ .navbar {
        display: initial;
    }

    .header {
        min-height: 0vh;
    }

    .header-content {
        padding: 100px 30px;
    }

    .header-content p {
        padding: 0;
    }
}

h2 {
    text-align: center;
    font-size: 35px;
}
        

        header {
            
            color: #fff;
            text-align: center;
            padding: 1rem 0;
            background-image: linear-gradient(
        rgba(0, 0, 0, 0.7),
        rgba(0, 0, 0, 0.7)
    ),
    url(../imagenes/taco_fondo.jpg);
    background-position: center bottom;
    background-repeat: no-repeat;
    background-size: cover;
    min-height: 70vh;
    display: flex;
        }

        h1 {
            margin: 0;
        }

        h2{
            
        }

        main {
            display: flex;
            justify-content: space-around;
            padding: 2rem;
        }

        .products, .cart {
            border: 1px solid #ccc;
            padding: 1rem;
            max-width: 400px;
        }

        .product, .cart-item {
            border: 1px solid #ddd;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .add-to-cart {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
        }

        .add-to-cart:hover {
            background-color: #444;
        }

        button.remove-from-cart {
            background-color: #f00;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
        }

        button.remove-from-cart:hover {
            background-color: #c00;
        }

        /* Estilos para las imágenes en la lista de productos */
        .product img {
            max-width: 100%;
            height: auto;
        }

        /* Estilos para las imágenes pequeñas en el carrito */
        .cart-item img {
            max-width: 40px; /* Ajusta el tamaño de la imagen según tu preferencia */
            height: auto;
            display: block;
            margin: 0 auto; /* Centra la imagen horizontalmente */
        }

        .comic-button {
  display: inline-block;
  padding: 10px 20px;
  font-size: 24px;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  color: #fff;
  background-color: #ff5252;
  border: 2px solid #000;
  border-radius: 10px;
  box-shadow: 5px 5px 0px #000;
  transition: all 0.3s ease;
}

.comic-button:hover {
  background-color: #fff;
  color: #ff5252;
  border: 2px solid #ff5252;
  box-shadow: 5px 5px 0px #ff5252;
}

.comic-button:active {
  background-color: #fcf414;
  box-shadow: none;
  transform: translateY(4px);
}


/* Estilos para el formulario */
.form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding-left: 2em;
            padding-right: 2em;
            padding-bottom: 0.4em;
            background-color: #615b58;
            border-radius: 25px;
            transition: .4s ease-in-out;
            margin: 20px auto; /* Añadido para centrar el formulario */
            max-width: 400px; /* Añadido para limitar el ancho del formulario */
        }

        .form:hover {
            transform: scale(1.05);
            border: 1px solid black;
        }

        /* Estilos para los elementos del formulario */
        .field {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5em;
            border-radius: 25px;
            padding: 0.6em;
            border: none;
            outline: none;
            color: white;
            background-color: #171717;
            box-shadow: inset 2px 5px 10px rgb(5, 5, 5);
        }

        .input-icon {
            height: 1.3em;
            width: 1.3em;
            fill: white;
        }

        .input-field {
            background: none;
            border: none;
            outline: none;
            width: 100%;
            color: #d3d3d3;
        }

 /* Estilos para los botones del formulario */
 .form .btn {
            display: flex;
            justify-content: center;
            flex-direction: row;
            margin-top: 2.5em;
        }

        .button1 {
            padding: 0.5em;
            padding-left: 1.1em;
            padding-right: 1.1em;
            border-radius: 5px;
            margin-right: 0.5em;
            border: none;
            outline: none;
            transition: .4s ease-in-out;
            background-color: #252525;
            color: white;
        }

        .button1:hover {
            background-color: black;
            color: white;
        }

        .button2 {
            padding: 0.5em;
            padding-left: 2.3em;
            padding-right: 2.3em;
            border-radius: 5px;
            border: none;
            outline: none;
            transition: .4s ease-in-out;
            background-color: #252525;
            color: white;
        }

        .button2:hover {
            background-color: black;
            color: white;
        }

        .button3 {
            margin-bottom: 3em;
            padding: 0.5em;
            border-radius: 5px;
            border: none;
            outline: none;
            transition: .4s ease-in-out;
            background-color: #252525;
            color: white;
        }

        .button3:hover {
            background-color: red;
            color: white;
        }

        .button1 {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
        background: #008542;
        font-family: "Montserrat", sans-serif;
        box-shadow: 0px 6px 24px 0px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        border: none;
        cursor: pointer;
        transition: all 0.4s ease-in-out;
    }

    .button1:after {
        content: " ";
        width: 0%;
        height: 100%;
        background: #FFD401;
        position: absolute;
        transition: all 0.4s ease-in-out;
        right: 0;
    }

    .button1:hover::after {
        right: auto;
        left: 0;
        width: 100%;
    }

    .button1 span {
        text-align: center;
        text-decoration: none;
        width: 100%;
        padding: 18px 25px;
        color: #fff;
        font-size: 1.125em;
        font-weight: 700;
        letter-spacing: 0.3em;
        z-index: 20;
        transition: all 0.3s ease-in-out;
    }

    .button1:hover span {
        color: #183153;
        animation: scaleUp 0.3s ease-in-out;
    }

    @keyframes scaleUp {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(0.95);
        }

        100% {
            transform: scale(1);
        }
    }

    .btn-2 {
  --border-color: linear-gradient(-45deg, #ffae00, #7e03aa, #00fffb);
  --border-width: .125em;
  --curve-size: .5em;
  --blur: 30px;
  --bg: #080312;
  --color: #afffff;
  color: var(--color);
    /* use position: relative; so that BG is only for .btn */
  position: relative;
  isolation: isolate;
  display: inline-grid;
  place-content: center;
  padding: .5em 1.5em;
  font-size: 17px;
  border: 0;
  text-transform: uppercase;
  box-shadow: 10px 10px 20px rgba(0, 0, 0, .6);
  clip-path: polygon(
            /* Top-left */
            0% var(--curve-size),

            var(--curve-size) 0,
            /* top-right */
            100% 0,
            100% calc(100% - var(--curve-size)),

            /* bottom-right 1 */
            calc(100% - var(--curve-size)) 100%,
            /* bottom-right 2 */
            0 100%);
  transition: color 250ms;
}

.btn-2::after,
.btn-2::before {
  content: '';
  position: absolute;
  inset: 0;
}

.btn-2::before {
  background: var(--border-color);
  background-size: 300% 300%;
  animation: move-bg7234 5s ease infinite;
  z-index: -2;
}

@keyframes move-bg7234 {
  0% {
    background-position: 31% 0%
  }

  50% {
    background-position: 70% 100%
  }

  100% {
    background-position: 31% 0%
  }
}

.btn-2::after {
  background: var(--bg);
  z-index: -1;
  clip-path: polygon(
            /* Top-left */
            var(--border-width) 
            calc(var(--curve-size) + var(--border-width) * .5),

            calc(var(--curve-size) + var(--border-width) * .5) var(--border-width),

            /* top-right */
            calc(100% - var(--border-width)) 
            var(--border-width),

            calc(100% - var(--border-width)) 
            calc(100% - calc(var(--curve-size) + var(--border-width) * .5)),

            /* bottom-right 1 */
            calc(100% - calc(var(--curve-size) + var(--border-width) * .5)) calc(100% - var(--border-width)),
            /* bottom-right 2 */
            var(--border-width) calc(100% - var(--border-width)));
  transition: clip-path 500ms;
}

.btn-2:where(:hover, :focus)::after {
  clip-path: polygon(
                /* Top-left */
                calc(100% - var(--border-width)) 

                calc(100% - calc(var(--curve-size) + var(--border-width) * 0.5)),
    
                calc(100% - var(--border-width))

                var(--border-width),
    
                /* top-right */
                calc(100% - var(--border-width))

                 var(--border-width),
    
                calc(100% - var(--border-width)) 

                calc(100% - calc(var(--curve-size) + var(--border-width) * .5)),
    
                /* bottom-right 1 */
                calc(100% - calc(var(--curve-size) + var(--border-width) * .5)) 
                calc(100% - var(--border-width)),

                /* bottom-right 2 */
                calc(100% - calc(var(--curve-size) + var(--border-width) * 0.5))
                calc(100% - var(--border-width)));
  transition: 200ms;
}

.btn-2:where(:hover, :focus) {
  color: #fff;
}
    /* Estilos para centrar el botón horizontalmente */
.center-button {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top:20px;
}

@keyframes fanimado{
            0%{
                background-position: 0% 50%;
            }
            50%{
                background-position: 100% 50%;
            }
            100%{
                background-position: 0% 50%;
            }
        }


/* Media query para pantallas más pequeñas, como dispositivos móviles */
@media screen and (max-width: 1100px) {
    .container {
        margin: 50px auto 0;
        padding: 10px;
        width: 100%;
    }
    

    .menu .logo {
        display: block;
        margin-left: 100px;
        margin-top: 430px;
    }
    

    .menu .navbar {
        display: block;
        padding-top:40px;
        margin-top: 10px;
    }

    .menu .navbar ul li {
        font-size: 20px; /* Ajusta el tamaño del texto según tus preferencias */
        padding: 20px; /* Ajusta el espaciado según tus preferencias */
    }

    .header-content h2 {
        font-size: 40px; /* Ajusta el tamaño del título según tus preferencias */
        justify-content: center;
        margin-top:-200px
    }

    .footer img {
                max-width: 100%;
                /* Hace que la imagen se ajuste al ancho máximo de su contenedor */
                height: auto;
                /* Mantiene la proporción de aspecto original de la imagen */
                display: block;
                /* Elimina cualquier espacio en blanco debajo de la imagen */
                margin: 0 auto;
                /* Centra la imagen horizontalmente en su contenedor */
                margin-bottom: 30px;
            }

            .formu img{
                display:none;
            }
            
        .formulario{
            margin-left:20px;
            margin-bottom: 60px;
        }

        .center-button {
                margin-top: 250px;
            }
}

    </style>
</head>
<body>
    <header>
        <div class="menu container">
            <a href="#" class="logo"><img src="../imagenes/LOGO_TAQ_SINFONDO.png" alt="" style="width: 150px; margin-top: 120px;"></a>
            <input type="checkbox" id="menu">
            <label for="menu">
                <img src="" class="" alt="">
            </label>
            <nav class="navbar">
                <ul>
                    <li>
                        <a href="inicio.html">Inicio</a>
                    </li>
                    <li>
                        <a href="ubicacion.html">Ubicación</a>
                    </li>
                    <li>
                        <a href="+productos.html">Más productos</a>
                    </li>
                    <li>
                        <a href="asistente.html">Asistente de voz</a>
                    </li>
        
                </ul>
            </nav>
        </div>
        <div class="header-content container">

            <h2>Ingresa tus datos antes de realizar el pedido</h2>
        </div>

        </div>
        
    </header>
    
    <div class="center-button">
        <button id="botonEscuchar" class="btn-2">Activar asistente para llenar formulario</button>
    </div>
    


    <div class="formu" style="display: flex; justify-content: space-between; align-items: center;">

    <img src="../imagenes/LOGO_TAQ_SINFONDO.png" alt="" style="width: 150px; height: 150px; margin-left: 30px; margin-right:30px;">

    <div class="formulario">

    <form action="../MODELO/procesar_cliente.php" method="POST" class="form" style="margin-top: 80px;" onsubmit="return validarFormulario();">
    
        
        <label for="nombre" style="color: white;">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required class="field input-field">
        <span id="nombreError" class="error"></span>
        
        <label for="apellidos" style="color: white;">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required class="field input-field">
        <span id="apellidosError" class="error"></span>
        
        <label for="direccion" style="color: white;">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required class="field input-field">
        <span id="direccionError" class="error"></span>
        
        <label for="telefono" style="color: white;">Telefono:</label>
        <input type="tel" id="telefono" name="telefono" required class="field input-field">
        <span id="telefonoError" class="error"></span>
        
        <label for="fecha" style="color: white;">Fecha:</label>
        <input type="date" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>" required class="field input-field">
        
        <div class="btn">
            <button type="submit" class="button1">
                <span>Continuar al carrito</span>
            </button>
        </div>
    </form>

</div>

    <script>
    function validarFormulario() {
        var nombre = document.getElementById("nombre").value;
        var apellidos = document.getElementById("apellidos").value;
        var direccion = document.getElementById("direccion").value;
        var telefono = document.getElementById("telefono").value;

        var nombreError = document.getElementById("nombreError");
        var apellidosError = document.getElementById("apellidosError");
        var direccionError = document.getElementById("direccionError");
        var telefonoError = document.getElementById("telefonoError");

        // Expresión regular que permite letras y espacios en blanco
        var letrasConEspaciosYAcentos = /^[A-Za-záéíóúüñ\s]+$/;
        var numeros = /^[0-9]+$/;

        var valid = true;

        if (nombre.trim() === "") {
            nombreError.textContent = "El campo Nombre no puede estar vacío.";
            valid = false;
        } else if (!nombre.match(letrasConEspaciosYAcentos)) {
            nombreError.textContent = "Nombre debe contener solo letras y espacios.";
            valid = false;
        } else {
            nombreError.textContent = "";
        }

        if (apellidos.trim() === "") {
            apellidosError.textContent = "El campo Apellidos no puede estar vacío.";
            valid = false;
        } else if (!apellidos.match(letrasConEspaciosYAcentos)) {
            apellidosError.textContent = "Apellidos deben contener solo letras y espacios.";
            valid = false;
        } else {
            apellidosError.textContent = "";
        }

        if (direccion.trim() === "") {
            direccionError.textContent = "El campo Dirección no puede estar vacío.";
            valid = false;
        } else {
            // Agrega tu lógica de validación de dirección aquí
            direccionError.textContent = "";
        }

        if (telefono.trim() === "") {
            telefonoError.textContent = "El campo Teléfono no puede estar vacío.";
            valid = false;
        } else if (!telefono.match(numeros)) {
            telefonoError.textContent = "Teléfono debe contener solo números.";
            valid = false;
        } else {
            telefonoError.textContent = "";
        }

        return valid;
    }
</script>

<!--LLENAR FORMULARIO CON ASISTENTE-->
<script>
  // Lista de campos del formulario
  const campos = ['nombre', 'apellidos', 'direccion', 'telefono'];

  // Variable para llevar un registro del campo actual
  let campoActual = 0;

  // Función para llenar el campo actual
  function llenarCampoActual(respuesta) {
    const campo = campos[campoActual];
    const valor = respuesta.trim().replace(/\.$/, ''); // Elimina un punto al final, si existe

    // Asignar el valor proporcionado al campo actual
    document.getElementById(campo).value = valor;
    campoActual++;

    // Verificar si se llenaron todos los campos
    if (campoActual < campos.length) {
      // Si no se llenaron todos los campos, decir un mensaje para el siguiente campo
      decir(`Por favor, proporciona tu ${campos[campoActual]}`);
    } else {
      // Si se llenaron todos los campos, decir un mensaje de finalización
      decir('Formulario completado. ¡Gracias!');
    }
  }

  // Función para que el asistente diga un mensaje
  function decir(mensaje) {
    const synth = window.speechSynthesis;
    const utterance = new SpeechSynthesisUtterance(mensaje);
    synth.speak(utterance);
  }

  // Crear el reconocimiento de voz
  const recognition = new webkitSpeechRecognition() || new SpeechRecognition();
  recognition.lang = 'es-ES'; // Establecer el idioma a español

  // Iniciar el reconocimiento de voz al principio
  decir(`Por favor, proporciona tu ${campos[campoActual]}`);

  // Manejar el resultado del reconocimiento de voz
  recognition.onresult = function (event) {
    const transcript = event.results[0][0].transcript.toLowerCase();

    // Llamar a la función para llenar el campo actual con la respuesta
    llenarCampoActual(transcript);
  };

  // Iniciar el reconocimiento de voz al hacer clic en un botón
  const botonEscuchar = document.getElementById('botonEscuchar');
  botonEscuchar.addEventListener('click', function () {
    // Iniciar el reconocimiento de voz para el primer campo
    recognition.start();
  });
</script>

<footer class="footer">
        <div class="footer-content container" style="margin-top: -10px; padding-bottom: 0;">
                <img src="../imagenes/FONDO-TRAS.png" alt="">
        </div>
    </footer>
</body>
</html>
