<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuarios - Admin</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
<header class="py-2">
        <nav class="d-flex aling-items-center justify-content-between px-2">
            <ul>
                <li><a href="joyas.php">VOLVER</a></li>
            </ul>

            <ul class="d-flex gap-3 px-3">
                <li><a href="consultas.php">CONSULTAS</a></li>
                <li><a href="guardar_joya.php">AGREGAR JOYA</a></li>
                <li><a href="crear_usuario.php">CREAR USUARIOS</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <article class="d-flex aling-items-center justify-content-center">
            <form action="#" method="POST" class="d-flex flex-column w-50 gap-2">
                <h1 class="text-center">CREAR USUARIOS</h1>
                    <div class="d-flex gap-3 m-auto">
                        <div>
                            <label for="id" class="fw-bold">Identificación</label>
                            <input type="text" name="id" maxlength="10" class="form-control">
                        </div>

                        <div>
                            <label for="nombre" class="fw-bold">Nombres</label>
                            <input type="text" name="nombre" class="form-control">
                        </div>

                        <div>
                        <label for="apellido" class="fw-bold">Apellidos</label>
                        <input type="text" name="apellido" class="form-control">
                    </div>
                    </div>

                    <div class="d-flex flex-column w-75 m-auto gap-1">
                        <div>
                            <label for="email" class="fw-bold">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div>
                            <label for="text" class="fw-bold">Dirección</label>
                            <input type="text" name="direccion" class="form-control">
                        </div>
                        <div>
                            <label for="telefono" class="fw-bold">Teléfono</label>
                            <input type="number" name="telefono" class="form-control">
                        </div>
                        <div>
                            <label for="password" class="fw-bold">Contraseña</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div>
                            <label for="tipo_usuario" class="fw-bold">Cargo de Usuario</label>
                            <select name="cargo" class="form-control">
                            <option selected>Selecciona una opción</option>
                                <option value="cliente">Cliente</option>
                                <option value="admin">Administrador</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <label class="input-group-text" for="inputGroupSelect02">Estado</label>
                            </div>
                            <select class="custom-select w-75 m-auto" name="estado" id="inputGroupSelect02">
                                <option selected>Selecciona una opción</option>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                                <option value="suspendido">Suspendido</option>
                                <option value="vedado">Vedado</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex flex-column justify-content-center">
                    <?php
                        include ("../modelo/conexion.php");
                        include ("../controladores/controlador_register_usuario.php");
                    ?>
                        <input type="submit" class="btn btn-primary w-100" name="registro" value="CREAR USUARIO">
                    </div>
            </form>
        </article>
    </main>
</body>
</html>