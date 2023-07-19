<?php

// Incluir el archivo de configuración de la base de datos
require_once 'configuraciones/bd.php';

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

// Obtener el correo del destinatario de la base de datos
$conexion = BD::crearInstancia();
$sql = "SELECT correo FROM usuarios WHERE nombre = :nombre LIMIT 1";
$consulta = $conexion->prepare($sql);
$consulta->execute(['nombre' => $nombre]);
$resultado = $consulta->fetch(PDO::FETCH_ASSOC);
$destinatario = $resultado['correo'];

// Configurar el asunto y el cuerpo del correo
$asunto = "Este es un asunto";
$carta = "De: $nombre \n";
$carta .= "Correo: $correo \n";
$carta .= "Telefono: $telefono \n";
$carta .= "Mensaje: $mensaje";

// Enviar el correo
$mailEnviado = mail($destinatario, $asunto, $carta);

// Verificar si el correo se envió correctamente
if ($mailEnviado) {
    header('Location: mensaje-de-envio.html');
} else {
    // Mostrar un mensaje de error en caso de fallo en el envío
    echo "Error al enviar el correo. Por favor, inténtalo nuevamente.";
}
