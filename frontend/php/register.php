<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
<header>
        <nav class="py-2">
            <ul>
                <li><a href="../../index.html" class="text-danger fw-bold" style="text-decoration: none;">VOLVER AL INICIO</a></li>
            </ul>
        </nav>
</header>
    <main>
        <article class="d-flex aling-items-center bg-dark w-75 rounded w-xl-25 m-auto justify-content-center">
            <form action="#" method="POST" class="d-flex flex-column w-100 gap-2">
                <h1 class="text-center text-light mt-2">Crear Cuenta</h1>

                    <div class="d-flex flex-column gap-3 justify-content-center flex-md-row">
                        <article class="d-flex flex-column align-items-center gap-2">
                        <div class="text-light">
                            <label for="id" class="fw-bold">Identificación</label>
                            <input type="text" name="id" maxlength="10" class="form-control">
                        </div>
                        <div class="text-light">
                            <label for="nombre" class="fw-bold">Nombres</label>
                            <input type="text" name="nombre" class="form-control">
                        </div>
                        <div class="text-light">
                            <label for="apellido" class="fw-bold">Apellidos</label>
                            <input type="text" name="apellido" class="form-control">
                        </div>
                        <div class="text-light">
                            <label for="email" class="fw-bold">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="text-light">
                            <label for="text" class="fw-bold">Dirección</label>
                            <input type="text" name="direccion" class="form-control">
                        </div>
                        <div class="text-light">
                            <label for="telefono" class="fw-bold">Teléfono</label>
                            <input type="number" name="telefono" class="form-control">
                        </div>
                        </article>

                        <article class="d-flex flex-column gap-2 align-items-center">
                        <div class="text-light">
                            <label for="fechaNac" class="fw-bold">Fecha Nacimiento</label>
                            <input type="date" name="fechaNac" class="form-control">
                        </div>
                        <div class="text-light">
                            <label for="lugarNac" class="fw-bold">Lugar Nacimiento</label>
                            <input type="text" name="lugarNac" class="form-control">
                        </div>
                        <div class="text-light">   
                            <label for="motivoVisita" class="fw-bold">Motivo Visita</label>
                            <input type="text" name="motivoVisita" class="form-control">
                        </div>
                        <div class="text-light">
                            <label for="observacionVisita" class="fw-bold">Observación Visita</label>
                            <textarea name="observacionVisita" style="height: 6.7rem;" class="form-control"></textarea>
                        </div>
                        <div class="text-light">
                            <label for="password" class="fw-bold">Contraseña</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        </article>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                    <?php
                        include ("../../backend/modelo/conexion.php");
                        include ("../../backend/controladores/controlador_register_usuario.php");
                    ?>
                        <input type="submit" class="btn btn-primary w-100" name="registro" value="REGISTRAR">
                    </div>
            </form>
        </article>
    </main>
</body>
</html>