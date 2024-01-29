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
    <a href="../VISTA/inventario.php">Inventario</a>
  </nav>

  <h3>Pagina del administrador Taquería Chester</h3>
  <h2>Administra tus productos</h2>

    <!-- Tabla para mostrar el inventario -->
    <table border="1">
  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Categoría</th>
    <th>Descripción</th>
    <th>Precio</th>
    <th>Acciones</th>
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
  $sqlSelectProductos = "SELECT * FROM productos";
  $result = $conn->query($sqlSelectProductos);

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . $row["id"] . '</td>';
          echo '<td>' . $row["nombre"] . '</td>';
          echo '<td>' . $row["categoria"] . '</td>';
          echo '<td>' . $row["descripcion"] . '</td>';
          echo '<td>' . $row["precio"] . '</td>';
          
          
          //ACTUALIZAR O ELIMINAR
          echo '<td>';
          echo '<a href="../MODELO/modificar_tacos.php?id=' . $row["id"] . '">Modificar</a> | ';
          echo '<a href="../MODELO/eliminar_tacos.php?id=' . $row["id"] . '">Eliminar</a>';
          echo '</td>';
          echo '</tr>';
      }
  } else {
      echo '<tr><td colspan="7">No hay productos registrados.</td></tr>';
  }
  ?>
</table>
<br>
<br>

<h3 class="titulo">AGREGA MÁS PRODUCTOS</h3>
  <!-- Formulario para agregar productos -->
  <form action="../MODELO/guardar_tacos.php" method="POST">
    <!-- Campos del formulario -->
    <label for="nombreProducto">Nombre del Producto:</label>
    <input type="text" name="nombreProducto" id="nombreProducto" required>

    <br> <br>
    <label for="categoria">Categoría:</label>
    <select name="categoria" id="categoria">
        <option value="Tacos">Tacos</option>
        <option value="1/4 de kilo">1/4 de kilo</option>
        <option value="1/2 de kilo">1/2 de kilo</option>
        <option value="3/4 de kilo">3/4 de kilo</option>
        <option value="kilo">1 kilo</option>
        <option value="refrescos">refrescos</option>
        <option value="tortas">tortas</option>
    </select>

    <br> <br>
    <label for="precio">Precio:</label>
    <input type="number" name="precio" id="precio" required>
    <br><br>
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion" required></textarea>


    <!-- Botón para enviar el formulario -->
    <br>
    <br>
    <button type="submit">Guardar Producto</button>
  </form>


  <footer>
    <p>&copy; 2024 Taquería Chester</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
