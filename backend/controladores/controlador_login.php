<?php
session_start();
include __DIR__ . '/../modelo/conexion.php';


if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["id_user"]) && !empty($_POST["password"])) {
        $identificacion = $_POST["id_user"];
        $password = $_POST["password"];

        $sql = $conexion->query("SELECT * FROM empleados WHERE identificacion = '$identificacion'");

        if ($datos = $sql->fetch_object()) {
            if (password_verify($password, $datos->contrasena)) {
                $_SESSION["id_user"] = $datos->identificacion;
                $_SESSION["nombre"] = $datos->nombres;
                $_SESSION["apellido"] = $datos->apellidos;

                header("location: panel.php");
                exit();
            } else {
                echo "<div class='alert alert-danger'>Contraseña incorrecta</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Usuario no encontrado</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Por favor, rellene todos los campos</div>";
    }
}
?>
