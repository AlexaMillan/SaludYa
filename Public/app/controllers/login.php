<?php
session_start();
include("conexion.php");

if(isset($_POST['btn'])){

    $documento = trim($_POST['cedula']);
    $contrasena = trim($_POST['contraseña']);

    $consulta = "SELECT * FROM usuario
                 WHERE documento='$documento'
                 AND contrasena='$contrasena'
                 AND estado='ACTIVO'";

    $resultado = mysqli_query($conexion, $consulta);

    if(mysqli_num_rows($resultado) > 0){

        $datos = mysqli_fetch_assoc($resultado);

        //GUARDAR SESIÓN (ESTO ES LO IMPORTANTE)
        $_SESSION['idusuario'] = $datos['idusuario'];
        $_SESSION['nombre'] = $datos['nombre'];
        $_SESSION['rol'] = $datos['rol'];

        //REDIRECCIÓN
        header("Location: index.php");
        exit();

    }else{

        echo "
        <script>
            alert('Documento o contraseña incorrectos');
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaludYa</title>
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
            margin:80px 0px 285px 860px;
            background-color:white;
            border:2px solid #4895ef;
            padding: 50px;
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
                                    <li class="nav-item"><a href="registro.php" class="nav-link text-dark " ><i class="fas fa-address-card"></i> Registrarse</a></li>
                                </ul>
                            </div> 
                    </nav>
                </div>
            </div>
            <div class="row" style="background-image:url(https://img.freepik.com/foto-gratis/doctor-cruzando-brazos-mientras-sostiene-estetoscopio-bata-blanca_176474-8491.jpg?w=1500)">
                
            <form name="login" method="POST">
                        <h3 class="text-center">Bienvenido</h3>
                        <br><br>
                        <div class="form-group">
                            <label for="usuario">Numero De Documento</label>
                            <input class="form-control" type="text"  name="cedula" id="cedula"/>
                        </div>
                        <div class="form-group">
                            <label for="contraseña">Contraseña</label>
                            <input class="form-control" type="password"  name="contraseña" id="contraseña"/>
                        </div>
                        
                        <div class="form-group ">
                            <input type="checkbox" name="connected" class="form-check-input" style="margin-left:6px;" />
                            <label for="connected" class="form-check-label" style="margin-left:20px;">Recordar Contraseña</label><br/>
                            
                        </div>
                        <br>
                        <fieldset>
                            <input type="submit" class="btn btn-outline-info"  style=" margin-left:150px ;" value="Iniciar Sesion" name="btn"/>
                            <br><br>
                            <span>¿Aun no tienes cuenta?<a href="registro.php">Registrate</a></span>
                        </fieldset>
                </form>
            </div>
            

        </div>




        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </h:body>
</html>
