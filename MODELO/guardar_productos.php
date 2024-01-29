<?php
session_start(); // Inicia la sesión

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
$categoria = $_POST["categoria"];
$precio = $_POST["precio"];

// Insertar datos del producto en la tabla 'inventario'
$sqlInsertProducto = "INSERT INTO inventario (nombre, cantidad, descripcion, categoria, precio) VALUES ('$nombreProducto', '$cantidad', '$descripcion', '$categoria', '$precio')";

if ($conn->query($sqlInsertProducto) === TRUE) {
    // Establecer una variable de sesión para el mensaje de éxito
    $_SESSION["status"] = "success";

    // Redirigir al formulario
    header("Location: index.html");
    exit();
} else {
    // Establecer una variable de sesión para el mensaje de error
    $_SESSION["status"] = "error";

    // Redirigir al formulario
    header("Location: index.html");
    exit();
}

// Cierra la conexión a la base de datos
$conn->close();
?>
