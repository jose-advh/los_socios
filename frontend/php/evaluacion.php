<?php
include "../../backend/modelo/conexion.php";
session_start();

$query = "
    SELECT 
        p.id, p.pregunta, GROUP_CONCAT(o.opcion ORDER BY o.id) AS opciones, p.opcion_correcta 
    FROM preguntas p 
    INNER JOIN opciones o ON p.id = o.id_pregunta 
    GROUP BY p.id
";
$result = $conexion->query($query);

if ($result) {
    $preguntas = $result->fetch_all(MYSQLI_ASSOC);

    shuffle($preguntas);
    $preguntasSeleccionadas = array_slice($preguntas, 0, 10);
} else {
    echo "Error en la consulta: " . $conexion->error;
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuestionario</title>
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <form method="POST" action="guardarIntento.php" class="d-flex flex-column justify-content-center py-4 aling-items-center">
        <h1 class="text-center text-warning">EVALUACIÓN</h1>
        <?php foreach ($preguntasSeleccionadas as $index => $pregunta): ?>
            <div class="py-4 w-75 m-auto">
                <h3><?= ($index + 1) . ". " . $pregunta['pregunta'] ?></h3>
                <?php $opciones = explode(',', $pregunta['opciones']); shuffle($opciones); ?>
                <?php foreach ($opciones as $opcion): ?>
                    <hr>
                    <div>
                        <input type="radio" name="respuesta[<?= $pregunta['id'] ?>]" value="<?= $opcion ?>" required>
                        <label><?= $opcion ?></label>
                        <hr>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="w-25 m-auto py-2 rounded bg-warning">Finalizar</button>
    </form>
</body>
</html>
