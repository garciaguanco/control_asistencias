<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "control_asistencias";

$conexion = new mysqli($servername, $username, $password, $dbname);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT DISTINCT MONTH(fecha) as mes, YEAR(fecha) as anio FROM asistencias";
$result = $conexion->query($sql);

$links = [];
while ($row = $result->fetch_assoc()) {
    $links[] = $row;
}

$conexion->close();

echo json_encode($links);
?>
