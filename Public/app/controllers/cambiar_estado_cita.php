<?php
session_start();
include("conexion.php");

if(!isset($_SESSION['idusuario'])){
    header("Location: login.php");
    exit();
}

$idcita = $_GET['id'];
$estado = $_GET['estado'];

$sql = "UPDATE cita_medica SET estado='$estado' WHERE idcita='$idcita'";
mysqli_query($conexion,$sql);
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
Swal.fire({
    icon: 'success',
    title: 'Cita cancelada',
    text: 'La cita fue cancelada correctamente',
    confirmButtonColor: '#4895ef'
}).then(() => {
    window.location.href = 'consultar_citas.php';
});
</script>