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

    // Comprobar si el formulario de confirmación ha sido enviado
    if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
        // Eliminar el producto
        $sqlDeleteProducto = "DELETE FROM productos WHERE id = $id";

        if ($conn->query($sqlDeleteProducto) === TRUE) {
            $_SESSION["status"] = "success";
            $_SESSION["message"] = "Producto eliminado correctamente.";
        } else {
            $_SESSION["status"] = "error";
            $_SESSION["message"] = "Error al eliminar el producto.";
        }

        $conn->close();
        header("Location: ../VISTA/administrador.php");
        exit();
    }

    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../ESTILOS/estilo_eliminar.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Confirmar eliminación</title>
       
    </head>
    <body>
        <div class="confirmation-container">
            <h2>¿Estás seguro de que deseas eliminar este producto?</h2>
            <form method="post">
                <input type="hidden" name="confirm" value="yes">
                <button type="submit">Sí, eliminar</button>
                <a href="../VISTA/administrador.php">Cancelar</a>
            </form>
        </div>
    </body>
    </html>
    <?php
    exit(); // Salir del script después de mostrar el formulario de confirmación
}

$conn->close();

header("Location: ../VISTA/administrador.php");
exit();
?>
