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
    header("Location: index.html");
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
  <!-- Encabezado con metadatos y enlaces a estilos y scripts -->
</head>
<body>

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

  <!-- Mensajes de éxito o error -->
  <?php
  if (isset($_SESSION["status"])) {
      if ($_SESSION["status"] == "success") {
          echo '<p style="color: green;">Producto modificado correctamente.</p>';
      } elseif ($_SESSION["status"] == "error") {
          echo '<p style="color: red;">Error al modificar el producto.</p>';
      }
      unset($_SESSION["status"]);
  }
  ?>

</body>
</html>
