<?php
session_start();
include "../modelo/conexion.php";

// Verificar si el usuario ha iniciado sesión y si tiene rol de administrador
if (!isset($_SESSION["cargo"]) || $_SESSION["cargo"] != "admin") {
    die("Acceso denegado.");
}

// Función para mostrar los datos en formato de tabla
function mostrarDatos($resultado, $titulos) {
    echo "<table class='table'>";
    echo "<thead><tr>";
    foreach ($titulos as $titulo) {
        echo "<th>{$titulo}</th>";
    }
    echo "</tr></thead><tbody>";

    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        foreach ($fila as $valor) {
            echo "<td>{$valor}</td>";
        }
        echo "</tr>";
    }
    echo "</tbody></table>";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración - Los - Socios</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <header class="d-flex justify-content-between py-2 px-4">
        <h1 class="text-center">ADMINISTRACIÓN - LOS SOCIOS</h1>
        <div class="d-flex gap-2">
            <ul class="d-flex gap-3">
                <li><a href="joyas.php">INICIO</a></li>
                <li><a href="guardar_joya.php">AGREGAR JOYAS</a></li> 
                <li><a href="crear_usuario.php">CREAR USUARIOS</a></li> 
            </ul>
            <a href="../controladores/controlador_cerrar_sesion.php" class="btn btn-danger">Cerrar Sesión</a>
        </div>
    </header>

    <main class="container">
        <h2>Listado de Clientes</h2>
        <?php
        $sql = "SELECT * FROM usuarios"; 
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0) {
            mostrarDatos($resultado, ['ID', 'Nombre', 'Apellido', 'Direccion', 'Número', 'Correo Electronico', 'Estado', 'Password', 'Cargo']);
        } else {
            echo "<p>No hay clientes disponibles.</p>";
        }
        ?>

        <h2>Listado de Joyas</h2>
        <?php
        $sql = "SELECT * FROM joyas"; // Obtener todas las joyas
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0) {
            mostrarDatos($resultado, ['Código', 'Nombre', 'Diseño', 'Peso', 'Fecha de Fabricación', 'Material', 'Valor', 'Url Imagen']);
        } else {
            echo "<p>No hay joyas disponibles.</p>";
        }
        ?>

        <h2>Listado de Ventas</h2>
        <?php
        $sql = "SELECT * FROM ventas"; // Obtener todas las ventas
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0) {
            mostrarDatos($resultado, ['ID Venta', 'ID Cliente', 'Código Joya', 'Fecha Venta', 'Fecha Devolución', 'Estado', 'Cantidad', 'Valor Unitario', 'Subtotal']);
        } else {
            echo "<p>No hay ventas registradas.</p>";
        }
        ?>
    </main>
</body>
</html>
