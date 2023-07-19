<?php
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
session_start();
$_SESSION['usuario'] = $usuario;

$conexion = mysqli_connect("localhost", "root", "", "aplicacion");

$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña='$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $filas = mysqli_fetch_array($resultado);

    if ($filas['id_cargo'] == 1) { // administrador
        header("Location: admin/admin.php");
        exit();
    } elseif ($filas['id_cargo'] == 2) { // instructor
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: error_sesion.html");
    exit();
}

mysqli_free_result($resultado);
mysqli_close($conexion);
