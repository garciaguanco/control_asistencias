<?php
require_once('../conexion.php'); // Asegúrate de que la ruta sea correcta

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
} else {
    echo "Conexión exitosa.<br>";  // Solo para depuración
}

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $estado = $_POST['estado'];
    $fecha = date("Y-m-d");

    // SQL con placeholders para evitar inyecciones SQL
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

    // Cerrar la conexión después de completar todo (se asegura de que todo esté ejecutado antes de cerrarla)
    $conexion->close();
}
?>

<!-- Botón de inicio -->
<form action="http://localhost/control_asistencias/index.php" method="get">
    <button type="submit">Volver al inicio</button>
</form>




