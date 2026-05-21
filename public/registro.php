<?php
session_start();

// Solo Admin puede acceder a esta página
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['tipo'] !== 'Admin') {
    echo "<h2>No tienes permiso para acceder a esta página.</h2>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de usuarios</title>
    <link rel="stylesheet" href="/proyecto-practicas-local/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        #excel{margin-top: 100px;}
    </style>
</head>

<body>

<header class="cabecera">
    <h1>ESCUELA DE TEATRO</h1>
</header>

<aside class="barra-lateral">

    <a href="index.php" class="icono activo">
        <i class="fas fa-home"></i>
        <span>Inicio</span>
    </a>

    <a href="mensajeria.php" class="icono">
        <i class="fas fa-comment"></i>
        <span>Mensajes</span>
    </a>

    <?php if ($_SESSION['tipo'] === 'Admin') { ?>
        <a href="registro.php" class="icono">
            <i class="fas fa-users"></i>
            <span>Registro de Grupos</span>
        </a>
    <?php } ?>
    
    <a href="registro.php" class="icono activo" title="Usuarios">
        <i class="fas fa-user"></i>
        <span>Registro de Usuarios</span>
    </a>


    <a href="logout.php" class="icono">
        <i class="fas fa-right-from-bracket"></i>
        <span>Cerrar Sesión</span>
    </a>

</aside>

<main class="contenido">

    <h2>Registro de usuarios</h2>

    <?php
    if (isset($_GET['ok'])) {

        $mensajes = [
            'profesor'        => 'Profesor registrado correctamente.',
            'alumno'          => 'Alumno registrado correctamente.',
            'posible_alumno'  => 'Posible alumno registrado correctamente.',
            'usuario'         => 'Usuario del sistema registrado correctamente.'
        ];

        if (isset($mensajes[$_GET['ok']])) {
            echo "<p>{$mensajes[$_GET['ok']]}</p>";
        }
    }
    ?>

    <p class="subtitulo-inicio subtitulo-mensajes">Selecciona qué tipo de usuario deseas registrar:</p>

<div class="registro-opciones">

    <a href="crear_profesor.php" class="opcion">
        <div class="circulo"></div>
        <span>Registrar Profesor</span>
    </a>

    <a href="crear_alumno.php" class="opcion">
        <div class="circulo"></div>
        <span>Registrar Alumno</span>
    </a>

    <a href="crear_posible_alumno.php" class="opcion">
        <div class="circulo"></div>
        <span>Registrar Posible Alumno</span>
    </a>

    <a href="crear_usuario.php" class="opcion">
        <div class="circulo"></div>
        <span>Registrar Usuario del Sistema</span>
    </a>

</div>
 
<!---------- Importar excel -------------->
<div>
    <h2 id="excel">Importar excel</h2>
    <p>Elige esta opción si deseas añadir alumnos a la base de datos desde un archivo de excel</p>
                                    <!-- enctype="multipart/form-data" necesario para subir ficheros -->
    <form action="subir_excel.php" method="POST" enctype="multipart/form-data">
                         
        <label style="font-size: 20px;">Selecciona archivo Excel:</label>

            <?php if (isset($_GET["valor"])) { ?>
                <p style="color: green; margin-top: 8px;">
                    Datos importados
                </p>
            <?php } ?><br>
        <input type="file" name="excel" accept=".xlsx,.xls,.csv" style="padding:12px;"><br>
                                    <!-- accept=".xlsx,.xls,.csv" extensiones admitidas -->
        <button type="submit">Importar alumnos</button><br>        
     

    </form>
</div>

</main>

</body>
</html>
