<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["id_user"])) {
    header("Location: login.php"); // Redirige al login si no está autenticado
    exit();
}

include "../modelo/conexion.php";  // Incluir la conexión a la base de datos

// Obtener los datos del formulario
if (isset($_POST['codigo_joya'], $_POST['cantidad'], $_POST['valor_unitario'])) {
    $codigo_joya = $_POST['codigo_joya'];
    $cantidad = intval($_POST['cantidad']);  // Asegurarse de que sea un número entero
    $valor_unitario = floatval($_POST['valor_unitario']);  // Convertir a decimal para evitar errores
    $subtotal = $cantidad * $valor_unitario;
    $fecha_venta = date('Y-m-d');
    
    // Obtener el identificador del usuario logueado desde la sesión
    $identificacion = $_SESSION["id_user"];
    
    // Preparar la consulta SQL
    $sql = "INSERT INTO ventas (Identificacion_Cliente, Codigo_Joya, Fecha_Venta, Estado, Cantidad, Valor_Unitario, Subtotal) 
            VALUES (?, ?, ?, 'Vendido', ?, ?, ?)";
    
    // Preparar la sentencia
    $stmt = $conexion->prepare($sql);
    
    // Vincular parámetros (i: integer, s: string, d: double)
    $stmt->bind_param("sssidd", $identificacion, $codigo_joya, $fecha_venta, $cantidad, $valor_unitario, $subtotal);
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Compra realizada con éxito.";
    } else {
        echo "Error al procesar la compra: " . $stmt->error;
    }
    
    // Cerrar la sentencia y la conexión
    $stmt->close();
    $conexion->close();
    
    // Redirigir al usuario de vuelta a la página de joyas
    header("Location: joyas.php");
    exit();
} else {
    echo "Error: Faltan datos necesarios para procesar la compra.";
}
?>
