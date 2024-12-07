<?php
include "../modelo/conexion.php";
session_start();

// Consulta y selección de preguntas
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

    // Mezclar y limitar preguntas
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
</head>
<body>
    <form method="POST" action="guardarIntento.php">
        <?php foreach ($preguntasSeleccionadas as $index => $pregunta): ?>
            <div>
                <h3><?= ($index + 1) . ". " . $pregunta['pregunta'] ?></h3>
                <?php $opciones = explode(',', $pregunta['opciones']); shuffle($opciones); ?>
                <?php foreach ($opciones as $opcion): ?>
                    <div>
                        <input type="radio" name="respuesta[<?= $pregunta['id'] ?>]" value="<?= $opcion ?>" required>
                        <label><?= $opcion ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        <button type="submit">Finalizar</button>
    </form>
</body>
</html>
