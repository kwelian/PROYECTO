<?php include('cabecera.php'); ?>
<?php include('cursos.php'); ?>
<?php
//seguridad de sesiones para pagina
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario'];
if ($varsesion == null || $varsesion = '') {
    header("Location: index.html");
    die();
}
?>
<style>
    body {
        background: linear-gradient(rgba(5, 7, 12, 0.2), rgba(5, 7, 12, 0.2)), url(css/imagenes/20008478_6229861.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        color: white;
    }

    .btn-container {
        margin-right: 10px;

    }

    .container {
        margin-top: 5.5rem;
        background-color: rgba(252, 195, 195, 0.04);
        border-radius: 10px;
        position: relative;
        backdrop-filter: blur(10px);

    }

    .custom-card-header {
        background-color: blue;
        color: white;
    }

    .card-header {
        border-radius: 5px;
        background-color: rgba(0, 128, 0, 1) !important;

    }

    .card-body {
        border-radius: 5px;
        background-color: rgba(0, 128, 0, 0.2);
    }
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="container">
    <div class="row">
        <div class="col-12">
            <br>
            <div class="row">
                <div class="col-md-5">
                    <form action="" method="post">
                        <div class="card ">
                            <div class="card-header text-white">
                                Citas
                            </div>
                            <div class="card-body">
                                <div class="mb-3 d-none">
                                    <label for="id" class="form-label">ID</label>
                                    <input type="text" class="form-control" name="id" id="id" value="<?php echo $id; ?>" aria-describedby="helpId" placeholder="ID">

                                </div>
                                <div class="mb-3">
                                    <label for="nombre_curso" class="form-label">Nombre de la cita</label>
                                    <input type="text" class="form-control" name="nombre_curso" id="nombre_curso" value="<?php echo $nombre_curso; ?>" aria-describedby="helpId" placeholder="">

                                </div>
                                <div class="btn-group" role="group" aria-label="Button group name">
                                    <div class="btn-container">
                                        <button type="submit" name="accion" value="agregar" class="btn btn-success">Agregar</button>
                                    </div>
                                    <div class="btn-container">
                                        <button type="submit" name="accion" value="editar" class="btn btn-warning">Editar</button>
                                    </div>
                                    <div class="btn-container">
                                        <button type="submit" name="accion" value="borrar" class="btn btn-danger">Borrar</button>
                                    </div>
                                </div>




                            </div>



                        </div>


                    </form>




                </div>


                <div class="col-md-7">

                    <div class="table-responsive">
                        <table class="table table-success">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listaCursos as $curso) { ?>
                                    <tr class="">
                                        <td> <?php echo $curso['id']; ?></td>
                                        <td><?php echo $curso['nombre_curso']; ?></td>
                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden" name="id" id="id" value="<?php echo $curso['id']; ?>">
                                                <input type="submit" value="Seleccionar" name="accion" class="btn btn-success">
                                            </form>


                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>

    </div>

</div>


<?php include('pie.php'); ?>