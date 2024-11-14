<?php
require_once '../conexion.php'; // Asegúrate de que la ruta sea correcta

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
} else {
    echo "Conexión exitosa.<br>"; // Solo para depuración
}

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $estado = $_POST['estado'];
    $fecha = date("Y-m-d");

    // Verificar si ya existe un registro con los mismos datos
    $check_sql = "SELECT * FROM asistencias WHERE nombre = ? AND apellido = ? AND fecha = ?";
    if ($check_stmt = $conexion->prepare($check_sql)) {
        $check_stmt->bind_param("sss", $nombre, $apellido, $fecha);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        // Si ya existe un registro, no insertamos un nuevo registro
        if ($result->num_rows > 0) {
            echo "El registro ya existe.";
        } else {
            // Insertar solo si no existe un registro duplicado
            $sql = "INSERT INTO asistencias (nombre, apellido, estado, fecha) VALUES (?, ?, ?, ?)";

            // Preparar la consulta
            if ($stmt = $conexion->prepare($sql)) {
                // Vincular los parámetros
                $stmt->bind_param("ssss", $nombre, $apellido, $estado, $fecha);

                // Ejecutar la consulta
                if ($stmt->execute()) {
                    echo "Asistencia registrada correctamente";
                } else {
                    echo "Error al registrar asistencia: " . $stmt->error;
                }

                // Cerrar el statement
                $stmt->close();
            } else {
                echo "Error al preparar la consulta: " . $conexion->error;
            }
        }

        // Cerrar el statement de verificación
        $check_stmt->close();
    }

    // Cerrar la conexión después de completar todo
    $conexion->close();
}
?>

<!-- Botón de inicio -->
<form action="http://localhost/control_asistencias/index.php" method="get">
    <button type="submit">Volver al inicio</button>
</form>