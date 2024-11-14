<?php

require_once('../conexion.php'); // Asegúrate de que la ruta sea correcta


// Conexión a la base de datos
$servername = "localhost";
$username = "root";  // Usuario de MySQL
$password = "";  // Contraseña de MySQL
$dbname = "control_asistencias";  // Cambia por el nombre de tu base de datos

// Crear la conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

/// Comprobamos si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $estado = $_POST['estado'];
    $fecha = $_POST['fecha'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO asistencias (nombre,apellido,estado,fecha)
VALUES ('$nombre', '$apellido', '$estado', '$fecha')";

// Verificar si hay errores
if ($conexion->query($sql) === TRUE) {
    echo "Registro completado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

// Cerrar la conexión
}
?>



