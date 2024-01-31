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

// Insertar datos del producto en la tabla 'productos'
$sqlInsertProducto = "INSERT INTO productos (nombre, categoria, descripcion, precio) VALUES ('$nombreProducto', '$categoria', '$descripcion', '$precio')";

if ($conn->query($sqlInsertProducto) === TRUE) {
    // Establecer una variable de sesión para el mensaje de éxito
    $_SESSION["status"] = "success";
    $_SESSION["message"] = "El producto '$nombreProducto' se ha guardado correctamente.";

    // Redirigir al formulario
    header("Location: ../VISTA/administrador.php");
    exit();
} else {
    // Establecer una variable de sesión para el mensaje de error
    $_SESSION["status"] = "error";
    $_SESSION["message"] = "Error al guardar el producto. Inténtalo de nuevo.";

    // Redirigir al formulario
    header("Location: index.html");
    exit();
}

// Cierra la conexión a la base de datos
$conn->close();
?>
