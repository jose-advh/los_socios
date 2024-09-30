<?php

session_start();

// Verificar si el usuario tiene acceso de admin
if (!isset($_SESSION["cargo"]) || $_SESSION["cargo"] != "admin") {
    die("Acceso denegado.");
}

include "../modelo/conexion.php"; // Conexión a la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Joya</title>
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
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
    <h2 class="text-center">AGREGAR NUEVA JOYA</h2>
    <form action="guardar_joya.php" method="POST" enctype="multipart/form-data" class="d-flex  flex-column justify-content-center w-50 m-auto">
        <div class="d-flex gap-3">
            <div class="d-flex flex-column w-50">
                <label for="codigo_joya">Código Joya:</label>
                <input type="text" id="codigo_joya" name="codigo_joya" class="form-control" required><br>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required><br>
            </div>

            <div class="d-flex flex-column w-50">
                <label for="diseño">Diseño:</label>
                <textarea id="diseño" name="diseño" class="form-control" required></textarea>
                <label for="peso">Peso (g):</label>
                <input type="number" step="0.01" id="peso" name="peso" class="form-control" required><br>
            </div>

        </div>

            <div class="d-flex gap-3">
                <div>
                    <label for="fecha_creacion">Fecha fabricación:</label>
                    <input type="date" id="fecha_creacion" name="fecha_creacion" class="form-control" required><br>
                </div>
                
                <div class="w-100">
                    <label for="material">Material:</label>
                    <input type="text" id="material" name="material" class="form-control" required><br>
                </div>
            </div>


            <label for="valor">Valor ($):</label>
            <input type="number" step="0.01" id="valor" name="valor" class="form-control"  required><br>
            <label for="img_url">Imagen de Joya</label>
            <input type="file" id="img_url" name="img_url">
            <br>
            <input type="submit" class="btn btn-primary" class="form-control" value="Guardar Joya">
    </form>

    <?php
        include ("../modelo/conexion.php");


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $codigo_joya = $_POST['codigo_joya'];
            $nombre = $_POST['nombre'];
            $diseño = $_POST['diseño'];
            $peso = $_POST['peso'];
            $fecha_creacion = $_POST['fecha_creacion'];
            $material = $_POST['material'];
            $valor = $_POST['valor'];
            

            // Inicializa la variable $img_url como una cadena vacía
            // Esta variable almacenará la ruta de la imagen subida
            $img_url = '';

            // Verifica si se ha subido un archivo y si no hay errores en la subida
            if (isset($_FILES['img_url']) && $_FILES['img_url']['error'] == 0) {
                // Define el directorio donde se guardarán las imágenes subidas
                $target_dir = "../uploads/";
                
                // basename() se usa para obtener solo el nombre del archivo, sin la ruta
                $img_url = $target_dir . basename($_FILES["img_url"]["name"]);
                
                // $_FILES["img_url"]["tmp_name"] es la ubicación temporal del archivo subido
                // $img_url es la ruta de destino final
                move_uploaded_file($_FILES["img_url"]["tmp_name"], $img_url);
            }

            $sql = "INSERT INTO joyas (codigo, nombre, diseño, peso, fecha_creacion, material, valor, img_url) 
                    VALUES ('$codigo_joya', '$nombre', '$diseño', '$peso', '$fecha_creacion', '$material', '$valor', '$img_url')";
        
            if ($conexion->query($sql) === TRUE) {
                echo "Joya guardada correctamente.";
            } else {
                echo "Error al guardar la joya: " . $conexion->error;
            }
        }
        
        $conexion->close();

        ?>


</body>
</html>
