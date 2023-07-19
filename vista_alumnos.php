<?php include('cabecera.php'); ?>
<?php include('alumnos.php'); ?>
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
<br>

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
        <div class="col-md-5">
            <form action="" method="post">
                <div class="card">
                    <div class="card-header  text-white">
                        Apreniz
                    </div>
                    <div class="card-body">
                        <div class="mb-3 d-none">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" class="form-control" name="id" value="<?php echo $id; ?>" id="id" aria-describedby="helpId" placeholder="ID">

                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" id="nombre" aria-describedby="helpId" placeholder="Escriba el nombre">

                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" value="<?php echo $apellidos; ?>" id="apellidos" aria-describedby="helpId" placeholder="Escriba los apellidos">

                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Cita del aprendiz</label>
                            <select multiple class="form-control" name="cursos[]" id="listaCursos">

                                <?php foreach ($cursos as $curso) { ?>
                                    <option <?php
                                            if (!empty($arregloCursos)) :
                                                if (in_array($curso['id'], $arregloCursos)) :
                                                    echo 'selected';
                                                endif;

                                            endif;



                                            ?> value="<?php echo $curso['id']; ?>"> <?php echo $curso['id']; ?> <?php echo $curso['nombre_curso']; ?> </option>

                                <?php } ?>

                            </select>
                            <div>
                                <br>
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
                        <?php foreach ($alumnos as $alumno) : ?>
                            <tr>
                                <td><?php echo $alumno['id']; ?> </td>
                                <td><?php echo $alumno['nombre']; ?> <?php echo $alumno['apellidos']; ?>
                                    <br>

                                    <?php foreach ($alumno["cursos"] as $curso) { ?>
                                        - <a href="certificado.php?idcurso=<?php echo $curso['id']; ?>&idalumno=<?php echo $alumno['id']; ?>"> <i class="bi bi-filetype-pdf text-danger"></i><?php echo $curso['nombre_curso']; ?> </a> <br>

                                    <?php } ?>

                                </td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?php echo $alumno['id']; ?> ">
                                        <input type="submit" value="Seleccionar" name="accion" class="btn btn-success">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script>
    new TomSelect('#listaCursos');
</script>
<?php include('pie.php'); ?>