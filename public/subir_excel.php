<!-- "http://localhost/FFE_PRACTICAS/añadir_excel_a_bd/subir_excel.php" -->
 
<?php

// Cargar la librería PhpSpreadsheet mediante Composer
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

// CONEXIÓN A LA BASE DE DATOS
$conn = new mysqli("localhost", "root", "", "escuela_teatro"); 

// Si falla la conexión a la base de datos
if ($conn->connect_error) {
    die("Error de conexión");
}

// ARCHIVO SUBIDO DESDE EL FORMULARIO
// $_FILES['excel']['tmp_name'] es la ruta temporal donde PHP guarda el archivo subido
$archivo = $_FILES['excel']['tmp_name'];

// CARGAR ARCHIVO EXCEL
$spreadsheet = IOFactory::load($archivo);

// Obtener la hoja activa del Excel
// Representa la pestaña seleccionada del archivo
$sheet = $spreadsheet->getActiveSheet();

// RECORRER LAS FILAS DEL EXCEL
// toArray() convierte toda la hoja en un array bidimensional
foreach ($sheet->toArray() as $index => $fila) {

    /*
    Estructura del array generado:

    [
        ["nombre", "apellidos", "email", "telefono"],  ← cabecera (fila 0)
        ["Juan", "García", "a@a.com", "600..."],
        ["Ana", "López", "b@b.com", "600..."]
    ]

    $index → número de fila
    $fila  → array con los datos de cada fila
    */

    // Saltar la primera fila (cabecera del Excel)
    if ($index == 0) continue;

    // Asignar cada columna del Excel a una variable
    $nombre    = $fila[0];
    $apellidos = $fila[1];
    $email     = $fila[2];
    $telefono  = $fila[3];
    $fecha_alta = $fila[4];

    // Insertar datos en la tabla alumnos
    $stmt = $conn->prepare("
        INSERT INTO alumnos (nombre, apellidos, email, telefono, fecha_alta, estado)
        VALUES (?, ?, ?, ?, ?, 'activo')
    ");

    // Vincular parámetros a la consulta preparada
    $stmt->bind_param("sssss", $nombre, $apellidos, $email, $telefono, $fecha_alta);

    // Ejecutar la inserción
    $stmt->execute();
}

// Redirección
echo "<script>
window.location.href='registro.php?valor=1';
</script>";
exit;

?>