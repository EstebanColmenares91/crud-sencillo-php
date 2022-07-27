<?php
    include('./templates/header.php')
?>

<?php
    include_once "models/conexion.php";
    $sentencia = $bd -> query("SELECT * FROM persona");
    $persona = $sentencia -> fetchAll(PDO::FETCH_OBJ);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    lista de personas
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">nombre</th>
                                <th scope="col">edad</th>
                                <th scope="col">signo</th>
                                <th scope="col">opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($persona as $dato){
                            ?>
                            <tr>
                                <td scope="row"><?php echo $dato -> id;?></td>
                                <td><?php echo $dato -> nombre;?></td>
                                <td><?php echo $dato -> edad;?></td>
                                <td><?php echo $dato -> signo;?></td>
                                <td class="text-success"><a href="./editar.php?id=<?php echo $dato -> id;?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td class="text-danger"><a href="./eliminar.php?id=<?php echo $dato -> id;?>"><i class="bi bi-x-lg"></i></a></td>
                            </tr>
                            <?php
                                }
                            ?>       
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>

                <form method="POST" class="p-4" action="./registrar.php">
                    <div class="mb-3">
                        <label for="" class="form-label container-fluid">
                            Nombre:
                            <input type="text" class="form-control" name="nombre" autofocus required>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            edad:
                            <input type="number" class="form-control" name="edad" autofocus required>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">
                            Signo:
                            <input type="text" class="form-control" name="signo" autofocus required>
                        </label>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="registrar">
                    </div>
                </form>

            </div>
        </div>
    </div> 
</div>

<?php
    include('./templates/footer.php')
?>



