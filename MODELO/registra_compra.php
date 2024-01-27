<?php
include 'informacion_bd.php';

// Verificar si hubo un error en la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Recibir datos del carrito desde la solicitud POST
$data = json_decode(file_get_contents("php://input"));

if ($data) {
    //OBTENDO VALORES DE cartData DE JS EN CARRITO
    $cliente_id = $data->IDcliente;
    $total = $data->total;
    $items = $data->items;

    // PRIMERO SE inserta un registro en la tabla 'tickets'
    $sqlInsertTicket = "INSERT INTO tickets (cliente_id, total) VALUES ($cliente_id, $total)";
    if ($conexion->query($sqlInsertTicket) === TRUE) {
        //OBTENIDO EL ID DEL TICKET PARA RELACIONARLO CON LAS COMPRAS
        $ticket_id = $conexion->insert_id;

        // Insertar cada producto en la base de datos
        foreach ($items as $item) {
            if ($item !== null) {
                $nombreProducto = $item->name;
                $precioProducto = $item->price;

                // Realizar la inserción en la tabla 'compras'
                $sql = "INSERT INTO compras (nombre_producto, precio_producto, fecha_compra,	id_ticket) VALUES ('$nombreProducto', $precioProducto, NOW(),$ticket_id)";

                if ($conexion->query($sql) !== TRUE) {
                    echo json_encode(["error" => "Error al guardar en la base de datos"]);
                    $conexion->close();
                    exit;
                }
            }
        }
    }
    else{
        echo json_encode(["error" => "Error al guardar el ticket en la base de datos"]);
        $conexion->close();
        exit;
    }

    echo json_encode(["total" => $total, "id_ticket" => $ticket_id]);
} else {
    echo json_encode(["error" => "Datos no recibidos"]);
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
