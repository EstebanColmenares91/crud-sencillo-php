<?php
    if (!isset($_GET['id'])) {
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once './models/conexion.php';

    $id = $_GET['id'];

    $sentencia = $bd -> prepare('DELETE FROM persona WHERE id = ?;');
    $resultado = $sentencia -> execute([$id]);

    if ($resultado) {
        header('Location: index.php?mensaje=eliminadoCorrectamente');
    }


?>