<?php
session_start();
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
        .carousel> .carousel-inner>.carousel-item>img{
            display: block;
            height:500px; 
            width:100%;
        }
        h3{
            font-family: 'Oswald', sans-serif;
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
                        <img src="img/logo.jpeg" style="height: 120px;" ></img>
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#Menu">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse justify-content-around" id="Menu">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a href="index.php" class="nav-link active text-dark">
                                            <i class="fas fa-home"></i> Inicio
                                        </a>
                                    </li>

                                    <?php if(isset($_SESSION['idusuario'])){ ?>

                                        <li class="nav-item">
                                            <span class="nav-link text-primary">
                                                Hola, <?php echo $_SESSION['nombre']; ?>
                                            </span>
                                        </li>

                                        <li class="nav-item">
                                            <a href="cerrar_sesion.php" class="nav-link text-danger">
                                                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                                            </a>
                                        </li>

                                    <?php } else { ?>

                                        <li class="nav-item">
                                            <a href="login.php" class="nav-link text-dark">
                                                <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="registro.php" class="nav-link text-dark">
                                                <i class="fas fa-address-card"></i> Registrarse
                                            </a>
                                        </li>

                                    <?php } ?>

                                </ul>
                            </div>
                            <form class="form-inline" style="padding:8px;">
                                <input class="form-control " type="search" placeholder="Buscar" >
                                <button class="btn btn-outline-info " type="submit">Buscar</button>    
                            </form> 
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="carousel slide" data-ride="carousel" id="carrusel">
                        <ul class="carousel-indicators">
                            <li data-target="#carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#carrusel" data-slide-to="1"></li>
                            <li data-target="#carrusel" data-slide-to="2"></li>
                        </ul>

                        <div class="carousel-inner img-fluid">
                            <div class="carousel-item active">
                                <a href=""><img src="img/carru1.jpg" class="img-fluid" style="height:600px; width:100%;"></img></a>
                            </div>
                            <div class="carousel-item">
                                <a href=""><img src="img/carru2.jpg" class="img-fluid" style="height:600px; width:100%;"></img></a>
                            </div>
                            <div class="carousel-item ">
                                <a href="#"><img src="img/carru3.jpg" class="img-fluid" style="height:600px; width:100%;"></img></a>
                                
                            </div>
                        </div>
                        <a href="#carrusel" class="carousel-control-prev" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a href="#carrusel" class="carousel-control-next" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
            </div>
            <br></br>
            <div class="row">
                <div class="card text-center" style="margin-left:140px;">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="registro.php">Registro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="login.php" >Iniciar Sesion</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Ingresa a nuestro sistema de salud</h5>
                        <p class="card-text">Al ingresar en nuestro sistema de salud, podras gestionar tus citas sin intermediarios y ademas podras ver tus laboratorios clinicos e imagenes diagnosticas.</p>
                        <a href="login.php" class="btn btn-outline-info">
                            Iniciar Sesión
                        </a>
                    </div>
                </div>  
            </div>
            <br></br>
            <div class="row" style="margin-left:100px;">
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;height:590px;">
                        <img src="img/enfermeras.png" style="height:50%; width:100%; border-radius:100%; float:right;" class="card-img-top">
                        <div class="card-body">
                            <h3 style="color:#023e8a; text-align:center;">Enfermeras en casa</h3>
                            <p class="card-text text-justify">Te facilitamos el acceso al personal de enfermeria, 
                                con el fin de prestar ayuda a aquellos pacientes y familiares 
                                que padecen alguna patología o necesitan determinados tipos de cuidados en su domicilio.</p>
                        </div>
                        <div class="card-footer">
                        <a href="solicitar_enfermera.php" class="btn btn-outline-info" style="margin-left:70px;" >Conoce más...</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;height:590px;">
                        <img src="img/citas.jpg" style="height:50%; width:100%; border-radius:100%; float:right;" class="card-img-top">
                        <div class="card-body">
                            <h3 style="color:#023e8a; text-align:center;">Gestiona tus citas</h3>
                            <p class="card-text text-justify">Agenda cada una de tus citas sin ningun intermediario.
                                A su vez, puedes cancelar o reagendar y asi mismo consultar cada una de tus citas pendientes.
                            </p>
                        </div>
                        <div class="card-footer">
                        <a href="agendar_cita.php" class="btn btn-outline-info" style="z-index:999;">Conoce más...</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;height:590px;">
                        <img src="img/enci.jpg" style="height:50%; width:100%; border-radius:100%; float:right;" class="card-img-top">
                        <div class="card-body">
                            <h3 style="color:#023e8a; text-align:center;">Enciclopedia</h3>
                            <p class="card-text text-justify">Contamos con el servicio de una enciclopedia medica basica, 
                                donde encontraras algunas de las enfermedades mas comunes, con sus síntomas y algunas recomendaciones.</p>
                        </div>
                        <div class="card-footer">
                        <a href="enciclopedia.php" class="btn btn-outline-info" style="margin-left:70px;" >Conoce más...</a>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>  
            <div class="row" style="background-image: url(https://img.freepik.com/vector-gratis/fondo-abstracto-azul-formas-geometricas_1035-17545.jpg?w=1500)" >
                <div class="col-md-6" >
                    <h5 class="text-center" style="margin-top:20px;">SaludYa</h5><br>
                    <i class="bi bi-telephone" style="margin-left:30px;"></i>
                    <p style="margin-left:30px;">PBX: (602) 620 00 00 - Fax: 886 0150</p>
                    <p style="margin-left:30px;">Línea Gratuita Nacional: 01-8000972033</p>
                    <i class="bi bi-geo-alt" style="margin-left:30px;"></i>
                    <p style="margin-left:30px;">Transversal 78H-37 sur</p>
                    <i class="bi bi-envelope" style="margin-left:30px;"></i>
                    <p style="margin-left:30px;">contactenos@saludya.gov.co</p>
                    <p style="margin-left:30px;">njudiciales@saludya.gov.co</p>
                    <p style="margin-left:30px;">ntutelas@saludya.gov.co</p>
                    <p style="margin-left:30px;">nconciliaciones@saludya.gov.co</p>
                </div>
                <div class="col-md-6 text-center">
                    <h5 style="margin-top:20px;">Visita Nuestras Redes</h5><br>
                    <img src="img/secretariasalud.png" style="height: 250px;" alt=""/>
                    <br>
                    <a href="https://twitter.com/GobValle" class="btn"><i class="fab fa-twitter-square"  ></i></a>
                    <a href="https://www.facebook.com/share/1MF4GmDbau/" class="btn"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/secretariasaludbogota?igsh=MWpnYWR1eGpjdHZiYQ==" class="btn"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.youtube.com/@Secretar%C3%ADaDistritaldeSalud" class="btn"><i class="bi bi-youtube"></i></a>
                </div>    
            </div>
        </div>









    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    
</body>
</html>