<?php
session_start();
include("conexion.php");

if(!isset($_SESSION['idusuario'])){
    header("Location: login.php");
    exit();
}

/* VALIDAR DATOS */
if(!isset($_POST['idcita']) || !isset($_POST['idagenda'])){

    echo "<!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </head>
    <body>

    <script>
    Swal.fire({
        icon: 'error',
        title: 'Datos incompletos',
        text: 'No se recibieron los datos correctamente',
        confirmButtonColor: '#4895ef',
        background: '#f1f7ff'
    }).then(() => {
        window.location.href = 'consultar_citas.php';
    });
    </script>

    </body>
    </html>";
    exit();
}

$idcita = $_POST['idcita'];
$idagenda_nueva = $_POST['idagenda'];

/* VALIDAR VACÍOS */
if(empty($idcita) || empty($idagenda_nueva)){

    echo "<!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </head>
    <body>

    <script>
    Swal.fire({
        icon: 'warning',
        title: 'Campos vacíos',
        text: 'Selecciona una cita y un horario válido',
        confirmButtonColor: '#4895ef',
        background: '#f1f7ff'
    }).then(() => {
        window.location.href = 'consultar_citas.php';
    });
    </script>

    </body>
    </html>";
    exit();
}

/* VALIDAR CITA */
$consulta = mysqli_query($conexion,"
SELECT * FROM cita_medica WHERE idcita='$idcita'
");

if(mysqli_num_rows($consulta) == 0){

    echo "<!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </head>
    <body>

    <script>
    Swal.fire({
        icon: 'error',
        title: 'Cita no encontrada',
        text: 'La cita seleccionada no existe',
        confirmButtonColor: '#4895ef',
        background: '#f1f7ff'
    }).then(() => {
        window.location.href = 'consultar_citas.php';
    });
    </script>

    </body>
    </html>";
    exit();
}

$cita = mysqli_fetch_assoc($consulta);

$idagenda_vieja = $cita['idagenda'];

/* 1. LIBERAR AGENDA ANTERIOR */
mysqli_query($conexion,"
UPDATE agenda_cita 
SET disponible = 1 
WHERE idagenda = '$idagenda_vieja'
");

/* 2. ACTUALIZAR CITA */
$update = mysqli_query($conexion,"
UPDATE cita_medica 
SET 
    idagenda = '$idagenda_nueva',
    estado = 'REAGENDADA'
WHERE idcita = '$idcita'
");

/* 3. BLOQUEAR NUEVA AGENDA */
mysqli_query($conexion,"
UPDATE agenda_cita 
SET disponible = 0 
WHERE idagenda = '$idagenda_nueva'
");

/* 4. MENSAJE FINAL */
if($update){

    echo "<!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </head>
    <body>

    <script>
    Swal.fire({
        icon: 'success',
        title: 'Reprogramación exitosa',
        text: 'La cita fue actualizada correctamente',
        confirmButtonColor: '#4895ef',
        background: '#f1f7ff',
        iconColor: '#4895ef'
    }).then(() => {
        window.location.href = 'consultar_citas.php';
    });
    </script>

    </body>
    </html>";
    exit();

}else{

    echo "<!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </head>
    <body>

    <script>
    Swal.fire({
        icon: 'error',
        title: 'Error al reprogramar',
        text: 'No se pudo actualizar la cita',
        confirmButtonColor: '#dc3545',
        background: '#f1f7ff'
    }).then(() => {
        window.location.href = 'consultar_citas.php';
    });
    </script>

    </body>
    </html>";
    exit();
}
?>