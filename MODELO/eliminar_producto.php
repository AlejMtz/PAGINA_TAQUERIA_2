<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "taqueria";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    $sqlDeleteProducto = "DELETE FROM inventario WHERE id = $id";

    if ($conn->query($sqlDeleteProducto) === TRUE) {
        $_SESSION["status"] = "success";
        $_SESSION["message"] = "Producto eliminado correctamente.";
    } else {
        $_SESSION["status"] = "error";
        $_SESSION["message"] = "Error al eliminar el producto.";
    }
}

$conn->close();

header("Location: ../VISTA/inventario.php");
exit();
?>
