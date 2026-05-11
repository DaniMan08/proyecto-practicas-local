<?php
session_start();

// Solo Admin y Empleado pueden enviar mensajes
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['tipo'] !== 'Admin' && $_SESSION['tipo'] !== 'Empleado') {
    echo "<h2>No tienes permiso para acceder a esta página.</h2>";
    exit;
}

require __DIR__ . '/../src/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo mensaje</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <script>
        function cargarAlumnos() {
            const grupoId = document.getElementById("grupo_id").value;
            if (!grupoId) return;

            fetch("get_alumnos.php?grupo_id=" + grupoId)
                .then(res => res.json())
                .then(data => {
                    const contenedor = document.getElementById("lista_alumnos");
                    contenedor.innerHTML = "";

                    if (data.length === 0) {
                        contenedor.innerHTML = "<p>No hay alumnos en este grupo.</p>";
                        return;
                    }

                    contenedor.innerHTML += `
                        <label>
                            <input type="checkbox" id="enviar_todos" name="enviar_todos" value="1" onclick="toggleAlumnos(this)">
                            Enviar a TODOS los alumnos del grupo
                        </label>
                        <br><br>
                    `;

                    data.forEach(al => {
                        contenedor.innerHTML += `
                            <label>
                                <input type="checkbox" name="alumnos[]" value="${al.id}">
                                ${al.nombre}
                            </label><br>
                        `;
                    });
                });
        }

        function toggleAlumnos(checkbox) {
            const checks = document.querySelectorAll("input[name='alumnos[]']");
            checks.forEach(c => c.checked = checkbox.checked);
        }
    </script>
</head>

<body>

<header class="cabecera">
    <h1>ESCUELA DE TEATRO</h1>
</header>

<aside class="barra-lateral">

    <a href="index.php">
        <i class="fas fa-home"></i> Inicio
    </a>

    <a href="formulario.php" class="activo">
        <i class="fas fa-comment"></i> Mensajes
    </a>

    <?php if ($_SESSION['tipo'] === 'Admin') { ?>
        <a href="registro.php">
            <i class="fas fa-users"></i> Registro
        </a>
    <?php } ?>

    <a href="historial.php">
        <i class="fas fa-file-alt"></i> Historial
    </a>

    <a href="logout.php">
        <i class="fas fa-right-from-bracket"></i> Salir
    </a>

</aside>

<main class="contenido">

    <h2>Nuevo mensaje</h2>

    <!-- ⭐ RUTA CORREGIDA AQUÍ ⭐ -->
    <form action="/PROYECTO-PRACTICAS/config/procesar_formulario.php" method="POST">

        <h3>Destinatario</h3>

        <label>Grupo</label>
        <select name="grupo_id" id="grupo_id" onchange="cargarAlumnos()" required>
            <option value="">Seleccionar grupo...</option>

            <?php
            $sql = "SELECT id_grupo_clase, nombre_grupo FROM grupos_clase";
            $res = $conexion->query($sql);

            while ($g = $res->fetch_assoc()) {
                echo "<option value='{$g['id_grupo_clase']}'>{$g['nombre_grupo']}</option>";
            }
            ?>
        </select>

        <div id="lista_alumnos"></div>

        <h3>Mensaje</h3>

        <label>Asunto</label>
        <input type="text" name="asunto" required>

        <label>Texto</label>
        <textarea name="mensaje" required></textarea>

        <h3>Canal de envío</h3>

        <label>Canal</label>
        <select name="canal" required>
            <option value="">Seleccionar...</option>
            <option value="Email">Email</option>
            <option value="WhatsApp">WhatsApp</option>
        </select>

        <br><br>
        <button type="submit">Enviar</button>

    </form>

</main>

</body>
</html>

