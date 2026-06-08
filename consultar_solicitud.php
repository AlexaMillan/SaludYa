<?php

session_start();
include("conexion.php");

if(!isset($_SESSION['idusuario'])){
    header("Location: login.php");
    exit();
}

$idusuario = $_SESSION['idusuario'];
$nombre = $_SESSION['nombre'];

$consulta = "SELECT *
             FROM solicitud_enfermera
             WHERE idpaciente = '$idusuario'
             ORDER BY fecha_solicitud DESC";

$resultado = mysqli_query($conexion, $consulta);

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Consultar Solicitudes</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

<style>

*{
    margin:0;
    padding:0;
    font-family: Arial;
}

body{
    background:#f5f7fb;
}

/* NAVBAR */
.navbar{
    border-bottom:4px solid #4895ef;
}

/* CONTENEDOR PRINCIPAL */
.main-layout{
    display:flex;
    margin-top:120px;
    align-items:stretch;
    padding:20px;
}

/* SIDEBAR */
.sidebar{
    width:260px;
    background:#4895ef;
    color:white;
    padding:60px 20px 20px 20px;
    border-radius:10px;
}

.sidebar h4{
    font-weight:bold;
}

.sidebar a{
    display:block;
    padding:10px;
    margin-top:10px;
    color:white;
    text-decoration:none;
    border-radius:5px;
    background:rgba(255,255,255,0.15);
}

.sidebar a:hover{
    background:white;
    color:#4895ef;
}

/* CONTENIDO */
.content{
    flex:1;
    margin-left:20px;
}

.box{
    background:#eaf4ff;
    padding:25px;
    border-radius:10px;
    box-shadow:0px 2px 10px rgba(0,0,0,0.1);
}

.estado{
    font-weight:bold;
}

</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-sm bg-white navbar-white fixed-top">

    <img src="img/logo.jpeg" style="height:120px;">

    <div class="collapse navbar-collapse justify-content-end">

        <ul class="navbar-nav">

            <li class="nav-item">
                <a href="index.php" class="nav-link text-dark">
                    <i class="fas fa-home"></i> Inicio
                </a>
            </li>

            <li class="nav-item">
                <a href="cerrar_sesion.php" class="nav-link text-danger">
                    <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                </a>
            </li>

        </ul>

    </div>

</nav>

<!-- CONTENIDO -->
<div class="main-layout">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <h5>Usuario</h5>
        <h4><?php echo $nombre; ?></h4>

        <hr style="background:white;">

        <a href="actualizar_datos.php">
            Actualizar datos
        </a>

        <a href="consultar_solicitud.php">
            Consultar solicitud
        </a>

        <a href="solicitar_enfermera.php">
            Nueva solicitud
        </a>

        <a href="index.php">
            Regresar
        </a>

    </div>

    <!-- TABLA -->
    <div class="content">

        <div class="box">

            <h3>Estado de Solicitudes de Enfermería</h3>

            <hr>

            <?php if(mysqli_num_rows($resultado) > 0){ ?>

            <table class="table table-bordered table-hover table-striped">

                <thead class="thead-light">

                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Ciudad</th>
                        <th>Servicio</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                    </tr>

                </thead>

                <tbody>

                <?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

                    <tr>

                        <td>
                            <?php echo $fila['idsolicitud']; ?>
                        </td>

                        <td>
                            <?php echo $fila['fecha_solicitud']; ?>
                        </td>

                        <td>
                            <?php echo $fila['ciudad']; ?>
                        </td>

                        <td>
                            <?php echo $fila['servicio']; ?>
                        </td>

                        <td>
                            <?php echo $fila['descripcion']; ?>
                        </td>

                        <td>

                            <?php

                            switch($fila['estado']){

                                case 'PENDIENTE':
                                    echo "<span class='badge badge-warning'>PENDIENTE</span>";
                                    break;

                                case 'ASIGNADA':
                                    echo "<span class='badge badge-info'>ASIGNADA</span>";
                                    break;

                                case 'EN_PROCESO':
                                    echo "<span class='badge badge-primary'>EN PROCESO</span>";
                                    break;

                                case 'FINALIZADA':
                                    echo "<span class='badge badge-success'>FINALIZADA</span>";
                                    break;

                                case 'CANCELADA':
                                    echo "<span class='badge badge-danger'>CANCELADA</span>";
                                    break;
                            }

                            ?>

                        </td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

            <?php }else{ ?>

                <div class="alert alert-info">

                    No tienes solicitudes registradas actualmente.

                </div>

            <?php } ?>

        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>