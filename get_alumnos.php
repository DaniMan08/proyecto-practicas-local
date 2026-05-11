<?php
require __DIR__ . '/../src/conexion.php';

header('Content-Type: application/json');

// Validar parámetro
if (!isset($_GET['grupo_id']) || !is_numeric($_GET['grupo_id'])) {
    echo json_encode([]);
    exit;
}

$grupo_id = intval($_GET['grupo_id']);

$sql = "
    SELECT 
        a.id_alumno AS id, 
        CONCAT(a.nombre, ' ', a.apellidos) AS nombre
    FROM alumnos a
    INNER JOIN alumnos_grupo ag ON a.id_alumno = ag.alumno_id
    WHERE ag.grupo_id = ?
";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $grupo_id);
$stmt->execute();
$result = $stmt->get_result();

$alumnos = [];

while ($row = $result->fetch_assoc()) {
    $alumnos[] = $row;
}

echo json_encode($alumnos);
