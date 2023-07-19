<?php
// Incluir el archivo de conexión a la base de datos (bd.php)
include_once 'configuraciones/bd.php';

// Crear una instancia de la conexión a la base de datos
$conexion = BD::crearInstancia();

// Función para obtener la lista de carpetas y archivos
function obtenerCarpetasArchivos()
{
    global $conexion;

    // Consulta para obtener las carpetas
    $consultaCarpetas = $conexion->query("SELECT * FROM carpeta");

    // Obtener resultados de la consulta de carpetas
    $carpetas = $consultaCarpetas->fetchAll(PDO::FETCH_ASSOC);

    // Mostrar la lista de carpetas y archivos
    echo '<h2>Carpetas</h2>';
    echo '<ul>';
    foreach ($carpetas as $carpeta) {
        echo '<li><a href="verCarpeta.php?id=' . $carpeta['ID'] . '">' . $carpeta['Nombre'] . '</a> - <a href="editarCarpeta.php?id=' . $carpeta['ID'] . '">Editar</a> - <a href="eliminarCarpeta.php?id=' . $carpeta['ID'] . '">Eliminar</a></li>';
    }
    echo '</ul>';
}

// Mostrar la lista de carpetas y archivos
obtenerCarpetasArchivos();
