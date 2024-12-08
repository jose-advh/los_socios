<?php
include "../../backend/modelo/conexion.php";
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
    date_default_timezone_set("America/Bogota");
    $horaEvaluacion = date("Y-m-d H:i:s");
    $idUsuario = $_SESSION["id_user"];

    // Guardar el intento en la base de datos
    $stmt = $conexion->prepare("
        INSERT INTO intento_evaluacion (id_usuario, nota, valoracion, hora_evaluacion) 
        VALUES (?, ?, ?, ?)
    ");
    $stmt->bind_param("iiss", $idUsuario, $nota, $valoracion, $horaEvaluacion);
    $stmt->execute();
    $stmt->close();

    // Obtener el nombre y apellido desde la sesión
    $nombreUsuario = $_SESSION["nombre"];
    $apellidoUsuario = $_SESSION["apellido"];
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultado de Evaluación</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white text-center">
                            <h3>Resultado de la Evaluación</h3>
                        </div>
                        <div class="card-body">
                            <h5 class="text-center">¡Hola, <?php echo htmlspecialchars($nombreUsuario . " " . $apellidoUsuario); ?>!</h5>
                            <p class="text-center fs-5">
                                Tu resultado fue: <strong><?php echo $nota; ?>/10</strong>
                            </p>
                            <p class="text-center fs-4 text-<?php echo $valoracion === "Aprobado" ? "success" : "danger"; ?>">
                                <strong><?php echo $valoracion; ?></strong>
                            </p>
                            <p class="text-muted text-center">Fecha y hora: <?php echo $horaEvaluacion; ?></p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="./panel.php" class="btn btn-primary">Volver al Panel</a>
                            <a href="../../backend/controladores/controlador_cerrar_sesion.php" class="btn btn-secondary">Cerrar sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    <?php
}
?>
