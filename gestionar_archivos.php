<?php
session_start(); // Agregar esta línea para iniciar la sesión

// Archivo: gestionar_archivos.php

// Verificar si se ha enviado un formulario para subir un archivo
if (isset($_POST['submit']) && isset($_SESSION['usuario'])) {
    // Obtener información del archivo subido
    $nombreArchivo = $_FILES['archivo']['name'];
    $rutaArchivoTemporal = $_FILES['archivo']['tmp_name'];
    $nombreUsuario = $_SESSION['usuario'];

    // Directorio de destino para guardar los archivos subidos del usuario actual
    $directorioDestino = 'archivos/' . $nombreUsuario . '/';

    // Verificar si el directorio de destino para el usuario existe, si no, crearlo
    if (!is_dir($directorioDestino)) {
        mkdir($directorioDestino, 0777, true);
    }

    // Generar un nombre único para evitar conflictos de nombres
    $nombreArchivoUnico = uniqid() . '_' . $nombreArchivo;

    // Ruta completa del archivo en el directorio de destino
    $rutaArchivoDestino = $directorioDestino . $nombreArchivoUnico;

    // Mover el archivo subido al directorio de destino
    if (move_uploaded_file($rutaArchivoTemporal, $rutaArchivoDestino)) {
        // Archivo subido correctamente
        echo "El archivo se ha subido exitosamente.";
        // Redireccionar para evitar el reenvío del formulario
        header("Location: gestionar_archivos.php");
        exit();
    } else {
        // Error al mover el archivo
        echo "Error al subir el archivo.";
    }
}

// Eliminar un archivo si se ha seleccionado para eliminar
if (isset($_GET['eliminar']) && isset($_GET['directorioDestino'])) {
    $archivoEliminar = $_GET['eliminar'];
    $directorioDestino = $_GET['directorioDestino'];
    $rutaArchivoEliminar = $directorioDestino . $archivoEliminar;

    if (file_exists($rutaArchivoEliminar)) {
        if (unlink($rutaArchivoEliminar)) {
            // Archivo eliminado correctamente
            echo "El archivo se ha eliminado exitosamente.";
            // Redireccionar para evitar la eliminación repetida
            header("Location: gestionar_archivos.php");
            exit();
        } else {
            // Error al eliminar el archivo
            echo "Error al eliminar el archivo.";
        }
    } else {
        // El archivo no existe
        echo "El archivo no existe.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Gestor de Archivos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: linear-gradient(rgba(5, 7, 12, 0.2), rgba(5, 7, 12, 0.2)), url(css/imagenes/20008478_6229861.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            color: white;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.5);
            margin-top: 50px;
            padding: 20px;
            border-radius: 5px;
        }

        .file-card {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .file-card h5 {
            color: white;
        }

        .file-card a {
            color: white;
        }

        .file-card a:hover {
            text-decoration: none;
            color: #00aeff;
        }

        .btn-custom {
            background-color: #00aeff;
            color: white;
        }

        .btn-custom:hover {
            background-color: #0092cc;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Gestor de Archivos</h2>
        <form action="gestionar_archivos.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="archivo">Seleccione un archivo para subir:</label>
                <input type="file" class="form-control-file" id="archivo" name="archivo" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Subir Archivo</button>
        </form>
        <hr>
        <h4>Archivos:</h4>
        <?php
        if (isset($_SESSION['usuario'])) {
            $nombreUsuario = $_SESSION['usuario'];
            $directorioUsuario = 'archivos/' . $nombreUsuario . '/';

            if (is_dir($directorioUsuario)) {
                $archivos = array_diff(scandir($directorioUsuario), array('..', '.'));
                foreach ($archivos as $archivo) {
                    $rutaArchivo = $directorioUsuario . $archivo;
        ?>
                    <div class="file-card">
                        <h5><?php echo $archivo; ?></h5>
                        <a href="<?php echo $rutaArchivo; ?>" download><i class="fas fa-download"></i> Descargar</a>
                        <a href="gestionar_archivos.php?eliminar=<?php echo $archivo; ?>&directorioDestino=<?php echo $directorioUsuario; ?>" onclick="return confirm('¿Está seguro de eliminar este archivo?');"><i class="fas fa-trash-alt"></i> Eliminar</a>
                    </div>
        <?php
                }
            } else {
                echo "No se encontraron archivos.";
            }
        } else {
            echo "No se ha iniciado sesión.";
        }
        ?>
        <a href="index.php" class="btn btn-success">Ir al menú</a>
        <a href="correo.html" class="btn btn-success">Ir al correo</a>
    </div>

</body>


<script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>

</html>

<?php include('pie.php'); ?>