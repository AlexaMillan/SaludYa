<?php
session_start();
include("conexion.php");

if(!isset($_SESSION['idusuario'])){
    header("Location: login.php");
    exit();
}

$idusuario = $_SESSION['idusuario'];

$sql = "SELECT * FROM usuario
        WHERE idusuario='$idusuario'";

$resultado = mysqli_query($conexion,$sql);
$usuario = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Actualizar Datos</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

<style>

*{
    margin:0;
    padding:0;
}

body{
    background:#f5f7fb;
}

/* NAVBAR */
.navbar{
    border-bottom:4px solid #4895ef;
}

/* CONTENEDOR */
.main-layout{
    display:flex;
    margin-top:30px;
    padding:20px;
}

/* SIDEBAR */
.sidebar{
    width:260px;
    background:#4895ef;
    color:white;
    padding:40px 20px;
    border-radius:10px;
    min-height:650px;
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
    background:#e6f0ff;
    padding:30px;
    border-radius:10px;
    box-shadow:0px 2px 10px rgba(0,0,0,0.1);
}

h3{
    color:#023e8a;
}

</style>

</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-sm bg-white navbar-white">

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

<div class="main-layout">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <h5>Usuario</h5>
        <h4><?php echo $usuario['nombre']; ?></h4>

        <hr style="background:white;">

        <a href="actualizar_datos.php">
            Actualizar datos
        </a>

        <a href="consultar_solicitud.php">
            Consultar solicitud
        </a>

        <a href="index.php">
            Regresar
        </a>

    </div>

    <!-- FORMULARIO -->
    <div class="content">

        <div class="box">

            <h3>Actualizar Datos</h3>
            <hr>

            <form action="guardar_actualizacion.php" method="POST">

                <input type="hidden"
                       name="idusuario"
                       value="<?php echo $usuario['idusuario']; ?>">

                <!-- SOLO LECTURA -->

                <div class="form-group">
                    <label>Documento</label>
                    <input
                        type="text"
                        class="form-control"
                        value="<?php echo $usuario['documento']; ?>"
                        readonly>
                </div>

                <div class="form-group">
                    <label>Nombre Completo</label>
                    <input
                        type="text"
                        class="form-control"
                        value="<?php echo $usuario['nombre']; ?>"
                        readonly>
                </div>

                <div class="form-group">
                    <label>Rol</label>
                    <input
                        type="text"
                        class="form-control"
                        value="<?php echo $usuario['rol']; ?>"
                        readonly>
                </div>

                <div class="form-group">
                    <label>Estado</label>
                    <input
                        type="text"
                        class="form-control"
                        value="<?php echo $usuario['estado']; ?>"
                        readonly>
                </div>

                <hr>

                <!-- EDITABLES -->

                <div class="form-group">
                    <label>Correo Electrónico</label>
                    <input
                        type="email"
                        name="correo"
                        class="form-control"
                        value="<?php echo $usuario['correo']; ?>"
                        required>
                </div>

                <div class="form-group">
                    <label>Teléfono</label>
                    <input
                        type="text"
                        name="telefono"
                        class="form-control"
                        value="<?php echo $usuario['telefono']; ?>">
                </div>

                <div class="form-group">
                    <label>Nueva Contraseña</label>
                    <input 
                        type="password"
                        name="contrasena"
                        class="form-control"
                        placeholder="Dejar vacío si no desea cambiarla">
                </div>

                <button
                    type="submit"
                    class="btn btn-info btn-block">Guardar Cambios
                </button>

            </form>

        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>