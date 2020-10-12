<?php

session_start();

function guardarReserva($reserva){
    $reservas = array();
    if(isset($_SESSION["reservas"])){
        $reservas = $_SESSION["reservas"];
    }

    $reservas[] = $reserva;
    $_SESSION["reservas"] = $reservas;
}

function obtenerReservas(){
    $reservas = array();
    if(isset($_SESSION["reservas"])){
        $reservas = $_SESSION["reservas"];
    }
    return $reservas;
}

function obtenerTipoHabitacion(){
    return array(
        array("id"=>"001", "habitacion"=>"Individual", "precio"=>800),
        array("id"=>"002", "habitacion"=>"Doble", "precio"=>1300),
        array("id"=>"003", "habitacion"=>"Triple", "precio"=>1600),
        array("id"=>"004", "habitacion"=>"Queen", "precio"=>1200),
        array("id"=>"005", "habitacion"=>"King", "precio"=>1500),
        array("id"=>"006", "habitacion"=>"Estudio", "precio"=>2300),
        array("id"=>"007", "habitacion"=>"Mini-Suite", "precio"=>2500),
        array("id"=>"008", "habitacion"=>"Master Suite", "precio"=>3000),
    );
}

function obtenerTipoHabitacionPorID($id){
    $mesa = array();
    foreach(obtenerTipoHabitacion() as $mesaI){
        if($mesaI["id"] == $id){
            $mesa = $mesaI;
        break;
        }
    }
    return $mesa;
}

function obtenerTipoVista(){
    return array(
        array("id"=>"Vis1", "descripcion"=>"Sin Vista", "precio"=>0),
        array("id"=>"Vis2", "descripcion"=>"Vista al Mar", "precio"=>150),
        array("id"=>"Vis3", "descripcion"=>"Vista al Hotel", "precio"=>80),
    );
}

function obtenerTipoVistaPorID($id){
    $vista = array();
    foreach(obtenerTipoVista() as $vistaI){
        if($vistaI["id"] == $id){
            $vista = $vistaI;
        break;
        }
    }
    return $vista;
}

function obtenerDesayuno(){
    return array(
        array("id"=>"N2", "descripcion"=>"No Incluida", "precio"=>0),
        array("id"=>"S1", "descripcion"=>"Incluida", "precio"=>80),
    );
}

function obtenerDesayunoPorID($id){
    $desayuno = array();
    foreach(obtenerDesayuno() as $desayunoI){
        if($desayunoI["id"] == $id){
            $desayuno = $desayunoI;
        break;
        }
    }
    return $desayuno;
}

function createComboOptions($arreglo, $valueCol, $texCol, $selectedValue){
    $htmlBuffer = "";
    foreach($arreglo as $element){
        $htmlBuffer .= '<option value="'.$element[$valueCol].'" '.(($element[$valueCol]==$selectedValue)? "selected":"").'>'.$element[$texCol].'</option>';
    }
    return $htmlBuffer;
}

?>