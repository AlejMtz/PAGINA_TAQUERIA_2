<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Taquería Chester</title>
  <link rel="stylesheet" href="../ESTILOS/estilos.css">
  <link rel="stylesheet" href="../ESTILOS/estilo_inv.css">
  <link rel="stylesheet" href="../ESTILOS/estilo_tablas_inv.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

  <header>
    <img src="../imagenes/LOGO_TAQ_SINFONDO.png" alt="Logo de Taquería Chester" class="logo">
    <h1>Taquería Chester</h1>
    <p>¡En precio y calidad somos la mejor opción!</p>
  </header>

  <nav>
    <a href="../VISTA/administrador.php">Administrador</a>
  </nav>

  <h3>Inventario de Taquería Chester</h3>
  <h2>Agregar Producto al Inventario</h2>

  <!-- Formulario para agregar productos -->
  <form action="../MODELO/guardar_productos.php" method="POST">
    <!-- Campos del formulario -->
    <label for="nombreProducto">Nombre del Producto:</label>
    <input type="text" name="nombreProducto" id="nombreProducto" required>

    <label for="cantidad">Cantidad (kg o piezas):</label>
    <input type="number" name="cantidad" id="cantidad" required>
    
    <label for="precio">Precio:</label>
    <input type="number" name="precio" id="precio" required>
    
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion" required></textarea>

    <label for="categoria">Categoría:</label>
    <select name="categoria" id="categoria">
        <option value="carnes">Carnes</option>
        <option value="verduras">Verduras</option>
        <option value="frutas">Frutas</option>
        <option value="refrescos">Refrescos</option>
    </select>

    <!-- Botón para enviar el formulario -->
    <br>
    <br>
    <button type="submit">Guardar Producto</button>
  </form>


  <!-- Tabla para mostrar el inventario -->
  <table border="1">
  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Cantidad</th>
    <th>Descripción</th>
    <th>Categoría</th>
    <th>Precio</th>
    <th>Acciones</th> <!-- Nueva columna para acciones -->
  </tr>

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

  // Obtener registros de la base de datos
  $sqlSelectProductos = "SELECT * FROM inventario";
  $result = $conn->query($sqlSelectProductos);

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . $row["id"] . '</td>';
          echo '<td>' . $row["nombre"] . '</td>';
          echo '<td>' . $row["cantidad"] . '</td>';
          echo '<td>' . $row["descripcion"] . '</td>';
          echo '<td>' . $row["categoria"] . '</td>';
          echo '<td>' . $row["precio"] . '</td>';
          
          //ACTUALIZAR O ELIMINAR
          echo '<td>';
          echo '<a href="../MODELO/modificar_producto.php?id=' . $row["id"] . '">Modificar</a> | ';
          echo '<a href="../MODELO/eliminar_producto.php?id=' . $row["id"] . '">Eliminar</a>';
          echo '</td>';
          echo '</tr>';
      }
  } else {
      echo '<tr><td colspan="7">No hay productos registrados.</td></tr>';
  }
  ?>
</table>


  <footer>
    <p>&copy; 2024 Taquería Chester</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
