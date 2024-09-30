<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav class="py-2">
            <ul>
                <li><a href="../index.html">VOLVER AL INICIO</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <article class="d-flex justify-content-center">
            <form method="post" action="#" class="formulario_login d-flex flex-column gap-2">
                <h1 class="text-center">Login - Los Socios</h1>
                <label for="">Identificación</label>
                <input type="text" id="id_user" name="id_user" class="form-control">
                <label for="">Contraseña</label>
                <input type="password" id="input" name="password" class="form-control">
                <span><a href="register.php">¿No tienes una cuenta?</a></span>
                <input type="submit" class="btn btn-primary" name="btningresar" value="INICIAR SESIÓN">
                <?php
                include ("../modelo/conexion.php");
                include ("../controladores/controlador_login.php" );       
                ?>
            </form>
        </article>
    </main>
</body>
</html>