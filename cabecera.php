<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {

            margin: 0;
            padding: 0;
        }

        .header {
            background-color: rgba(242, 242, 242, 0.3);
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header a {
            font-size: 20px;
            color: white;
            text-decoration: none;
            margin-right: 20px;
            transition: color 0.2s ease;
            border-bottom: 2px solid transparent;
            /* Agregar una línea inferior transparente */
        }

        .header a:hover {
            color: #f5f5f5;
        }

        .header a.active {
            color: #f5f5f5;
            border-bottom: 2px solid white;
        }

        @media only screen and (max-width: 600px) {
            .header a {
                display: block;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <a href="index.php">Inicio</a>
        <a href="vista_alumnos.php">Aprendiz</a>
        <a href="vista_cursos.php">Citas</a>
        <a href="gestionar_archivos.php">Gestionar archivos</a>
        <a href="cerrar_sesion.php">Cerrar Sesión</a>
    </div>

    <script>
        // Obtener la URL de la página actual
        var currentUrl = window.location.href;

        // Obtener todos los enlaces dentro de la clase "header"
        var links = document.querySelectorAll('.header a');

        // Iterar sobre los enlaces y verificar si la URL coincide con el atributo "href"
        for (var i = 0; i < links.length; i++) {
            if (links[i].href === currentUrl) {
                links[i].classList.add('active'); // Agregar la clase "active" al enlace actual
                break; // Salir del bucle después de encontrar la coincidencia
            }
        }
    </script>

</html>