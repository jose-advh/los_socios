<?php
include "conexion.php";
session_start();

header('Content-Type: application/json');

try {
    // Leer datos enviados por el cliente
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['nota'], $data['valoracion'], $data['hora_evaluacion'])) {
        $nota = $data['nota'];
        $valoracion = $data['valoracion'];
        $horaEvaluacion = $data['hora_evaluacion'];
        $idUsuario = $_SESSION["id_user"]; // ID del usuario autenticado

        // Insertar el intento en la base de datos
        $stmt = $conexion->prepare("
            INSERT INTO intentos (id_usuario, nota, valoracion, hora_evaluacion) 
            VALUES (:id_usuario, :nota, :valoracion, :hora_evaluacion)
        ");
        $stmt->execute([
            ":id_usuario" => $idUsuario,
            ":nota" => $nota,
            ":valoracion" => $valoracion,
            ":hora_evaluacion" => $horaEvaluacion,
        ]);

        echo json_encode(["success" => true, "id_intento" => $conexion->lastInsertId()]);
    } else {
        throw new Exception("Faltan datos obligatorios");
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Error: " . $e->getMessage()]);
}
