<?php

require_once "funciones.php";

$numPersonas = "";
$numHabitaciones = "";
$tipoHabitacion = "";
$tipoVista = "";
$incDesayuno = "";
$diaReserva = "";
$txtNombre = "";
$txtTelefono = "";

$seleccionTipoHabitacion = obtenerTipoHabitacion();
$seleccionTipoVista = obtenerTipoVista();
$seleccionDesayuno = obtenerDesayuno();

if(isset($_POST["btnProcesar"])){
$numPersonas = $_POST["numPersonas"];
$numHabitaciones = $_POST["numHabitaciones"];
$tipoHabitacion = $_POST["tipoHabitacion"];
$tipoVista = $_POST["tipoVista"];
$incDesayuno = $_POST["incDesayuno"];
$diaReserva = $_POST["diaReserva"];
$txtNombre = $_POST["txtNombre"];
$txtTelefono = $_POST["txtTelefono"];
$total = 0;
$isr = 0;
$ih = 0;
$granTotal = 0;

$reserva = array(
    "nombre"=>strtoupper($txtNombre),
    "telefono"=>$txtTelefono,
    "personas"=>$numPersonas,
    "habitaciones"=>$numHabitaciones,
    "tipoHabitacion"=>obtenerTipoHabitacionPorID($tipoHabitacion),
    "vista"=>obtenerTipoVistaPorID($tipoVista),
    "desayuno"=>obtenerDesayunoPorID($incDesayuno),
    "dia"=>$diaReserva,
    "total"=>$total,
    "isr"=>$isr,
    "ih"=>$ih,
    "granTotal"=>$granTotal,
);

$reserva["total"] = $reserva["dia"]*($reserva["habitaciones"] * ($reserva["tipoHabitacion"]["precio"] + $reserva["vista"]["precio"] + $reserva["desayuno"]["precio"]));
$reserva["isr"] = $reserva["total"] * 0.15;
$reserva["ih"] = $reserva["total"] * 0.18;
$reserva["granTotal"] = $reserva["total"] + $reserva["isr"] + $reserva["ih"];
guardarReserva($reserva);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel | Reservaciones</title>
</head>
<body>
    <h1>Hotel Vista al Mar</h1>
    <h2>Area de Reservaciones</h2>
    <form action="Reservacion.php" method="post">
    <a href="tabla.php" target="_blank">Ir a ver Reservaciones</a><br>
    <label for="txtNombre">Nombre del Cliente:</label>
    <input type="text" name="txtNombre" id="txtNombre" value="" placeholder="Nombre del Cliente"><br>
    <label for="txtNombre">Telefono:</label>
    <input type="text" name="txtTelefono" id="txtTelefono" value="" placeholder="Telefono del Cliente"><br>
    <label for="numPersonas">Numero de Personas:</label>
    <input type="number" name="numPersonas" id="numPersonas"><br>
    <label for="numHabitaciones">Numero de Habitaciones</label>
    <input type="number" name="numHabitaciones" id="numHabitaciones"><br>
    <label for="tipoHabitacion">Tipo de Habitacion: </label>
    <select name="tipoHabitacion" id="tipoHabitacion">
    <?php echo createComboOptions($seleccionTipoHabitacion, "id", "habitacion", $tipoHabitacion); ?>
    </select>
    <label for="tipoVista">Tipo de Vista: </label>
    <select name="tipoVista" id="tipoVista">
    <?php echo createComboOptions($seleccionTipoVista, "id", "descripcion", $tipoVista); ?>
    </select>
    <label for="incDesayuno">Desayuno: </label>
    <select name="incDesayuno" id="incDesayuno">
    <?php echo createComboOptions($seleccionDesayuno, "id", "descripcion", $incDesayuno); ?>
    </select><br>
    <label for="diaReserva">Dias de Reserva: </label>
    <select name="diaReserva" id="diaReserva">
    <?php 
    for($i=1; $i<=10;$i++){
        if($i==1){
            echo '<option value="'.$i.'" '.(($i==$diaReserva)? "selected":"").'>'.$i.' Dia</option>';
        }
        else{
            echo '<option value="'.$i.'" '.(($i==$diaReserva)? "selected":"").'>'.$i.' Dias</option>';
        }
    }
    ?>
    </select><br>
    <button type="submit" name="btnProcesar">Reservar</button>
    </form>
</body>
</html>