<?php
// Conexión a la base de datos (ajusta estos datos según tu configuración)
$conexion = new mysqli("localhost", "root", "", "control_asistencias");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para obtener los datos de asistencias
$query = "SELECT nombre, apellido, categoria, estado, fecha FROM asistencias";
$resultado = $conexion->query($query);

// Verificar si la consulta obtuvo resultados
if ($resultado->num_rows > 0) {
    // Crear una fila para cada registro
    while ($fila = $resultado->fetch_assoc()) {
        // Asignar una clase CSS basada en el estado
        $estadoClass = '';
        switch ($fila['estado']) {
            case 'Presente':
                $estadoClass = 'presente'; // Clase para color verde
                break;
            case 'Ausente':
                $estadoClass = 'ausente'; // Clase para color rojo
                break;
            case 'Tardanza':
                $estadoClass = 'tardanza'; // Clase para color amarillo
                break;
        }

        // Imprimir la fila con la clase correspondiente en la columna "Estado"
        echo "<tr>
                <td>" . htmlspecialchars($fila['nombre']) . "</td>
                <td>" . htmlspecialchars($fila['apellido']) . "</td>
                <td>" . htmlspecialchars($fila['categoria']) . "</td>
                <td class='{$estadoClass}'>" . htmlspecialchars($fila['estado']) . "</td>
                <td>" . htmlspecialchars($fila['fecha']) . "</td>
              </tr>";
    }
} else {
    // Si no hay resultados, mostrar mensaje
    echo "<tr><td colspan='4'>No hay registros disponibles</td></tr>";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>


