<?php
$mes = $_GET['mes'];
$anio = $_GET['anio'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "control_asistencias";

$conexion = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT estudiantes.nombre, estudiantes.apellido, estudiantes.categoria, asistencias.fecha, asistencias.estado 
        FROM asistencias
        JOIN estudiantes ON asistencias.estudiante_id = estudiantes.id
        WHERE MONTH(asistencias.fecha) = '$mes' AND YEAR(asistencias.fecha) = '$anio'
        ORDER BY asistencias.fecha";

$result = $conexion->query($sql);

echo "<h2>Resumen de Asistencia - Mes: $mes, Año: $anio</h2>";
echo "<table border='1'>
      <tr><th>Nombre</th><th>Apellido</th><th>Fecha</th><th>Estado</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['nombre']}</td><td>{$row['apellido']}</td><td>{$row['fecha']}</td><td>{$row['estado']}</td></tr>";
}

echo "</table>";

$conexion->close();
?>
