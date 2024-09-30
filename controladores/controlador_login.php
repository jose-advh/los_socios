<?php
session_start();
include "../modelo/conexion.php"; 

if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["id_user"]) and !empty($_POST["password"])) {
        $identificacion = $_POST["id_user"];
        $password = $_POST["password"];
        $sql = $conexion->query("select * from usuarios where id = '$identificacion' and password = '$password'");

        if ($datos = $sql->fetch_object()) {
            $_SESSION["id_user"] = $datos->Id;
            $_SESSION["nombre"] = $datos->Nombre;
            $_SESSION["apellido"] = $datos->Apellido;
            $_SESSION["cargo"] = $datos ->cargo;
            header("location: joyas.php");
            echo "Compra exitosa";
        } else {
            echo "<div class=alert alert-danger>Acceso denegado</div>";
        }

    } else {
        echo "Campos vacios";
    }
}


?>