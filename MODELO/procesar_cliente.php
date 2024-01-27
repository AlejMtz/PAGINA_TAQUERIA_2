<?php
// Conexión a la base de datos (reemplaza con tus propios datos de conexión)
$servername = "localhost";
$username = "root";
$password = "";
$database = "taqueria";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Recibir datos del formulario del cliente
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$fecha = $_POST["fecha"];

// Insertar datos del cliente en la tabla 'clientes'
$sqlInsertCliente = "INSERT INTO clientes (nombre, apellidos, direccion, telefono) VALUES ('$nombre', '$apellidos', '$direccion', '$telefono')";
if ($conn->query($sqlInsertCliente) === TRUE) {
    // Obtener el ID del cliente recién insertado
    $cliente_id = $conn->insert_id;

    // Redirigir al cliente a la página de carrito
    header("Location: carrito.html?cliente_id=$cliente_id");
    $cliente_id = $conn->insert_id;

    exit();
} else {
    echo "Error al insertar el cliente: " . $conn->error;
}

// Cierra la conexión a la base de datos
$conn->close();
?>
