<?php

session_start();
include("conexion.php");

if(!isset($_SESSION['idusuario'])){
    header("Location: login.php");
    exit();
}

$idusuario = $_POST['idusuario'];
$correo = trim($_POST['correo']);
$telefono = trim($_POST['telefono']);
$contrasena = trim($_POST['contrasena']);

$mensaje = "";

$verificar = "SELECT *
              FROM usuario
              WHERE correo='$correo'
              AND idusuario <> '$idusuario'";

$resultado = mysqli_query($conexion,$verificar);

if(mysqli_num_rows($resultado) > 0){

    $mensaje = "correo_existe";

}else{

    if(empty($contrasena)){

        $sql = "UPDATE usuario
                SET correo='$correo',
                    telefono='$telefono'
                WHERE idusuario='$idusuario'";

    }else{

        $sql = "UPDATE usuario
                SET correo='$correo',
                    telefono='$telefono',
                    contrasena='$contrasena'
                WHERE idusuario='$idusuario'";
    }

    if(mysqli_query($conexion,$sql)){
        $mensaje = "actualizado";
    }else{
        $mensaje = "error";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Actualizando...</title>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
body{
    background:#f5f7fb;
}
</style>

</head>
<body>

<?php if($mensaje == "actualizado"){ ?>

<script>
Swal.fire({
    icon: 'success',
    title: 'Datos actualizados',
    text: 'La información fue actualizada correctamente.',
    confirmButtonText: 'Aceptar',
    confirmButtonColor: '#4895ef'
}).then((result) => {

    if(result.isConfirmed){
        window.location.href = 'actualizar_datos.php';
    }

});
</script>

<?php } ?>

<?php if($mensaje == "correo_existe"){ ?>

<script>
Swal.fire({
    icon: 'warning',
    title: 'Correo ya registrado',
    text: 'Ese correo electrónico ya pertenece a otro usuario.',
    confirmButtonText: 'Aceptar',
    confirmButtonColor: '#4895ef'
}).then((result) => {

    if(result.isConfirmed){
        window.location.href = 'actualizar_datos.php';
    }

});
</script>

<?php } ?>

<?php if($mensaje == "error"){ ?>

<script>
Swal.fire({
    icon: 'error',
    title: 'Error',
    text: 'No fue posible actualizar la información.',
    confirmButtonText: 'Aceptar',
    confirmButtonColor: '#4895ef'
}).then((result) => {

    if(result.isConfirmed){
        window.location.href = 'actualizar_datos.php';
    }

});
</script>

<?php } ?>

</body>
</html>