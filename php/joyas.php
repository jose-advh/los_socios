<?php
// Incluir la conexión a la base de datos
include "../modelo/conexion.php";
// Iniciar la sesión para manejar información del usuario
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joyas - Los Socios</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script>
        // Función para mostrar un mensaje de confirmación antes de enviar el formulario
        function confirmarCompra(event) {
            // Prevenir el envío del formulario por defecto
            event.preventDefault();
            // Mostrar un mensaje de confirmación
            const confirmacion = confirm("¿Estás seguro de que deseas comprar esta joya?");
            if (confirmacion) {
                // Si el usuario confirma, enviar el formulario
                event.target.submit();
            }
        }
    </script>
</head>
<body>
<header class="header-principal ">
    <nav class="header_nav-principal  d-flex flex-column">
        <div class="header_info-principal d-flex justify-content-between px-4 py-3">
            <ul class="nav_ul-principal d-flex gap-5 justify-content-center aling-items-center text-center">
                <li><a href="#">JOYAS</a></li>
                <?php
                // Mostrar el enlace al panel de administración solo si el usuario es admin
                if ($_SESSION["cargo"] == "admin") {
                    echo "
                    <li><a href='guardar_joya.php'>PANEL DE ADMINISTRACIÓN</a></li>
                    ";
                }
                ?>
            </ul>
            <a href="../controladores/controlador_cerrar_sesion.php" class="btn btn-danger">Cerrar Sesión</a>
        </div>
    </nav>
</header>

<main>
    <h1 class="text-center">Joyas Disponibles</h1>
    <section class="d-flex justify-content-center gap-3 flex-wrap">
        <!-- Aquí se mostrarán las joyas desde la base de datos -->
        <?php
        // Conectar a la base de datos y comprobar errores de conexión
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Consulta para obtener todas las joyas de la tabla 'joyas'
        $sql = "SELECT * FROM joyas";
        $resultado = $conexion->query($sql);

        // Verificar si se encontraron joyas
        if ($resultado->num_rows > 0) {
            // Iterar sobre cada joya y mostrarla en una tarjeta
            while ($joya = $resultado->fetch_assoc()) {
                echo "<div class='card' style='width: 19rem;'>";
                echo "<img class='card-img-top' src='" . $joya['img_url'] . "' alt='" . $joya['Nombre'] . "'>";
                echo "<div class='card-body'>";
                echo "<h4 class='card-title w-100'>" . $joya['Nombre'] . "</h4>"; 
                echo 
                "
                <p class='card-text'>
                    <span class='fw-bold'>Materiales de la Joya:</span> " . $joya['Material'] . "<br>" .
                    "<span class='fw-bold'>Fecha fabricación: </span> " . $joya['Fecha_Creacion'] . "<br>" .
                    "<span class='fw-bold'>Precio: $</span> <span style='color: green'>" . $joya['Valor'] . "</span>
                ";

                // Formulario para procesar la compra de la joya
                echo 
                " 
                <form action='procesar_compra.php' method='POST' onsubmit='confirmarCompra(event)'>
                    <input type='hidden' name='codigo_joya' value='" . $joya['Codigo'] . "'> <!-- Código de la joya -->
                    <input type='hidden' name='valor_unitario' value='" . $joya['Valor'] . "'> <!-- Valor de la joya -->
                    <div class='form-group mb-2'>
                        <label for='cantidad-" . $joya['Codigo'] . "'>Cantidad:</label>
                        <input type='number' class='form-control' name='cantidad' id='cantidad-" . $joya['Codigo'] . "' value='1' min='1' required>
                    </div>
                    <button type='submit' class='btn btn-primary w-100'>Comprar</button> <!-- Botón para enviar el formulario -->
                </form>";
                echo "</div>"; // Cierra el cuerpo de la tarjeta
                echo "</div>"; // Cierra la tarjeta
            }
        } else {
            echo "No hay joyas disponibles."; // Mensaje si no hay joyas
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();
        ?>
    </section>
</main>

</body>
</html>
