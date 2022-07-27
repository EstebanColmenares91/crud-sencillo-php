<?php
    include('./templates/header.php')
?>

<?php
    if (!isset($_GET['id'])) {
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once './models/conexion.php';

    $id = $_GET['id'];
    $sentencia = $bd -> prepare(' SELECT * FROM persona WHERE id = ?; ');
    $sentencia -> execute([$id]);

    $persona = $sentencia -> fetch(PDO::FETCH_OBJ);
?>



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>

                <form method="POST" class="p-4" action="./editarProceso.php">
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Nombre:
                            <input type="text" class="form-control" name="nombre" autofocus required value="<?php echo $persona -> nombre;?>">
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            edad:
                            <input type="number" class="form-control" name="edad" autofocus required value="<?php echo $persona -> edad;?>">
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Signo:
                            <input type="text" class="form-control" name="signo" autofocus required value="<?php echo $persona -> signo;?>">
                        </label>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $persona -> id;?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>