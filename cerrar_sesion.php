<?php
session_start();

// eliminar todas las variables de sesión
session_unset();

// destruir sesión
session_destroy();

// redirigir al login o inicio
header("Location: index.php");
exit();
?>