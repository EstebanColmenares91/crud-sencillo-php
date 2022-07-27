<?php

    print_r($_POST);

    if (!isset($_POST['id'])) {
        header('Location: index.php?mensaje=error');
        echo "error";
    }

    include_once 'models/conexion.php';

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $edad =   $_POST['edad'];
    $signo =  $_POST['signo'];

    $sentencia = $bd -> prepare("UPDATE persona SET nombre = ?, edad = ?, signo = ?  WHERE id = ?;");
    $sentencia -> execute([$nombre, $edad, $signo, $id]);

    if ($sentencia) {
        header('Location: index.php?mensaje=editadoCorrectamente');
    }else {
        header('Location: index.php?mensaje=editadoCorrectamente');
    }

?>