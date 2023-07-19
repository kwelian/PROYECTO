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

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(rgba(5, 7, 12, 0), rgba(5, 7, 12, 0)), url(../css/imagenes/20008478_6229861.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            color: white;
        }

        .card-img-top {
            max-height: 160px;
            object-fit: contain;
        }

        .custom-bg {
            margin-top: 90px;
            background-color: rgba(242, 242, 242, 0.3);
            padding-bottom: 28px;
            border-radius: 5px;
        }

        .card {
            background-color: rgba(242, 242, 242, 0.3);
        }
    </style>
</head>


<body>
    <div class="container bg-lg custom-bg">
        <h1>Bienvenido al Sistema de Llamado a Comité</h1>
        <p>Gestione los archivos de una forma simple</p>
        <hr>
        <p>Secciones</p>

        <div id="slider" class="carousel slide custom-slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <img src="../imagenes/users_people_workers_customers_icon_124243.png" class="card-img-top" alt="Aprendiz">
                                <div class="card-body">
                                    <h5 class="card-title">Ver usuarios</h5>
                                    <p class="card-text">Vea coordinadores, instructores y aprendices</p>

                                    <div class="d-grid gap-2 col-6 mx-auto text-center">
                                        <a href="ver_usuario.php" class="btn btn-success" type="button">Ir a la página de ver usuarios</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <img src="../imagenes/3643772-archive-archives-document-folder-open_113445.png" class="card-img-top" alt="Gestionar archivos">
                                <div class="card-body">
                                    <h5 class="card-title">Gestionar archivos</h5>
                                    <p class="card-text">Gestione los archivos.</p>
                                    <div class="d-grid gap-2 col-6 mx-auto text-center">
                                        <a href="correo_admin.php" class="btn btn-success" type="button">Ir a gestionar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <img src="../imagenes/4115235-exit-logout-sign-out_114030.png" class="card-img-top" alt="Salir">
                                <div class="card-body">
                                    <h5 class="card-title">Ir al inicio de sesión</h5>
                                    <p class="card-text">Haga clic para salir.</p>
                                    <div class="d-grid gap-2 col-6 mx-auto text-center">
                                        <a href="../cerrar_sesion.php" class="btn btn-success" type="button">Ir al inicio de sesión</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>

</html>





<?php include('../pie.php'); ?>