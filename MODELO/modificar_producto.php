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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombreProducto = $_POST["nombreProducto"];
    $cantidad = $_POST["cantidad"];
    $descripcion = $_POST["descripcion"];
    $categoria = $_POST["categoria"];
    $precio = $_POST["precio"];

    $sqlUpdateProducto = "UPDATE inventario SET
                          nombre = '$nombreProducto',
                          cantidad = '$cantidad',
                          descripcion = '$descripcion',
                          categoria = '$categoria',
                          precio = '$precio'
                          WHERE id = $id";

    if ($conn->query($sqlUpdateProducto) === TRUE) {
        $_SESSION["status"] = "success";
    } else {
        $_SESSION["status"] = "error";
    }

    $conn->close();
    header("Location: ../VISTA/inventario.php");
    exit();
} elseif (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    // Obtener los datos del producto a modificar
    $sqlSelectProducto = "SELECT * FROM inventario WHERE id = $id";
    $result = $conn->query($sqlSelectProducto);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        // Redirigir si el producto no existe
        header("Location: index.html");
        exit();
    }
} else {
    // Redirigir si no se proporciona un ID
    header("Location: index.html");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Taquería Chester</title>
  <link rel="stylesheet" href="../ESTILOS/estilos.css">
  <link rel="stylesheet" href="../ESTILOS/estilo_inv.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

  <header>
    <img src="../imagenes/LOGO_TAQ_SINFONDO.png" alt="Logo de Taquería Chester" class="logo">
    <h1>Taquería Chester</h1>
    <p>¡En precio y calidad somos la mejor opción!</p>
  </header>


  <h3>Inventario de Taquería Chester</h3>
  <h2>Modifica el producto de tu inventario</h2>

 
<!-- Formulario para modificar productos -->
<form action="../MODELO/modificar_producto.php" method="POST">
    <!-- Campos del formulario -->
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    
    <label for="nombreProducto">Nombre del Producto:</label>
    <input type="text" name="nombreProducto" id="nombreProducto" value="<?php echo $row["nombre"]; ?>" required>

    <label for="cantidad">Cantidad (kg o piezas):</label>
    <input type="number" name="cantidad" id="cantidad" value="<?php echo $row["cantidad"]; ?>" required>
    
    <label for="precio">Precio:</label>
    <input type="number" name="precio" id="precio" value="<?php echo $row["precio"]; ?>" required>
    
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion" required><?php echo $row["descripcion"]; ?></textarea>

    <label for="categoria">Categoría:</label>
    <select name="categoria" id="categoria">
        <option value="carnes" <?php echo ($row["categoria"] == 'carnes') ? 'selected' : ''; ?>>Carnes</option>
        <option value="verduras" <?php echo ($row["categoria"] == 'verduras') ? 'selected' : ''; ?>>Verduras</option>
        <option value="frutas" <?php echo ($row["categoria"] == 'frutas') ? 'selected' : ''; ?>>Frutas</option>
        <option value="refrescos" <?php echo ($row["categoria"] == 'refrescos') ? 'selected' : ''; ?>>Refrescos</option>
    </select>

    <!-- Botón para enviar el formulario -->
    <br>
    <br>
    <button type="submit">Guardar Cambios</button>
  </form>

  



  <footer>
    <p>&copy; 2024 Taquería Chester</p>
    <ol>
      <a href="../VISTA/ubicacion.html">Ubicación</a>
      <br>
      <a href="aviso.html">Aviso de privacidad</a>
      <br>
      <a href="terminos.html">Términos y Condiciones</a>
    </ol>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
