<?php
include "../../backend/modelo/conexion.php";
session_start();

$query = "SELECT id, id_usuario, intento, nota, valoracion, hora_evaluacion FROM intento_evaluacion ORDER BY nota DESC";
$result = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas - VirtuPro</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="text-center mb-4">INTENTOS - EVALUACIÓN</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th>ID Intento</th>
                    <th>Usuario</th>
                    <th>Puntaje</th>
                    <th>Valoración</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['id_usuario']}</td>
                            <td>{$row['nota']}</td>
                            <td>{$row['valoracion']}</td>
                            <td>{$row['hora_evaluacion']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No hay datos disponibles</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="text-center mt-4">
        <a href="panel.php" class="btn btn-primary">Volver al Panel</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
