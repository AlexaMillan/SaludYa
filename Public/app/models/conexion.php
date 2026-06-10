<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$bd = "saludya";
$puerto = 3309;

$conexion = mysqli_connect(
    $servidor,
    $usuario,
    $password,
    $bd,
    $puerto
);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

?>