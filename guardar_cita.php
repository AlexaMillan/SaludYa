<?php
session_start();
include("conexion.php");

if(!isset($_SESSION['idusuario'])){
    header("Location: login.php");
    exit();
}

$idpaciente = $_SESSION['idusuario'];

$idagenda = $_POST['idagenda'] ?? null;
$motivo = $_POST['motivo_consulta'] ?? '';

$mensaje = "";

/* VALIDAR DATOS */
if(empty($idagenda)){
    $mensaje = "error";
}else{

    // Verificar si la agenda aún está disponible
    $verificar = "SELECT disponible FROM agenda_cita WHERE idagenda='$idagenda'";
    $res = mysqli_query($conexion,$verificar);
    $fila = mysqli_fetch_assoc($res);

    if(!$fila || $fila['disponible'] == 0){
        $mensaje = "ocupada";
    }else{

        // Insertar cita
        $sql = "INSERT INTO cita_medica
        (idpaciente, idagenda, motivo_consulta, estado)
        VALUES
        ('$idpaciente','$idagenda','$motivo','AGENDADA')";

        if(mysqli_query($conexion,$sql)){

            // Marcar agenda como no disponible
            mysqli_query($conexion,"
                UPDATE agenda_cita
                SET disponible = 0
                WHERE idagenda = '$idagenda'
            ");

            $mensaje = "ok";

        }else{
            $mensaje = "error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Procesando cita</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

<?php if($mensaje == "ok"){ ?>

<script>
Swal.fire({
    icon: 'success',
    title: 'Cita agendada',
    text: 'La cita médica fue registrada exitosamente.',
    confirmButtonColor: '#4895ef'
}).then(() => {
    window.location.href = 'agendar_cita.php';
});
</script>

<?php } ?>

<?php if($mensaje == "ocupada"){ ?>

<script>
Swal.fire({
    icon: 'warning',
    title: 'Horario no disponible',
    text: 'Este horario ya fue reservado por otro usuario.',
    confirmButtonColor: '#4895ef'
}).then(() => {
    window.location.href = 'agendar_cita.php';
});
</script>

<?php } ?>

<?php if($mensaje == "error"){ ?>

<script>
Swal.fire({
    icon: 'error',
    title: 'Error',
    text: 'No se pudo agendar la cita.',
    confirmButtonColor: '#4895ef'
}).then(() => {
    window.location.href = 'agendar_cita.php';
});
</script>

<?php } ?>

</body>
</html>