<?php
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
$nombreProducto = $_POST["nombreProducto"];
$cantidad = $_POST["cantidad"];
$descripcion = $_POST["descripcion"];

// Insertar datos del producto en la tabla 'inventario'
$sqlInsertProducto = "INSERT INTO inventario (nombre, cantidad, descripcion) VALUES ('$nombreProducto', '$cantidad', '$descripcion')";

if ($conn->query($sqlInsertProducto) === TRUE) {
    // Redirigir al formulario con un mensaje de éxito
    header("Location: index.html?status=success");
    exit();
} else {
    // Redirigir al formulario con un mensaje de error
    header("Location: index.html?status=error");
    exit();
}

// Cierra la conexión a la base de datos
$conn->close();
?>
