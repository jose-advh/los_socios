<?php
if (!empty($_POST["registro"])) {
    if (empty($_POST["id"]) || empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["email"]) || empty($_POST["direccion"]) || empty($_POST["telefono"]) || empty($_POST["password"]) || empty($_POST["fechaNac"]) || empty($_POST["lugarNac"]) || empty($_POST["motivoVisita"]) || empty($_POST["observacionVisita"])) {
        echo "<span class='text-center text-danger'>Uno de los campos está vacío</span>";
    } else {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT); 
        $fechaNac = $_POST["fechaNac"];
        $lugarNac = $_POST["lugarNac"];
        $motivoVisita = $_POST["motivoVisita"];
        $observacionVisita = $_POST["observacionVisita"];

        $validacion = $conexion->query("SELECT * FROM empleados WHERE correo = '$email' OR identificacion = '$id'");

        if ($validacion->num_rows > 0) {
            $fila = $validacion->fetch_assoc();
            if ($fila["correo"] == $email) {
                echo "<span class='text-center text-danger'>El correo electrónico ya está en uso</span>";
            } elseif ($fila["identificacion"] == $id) {
                echo "<span class='text-center text-danger'>La identificación ya está en uso</span>";
            }
        } else {
            $sql = $conexion->query("INSERT INTO empleados (identificacion, nombres, apellidos, correo, fecha_nac, lugar_nac, direccion, telefono, contrasena) VALUES ('$id', '$nombre', '$apellido', '$email', '$fechaNac', '$lugarNac', '$direccion', '$telefono', '$password')");

            if ($sql) {
                $sql2 = $conexion->query("INSERT INTO visita (id_usuario, motivo, observacion) VALUES ('$id', '$motivoVisita', '$observacionVisita')");

                if ($sql2) {
                    echo "<div class='alert alert-success' role='alert'>La acción se completó correctamente!</div>";
                } else {
                    echo "<span class='text-center text-danger'>Error al registrar la visita</span>";
                }
            } else {
                echo "<span class='text-center text-danger'>El usuario no se pudo registrar</span>";
            }
        }
    }
}
?>
