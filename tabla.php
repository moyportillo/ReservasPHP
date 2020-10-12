<?php

require_once "funciones.php";

$reservas = obtenerReservas();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Reservaciones</title>
</head>
<body>
<h1>Reservas</h1>
    <table>
    <thead>
    <tr>
    <th>No.</th>
    <th>A Nombre de</th>
    <th>Telefono</th>
    <th>No. de Personas</th>
    <th>No. de Habitacion</th>
    <th>Tipo de Habitacion</th>
    <th>Vista</th>
    <th>Desayuno</th>
    <th>Dias de Reserva</th>
    <th>Subtotal</th>
    <th>ISR(15%)</th>
    <th>ISH(18%)</th>
    <th>Total</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $contador = 1;
    foreach($reservas as $reserva){
    ?>
        <tr>
    <td><?php echo $contador; ?></td>
    <td><?php echo $reserva["nombre"]; ?></td>
    <td><?php echo $reserva["telefono"]; ?></td>
    <td><?php echo $reserva["personas"]; ?></td>
    <td><?php echo $reserva["habitaciones"]; ?></td>
    <td><?php echo $reserva["tipoHabitacion"]["habitacion"]; ?></td>
    <td><?php echo $reserva["vista"]["descripcion"]; ?></td>
    <td><?php echo $reserva["desayuno"]["descripcion"]; ?></td>
    <td><?php echo $reserva["dia"]; ?></td>
    <td><?php echo $reserva["total"]; ?></td>
    <td><?php echo $reserva["isr"]; ?></td>
    <td><?php echo $reserva["ih"]; ?></td>
    <td><?php echo $reserva["granTotal"]; ?></td>
    </tr>
    <?php
    $contador++;
    }
    ?>
    </tbody>
    </table>
</body>
</html>