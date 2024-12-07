<?php
include "../modelo/conexion.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $respuestas = $_POST["respuesta"] ?? [];
    $nota = 0;

    foreach ($respuestas as $idPregunta => $respuesta) {
        $stmt = $conexion->prepare("SELECT opcion_correcta FROM preguntas WHERE id = ?");
        $stmt->bind_param("i", $idPregunta);
        $stmt->execute();
        $stmt->bind_result($correcta);
        $stmt->fetch();
        $stmt->close();

        if ($respuesta === $correcta) {
            $nota++;
        }
    }

    $valoracion = $nota >= 7 ? "Aprobado" : "Desaprobado";
    $horaEvaluacion = date("Y-m-d H:i:s");
    $idUsuario = $_SESSION["id_user"];

    $stmt = $conexion->prepare("
        INSERT INTO intento_evaluacion (id_usuario, nota, valoracion, hora_evaluacion) 
        VALUES (?, ?, ?, ?)
    ");
    $stmt->bind_param("iiss", $idUsuario, $nota, $valoracion, $horaEvaluacion);
    $stmt->execute();
    $stmt->close();

    echo "Intento guardado correctamente. Nota: $nota/10";
}
?>
