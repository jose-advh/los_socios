<?php
if (!empty($_POST["registro"])) {
    // Verificar que los campos solicitados sean rellenados
    if (empty($_POST["id"]) or empty($_POST["nombre"]) or empty($_POST["apellido"]) or empty($_POST["email"]) or empty($_POST["direccion"]) or empty($_POST["telefono"]) or empty($_POST["password"])) {
        echo "<span style = 'color: red'>Uno de los campos está vacío</span>";
    } else {
     // Variables que guardan los datos rellenados
     
     $id = $_POST["id"];
     $nombre = $_POST["nombre"];
     $apellido = $_POST["apellido"];
     $email = $_POST["email"];
     $direccion = $_POST["direccion"];
     $telefono = $_POST["telefono"];
     $estado = $_POST["estado"];
     $cargo = $_POST["cargo"];
     $password = $_POST["password"];

     // Insertarndo los datos a la base de datos
     $sql=$conexion->query(" insert into usuarios(id, nombre, apellido, email, direccion, telefono, estado, password, cargo)values('$id','$nombre','$apellido','$email','$direccion','$telefono','$estado','$password', '$cargo')");

     if ($sql == 1) {
        echo "
        <div class='alert alert-success' role='alert'>
            La acción se completó correctamente!
        </div>
        ";
     } else {
        echo "El usuario no se pudo registrar.";
     }
     
    }
    
}
?>