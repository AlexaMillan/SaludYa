<?php

include("conexion.php");

$mensaje = "";

if(isset($_POST['button'])){

    $documento = trim($_POST['cedula']);
    $nombre = trim($_POST['nombre']);
    $telefono = trim($_POST['telefono']);
    $correo = trim($_POST['correo']);
    $contrasena = trim($_POST['contrasena']);

    // Verificar si ya existe documento o correo

    $verificar = "SELECT * FROM usuario
                  WHERE documento='$documento'
                  OR correo='$correo'";

    $resultado = mysqli_query($conexion, $verificar);

    if(mysqli_num_rows($resultado) > 0){

        $mensaje = "usuario_existente";

    }else{

        $sql = "INSERT INTO usuario
                (
                    documento,
                    nombre,
                    telefono,
                    correo,
                    contrasena,
                    rol
                )
                VALUES
                (
                    '$documento',
                    '$nombre',
                    '$telefono',
                    '$correo',
                    '$contrasena',
                    'PACIENTE'
                )";

        if(mysqli_query($conexion,$sql)){

            $mensaje = "registro_exitoso";

        }else{

            $mensaje = "error_registro";

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RVS</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"></link>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Oswald:wght@300&family=Roboto:wght@100;300;400&display=swap');
        *{
            padding:0;
            margin:0;
        }
        form{
            width:500px;
            margin:126px 0px 105px 860px;
            background-color:white;
            border:2px solid #4895ef;
            padding: 30px;
        }
        h3{
            font-family: 'Oswald', sans-serif;
            margin-top:20px;
        }
        h5{
            font-family: 'Oswald', sans-serif;
        }
    </style>
</head>

<?php ?>


<?php if($mensaje == "error_registro"){ ?>

<script>

Swal.fire({
    icon: 'error',
    title: 'Error',
    text: 'No fue posible completar el registro.',
    confirmButtonText: 'Aceptar',
    confirmButtonColor: '#4895ef'
});

</script>

<?php } ?>
<body>
        <div class="container-fluid">
        <div class="row">
                <div class="col-md">
                    <nav class="navbar navbar-expand-sm bg-white navbar-white" style="border-bottom:4px solid #4895ef;">
                        <img src="img/logo.jpeg" style="height: 120px;"></img>
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#Menu">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse justify-content-end" id="Menu">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a href="index.php" class="nav-link active text-dark"><i class="fas fa-home"></i> Inicio</a></li>
                                    <li class="nav-item"><a href="login.php" class="nav-link text-dark " ><i class="fas fa-sign-in-alt"></i> Iniciar Sesion</a></li>
                                </ul>
                            </div> 
                    </nav>
                </div>
            </div>
            <div class="row" style="background-image:url(https://img.freepik.com/foto-gratis/medico-medico-doctor-hombre_1150-15053.jpg?w=1500)">
                
                <form name="registro" method="POST">
                    <h3 class="text-center" >Registro</h3>
                    <div class="col-md-12 form-group">
                        <label class="form-label">Numero de documento:</label>
                        <input type="number" class="form-control" name="cedula" required="" minlength="1" maxlength="11"/>
                    </div>
                    <div class="col-md-12 form-group">
                        
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" required="" />
                    </div>
                    <div class="col-md-12 form-group">
                        <label class="form-label">Numero de telefono:</label>
                        <input type="text" class="form-control" name="telefono" placeholder="+57-3132456789" pattern="+[0-9] {2}-[0-9] {10}" required=""/>
                    </div>
                    <div class="col-md-12 form-group">
                        <label class="form-label">Correo:</label>
                        <input type="email" class="form-control" name="correo" required="" /> 
                    </div>
                    <div class="col-md-12 form-group">
                        <label class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" name="contrasena" required=""/>
                    </div>
                    <div class="col pt-3 text-center">
                        <input type="submit" value="Registrarse"  class="btn btn-outline-info" name="button" style="margin:30px;"/>
                    </div>
                </form>
            </div>
            

        </div>


        <div style="background:yellow;padding:10px;font-weight:bold;">
            Mensaje actual: <?php echo $mensaje; ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<?php if($mensaje == "registro_exitoso"){ ?>

<script>

Swal.fire({
    icon: 'success',
    title: '¡Bienvenido a SaludYa!',
    text: 'Tu cuenta ha sido creada exitosamente.',
    confirmButtonText: 'Continuar',
    confirmButtonColor: '#4895ef'
}).then((result) => {

    if(result.isConfirmed){
        window.location.href = 'index.php';
    }

});

</script>

<?php } ?>


<?php if($mensaje == "usuario_existente"){ ?>

<script>

Swal.fire({
    icon: 'warning',
    title: 'Usuario ya registrado',
    text: 'Ya existe una cuenta con ese documento o correo electrónico.',
    confirmButtonColor: '#4895ef'
});

</script>

<?php } ?>


<?php if($mensaje == "error_registro"){ ?>

<script>

Swal.fire({
    icon: 'error',
    title: 'Error',
    text: 'No fue posible completar el registro.',
    confirmButtonColor: '#4895ef'
});

</script>

<?php } ?>


    </body>
</html>
