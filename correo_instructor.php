<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Sistema de envio</title>
</head>

<body>
    <form method="post" action="">
        <input type="text" placeholder="name" name="name" require>
        <input type="email" placeholder="email" name="email" require>
        <input type="text" placeholder="asunto" name="asunto" require>
        <textarea placeholder="mensaje" name="msg"></textarea>
        <input type="submit" name="enviar">
    </form>

    <?php
    include("correo.php")
    ?>
</body>

</html>