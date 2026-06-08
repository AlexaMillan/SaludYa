<?php
session_start();
include("conexion.php");

// Validar sesión
if(!isset($_SESSION['idusuario'])){
    header("Location: login.php");
    exit();
}

// Recibir datos del formulario
$idpaciente = $_SESSION['idusuario'];
$direccion = trim($_POST['direccion']);
$ciudad = trim($_POST['ciudad']);
$servicio = trim($_POST['servicio']);
$descripcion = trim($_POST['descripcion']);

// Insertar solicitud
$sql = "INSERT INTO solicitud_enfermera (
            idpaciente,
            direccion,
            ciudad,
            servicio,
            descripcion
        )
        VALUES (
            '$idpaciente',
            '$direccion',
            '$ciudad',
            '$servicio',
            '$descripcion'
        )";

$resultado = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Procesando...</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php if($resultado){ ?>

<script>
Swal.fire({
    icon: 'success',
    title: 'Solicitud enviada',
    text: 'Tu solicitud de enfermería fue registrada correctamente.',
    confirmButtonColor: '#4895ef'
}).then(() => {
    window.location = 'solicitar_enfermera.php';
});
</script>

<?php } else { ?>

<script>
Swal.fire({
    icon: 'error',
    title: 'Error',
    text: 'No se pudo registrar la solicitud.',
    confirmButtonColor: '#4895ef'
}).then(() => {
    window.location = 'solicitar_enfermera.php';
});
</script>

<?php } ?>

</body>
</html>