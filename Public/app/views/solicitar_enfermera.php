<?php
session_start();

if(!isset($_SESSION['idusuario'])){
    header("Location: login.php");
    exit();
}

$nombre = $_SESSION['nombre'];
$idusuario = $_SESSION['idusuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Solicitud Enfermera</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

<style>
*{
    margin:0;
    padding:0;
    font-family: Arial;
}

/* NAVBAR */
.navbar{
    border-bottom:4px solid #4895ef;
}

/* LAYOUT FLEX */
.main-layout{
    display:flex;
    margin-top:120px; /* deja espacio del navbar */
    align-items: stretch;
}

/* SIDEBAR */
.sidebar{
    width:260px;
    background:#4895ef;
    color:white;
    padding:40px;
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
    padding:30px;
}

.box{
    background:#e6f0ff;
    padding:25px;
    border-radius:10px;
    box-shadow:0px 2px 10px rgba(0,0,0,0.1);
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

<!-- CONTENIDO PRINCIPAL -->
<div class="main-layout">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <h5>Usuario</h5>
        <h4><?php echo $nombre; ?></h4>

        <hr>

        <a href="actualizar_datos.php">Actualizar datos</a>
        <a href="consultar_solicitud.php">Consultar solicitud</a>
        <a href="index.php">Regresar</a>

    </div>

    <!-- FORMULARIO -->
    <div class="content">

        <div class="box">

            <h3>Solicitud de Enfermera en Casa</h3>
            <p>Complete los datos para generar su solicitud</p>

            <form method="POST" action="guardar_solicitud.php">

                <input type="hidden" name="idpaciente" value="<?php echo $idusuario; ?>">

                <div class="form-group">
                    <label>Dirección</label>
                    <input type="text" name="direccion" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Ciudad</label>
                    <input type="text" name="ciudad" class="form-control">
                </div>

                <div class="form-group">
                    <label>Servicio</label>
                    <input type="text" name="servicio" class="form-control"
                    placeholder="Ej: Curaciones, inyectología, cuidado básico">
                </div>

                <div class="form-group">
                    <label>Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="4"></textarea>
                </div>

                <button class="btn btn-info btn-block">
                    Confirmar solicitud
                </button>

            </form>

        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>