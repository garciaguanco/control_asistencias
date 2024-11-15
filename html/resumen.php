<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Resumen de Asistencias</title>
        <link rel="stylesheet" href="../css/style.css" />
    </head>
    <body>
        <h1>Resumen de Asistencias</h1>

        <!-- Tabla para mostrar el acumulado de asistencias -->
        <table border="1" id="tabla-resumen">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Categoria</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <!-- Los datos se insertarán aquí desde el archivo PHP -->
                <?php include '../php/mostrar_resumen.php'; ?>
            </tbody>
        </table>

        <!-- Botón para volver al inicio -->
        <br />
        <a href="../index.php">
            <button>Volver al inicio</button>
        </a>
    </body>
</html>


