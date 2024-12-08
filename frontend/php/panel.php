<?php
include "../../backend/modelo/conexion.php";
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel - VirtuPro</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
<header class="header-principal">
    <nav class="header_nav-principal d-flex flex-column">
        <div class="header_info-principal d-flex justify-content-between px-4 align-items-center py-3">
            <a href="./evaluacion.php" class="bg-warning py-2 px-3 rounded text-light" style="text-decoration: none;">Evaluación</a>
            <a href="../../backend/controladores/controlador_cerrar_sesion.php" class="btn btn-danger">Cerrar Sesión</a>
            <a href="consultas.php" class="btn btn-info">Consultas</a>
        </div>
    </nav>
</header>

<main class="main main--top">
    <article class="main__riesgos">
        <section class="riesgos__item">
            <h2 class="riesgos__title">Riesgos para la Salud</h2>
            <a href="../paginas/riesgos.html" class="azul">Azul</a>
        </section>
        <section class="riesgos__item">
            <h2 class="riesgos__title">Riesgos de inflamabilidad</h2>
            <a href="../paginas/riesgos.html#riesgosInflamabilidad" class="rojo">Rojo</a>
        </section>
        <section class="riesgos__item">
            <h2 class="riesgos__title">Riesgos por reactividad <br> (inestabilidad)</h2>
            <a href="../paginas/riesgos.html#riesgosReactividad" class="amarillo">Amarillo</a>
        </section>
    </article>

    <article class="main__proteccion">
        <h2 class="riesgos__title" style="text-align: center;">Niveles de Protección Personal</h2>
        <a href="../paginas/niveles.html" class="proteccion__item">NIVEL A</a>
        <a href="../paginas/niveles.html#nivelB" class="proteccion__item">NIVEL B</a>
        <a href="../paginas/niveles.html#nivelC" class="proteccion__item">NIVEL C</a>
        <a href="../paginas/niveles.html#nivelD" class="proteccion__item">NIVEL D</a>
    </article>
    <br>
    <a href="../paginas/colores.html" class="main__title" style="text-align: center;">SELECCIÓN DE RESPIRADOR POR CÓDIGO DE COLOR</a>
</main>

</body>
</html>
