<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Seguridad Laboral</title>
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/auth.css">
</head>
<body>

<header class="header">
    <nav class="d-flex justify-content-between w-75 m-auto">
        <img src="../imgs/logo_virtupro.png" style="width: 50px" alt="Logo de virtupro">
        <a href="../../index.html" class="btn btn-dark text-light">VOLVER AL INICIO</a>
    </nav>
</header>

<main class="d-flex justify-content-center align-items-center" style="height: 80vh;">
    <div class="login-container p-4 rounded">
        <div class="text-center mb-3">
            <i class="icon-seguridad bi bi-shield-lock"></i>
        </div>
        <h1 class="text-center">Iniciar Sesión</h1>
        <p class="text-center text-muted mb-4">Accede al sistema de evaluación de <strong>Seguridad Laboral</strong>.</p>

        <form method="post" action="#" class="d-flex flex-column gap-3">
            <div class="form-group">
                <label for="id_user">Identificación</label>
                <input type="text" id="id_user" name="id_user" class="form-control" placeholder="Ingresa tu ID de usuario" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required>
            </div>
            <div class="text-end">
                <a href="register.php" class="text-decoration-none">¿No tienes una cuenta? Regístrate</a>
            </div>
            <input type="submit" class="btn btn-primary" name="btningresar" value="INICIAR SESIÓN">
        </form>

        <?php
        include ("../../backend/modelo/conexion.php");
        include ("../../backend/controladores/controlador_login.php");
        ?>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
