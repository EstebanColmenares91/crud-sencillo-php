<?php

    if (empty($_POST["oculto"]) || empty($_POST["nombre"]) || empty($_POST["edad"]) || empty($_POST["signo"])) {
        header('Location: index.php?mensaje=faltanDatos');
        /* HEADER REEDIRECCIONA A OTRA PÁGINA */
        exit();
    }

    include_once './models/conexion.php';

    $nombre = $_POST['nombre'];
    $edad =   $_POST['edad'];
    $signo =  $_POST['signo'];
    
    $sentencia = $bd -> prepare(" INSERT INTO persona(nombre, edad, signo) VALUES (?,?,?);");

    $resultado = $sentencia -> execute([$nombre, $edad, $signo]) ;

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registradoCorrectamente');
    }else{
        header('Location: index.php?mensaje=registradoIncorrectamente');
        exit();
    }
?>

