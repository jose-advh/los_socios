<?php

// Al cerrar sesión reenvia a la página de login

session_start();
session_destroy();
header("location: ../../frontend/php/login.php");

?>