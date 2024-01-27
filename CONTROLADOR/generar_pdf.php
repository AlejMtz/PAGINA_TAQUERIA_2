<?php

require('RECEIPT-main/fpdf.php'); // Ajusta la ruta según tu configuración

// Obtén los datos del carrito y del cliente desde la solicitud POST
$data = json_decode(file_get_contents("php://input"));

if ($data) {
    $cliente_id = $data->IDcliente;
    $items = $data->items;
    $total = $data->total;

    // Conecta a la base de datos (ajusta las credenciales según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "taqueria";

    $conexion = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }


    // Crear una instancia de FPDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Configura la fuente y el tamaño de la fuente
    $pdf->SetFont('Arial', 'B', 16);
    

    // Agregar el logotipo o imagen de encabezado (ajusta las coordenadas y el tamaño)
    $pdf->Image('imagenes/LOGO_TAQ_SINFONDO.png', 170, 10, 40);


    // Encabezado
    $pdf->Cell(190, 10, 'Reporte de Compra', 0, 1, 'C');

    // Obtiene la información del cliente
    $queryCliente = "SELECT * FROM clientes WHERE id = $cliente_id";
    $resultCliente = $conexion->query($queryCliente);
    $clienteData = $resultCliente->fetch_assoc();

    // Agrega información del cliente al PDF
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(190, 10, 'Informacion del Cliente:', 0, 1, 'L');
    $pdf->Cell(190, 10, 'ID: ' . $clienteData['id'], 0, 1, 'L');
    $pdf->Cell(190, 10, 'Nombre: ' . $clienteData['nombre'], 0, 1, 'L');
    $pdf->Cell(190, 10, 'Apellidos: ' . $clienteData['apellidos'], 0, 1, 'L');
    $pdf->Cell(190, 10, 'Direccion: ' . $clienteData['direccion'], 0, 1, 'L');
    $pdf->Cell(190, 10, 'Telefono: ' . $clienteData['telefono'], 0, 1, 'L');

    // Agrega información de los productos comprados al PDF
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(190, 10, 'Productos Comprados:', 0, 1, 'L');

    foreach ($items as $item) {
        $pdf->Cell(190, 10, 'Producto: ' . $item->name . ' - Precio: $' . $item->price, 0, 1, 'L');
    }

    

    // Agrega el total al PDF
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(190, 10, 'Total: $' . $total, 0, 1, 'C');

    
// Agregar el logotipo o imagen de encabezado (ajusta las coordenadas y el tamaño)
    $pdf->Image('imagenes/fondo_footer.jpg', 0, 170, 210);


    // Genera el PDF y lo muestra al usuario
    $pdf->Output();

    // Cierra la conexión a la base de datos
    $conexion->close();
} else {
    echo json_encode(["error" => "Datos no recibidos"]);
}
?>
