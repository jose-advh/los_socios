<?php
include "conexion.php"; 

header('Content-Type: application/json');

try {
    $stmt = $conexion->prepare("
        SELECT 
            p.id AS id_pregunta, 
            p.pregunta, 
            p.opcion_correcta, 
            GROUP_CONCAT(o.opcion ORDER BY o.id) AS opciones 
        FROM preguntas p 
        INNER JOIN opciones o ON p.id = o.id_pregunta 
        GROUP BY p.id
    ");
    $stmt->execute();

    $preguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    shuffle($preguntas);
    $preguntasSeleccionadas = array_slice($preguntas, 0, 10);

    foreach ($preguntasSeleccionadas as &$pregunta) {
        $pregunta['opciones'] = explode(',', $pregunta['opciones']);
    }

    echo json_encode($preguntasSeleccionadas);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["mensaje" => "Error al cargar preguntas: " . $e->getMessage()]);
}
