<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="contenedor">

    <!-- lado izquierdo -->
    <div class="contenedor-izquierdo">
        <div class="overlay">
            <h1 class="logo">ESCUELA DE TEATRO</h1>

            <div class="texto-bienvenida">
                <h2>Hola,<br>Bienvenido!</h2>
            </div>
        </div>
    </div>

    <!-- lado derecho -->
    <div class="contenedor-derecho">
        <form class="formulario-login" action="../config/login_db.php" method="post">
            <h2>Inicio de sesión</h2>

            <?php if (isset($_GET["error"])) { ?>
                <p>Usuario o contraseña incorrectos</p>
            <?php } ?>

            <?php if (isset($_GET["logout"])) { ?>
                <p>Sesión cerrada correctamente</p>
            <?php } ?>

            <div class="grupo-input">
                <input type="text" name="user" required>
                <label>Usuario</label>
            </div>

            <div class="grupo-input">
                <input type="password" name="pass" required>
                <label>Contraseña</label>
            </div>

            <button type="submit">Iniciar</button>
        </form>
    </div>

</div>

</body>
</html>
