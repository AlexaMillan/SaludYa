<?php
session_start();
include("conexion.php");

if(!isset($_SESSION['idusuario'])){
    header("Location: login.php");
    exit();
}

$idusuario = $_SESSION['idusuario'];
$nombre = $_SESSION['nombre'];

$idcita = $_GET['id'];

/* Cita actual */
$sql = "
SELECT c.*, a.fecha, a.hora_inicio, a.hora_fin
FROM cita_medica c
INNER JOIN agenda_cita a ON c.idagenda = a.idagenda
WHERE c.idcita='$idcita'
";

$resultado = mysqli_query($conexion,$sql);
$cita = mysqli_fetch_assoc($resultado);

/* agendas disponibles */
$agendas = mysqli_query($conexion,"
SELECT *
FROM agenda_cita
WHERE disponible = 1
ORDER BY fecha, hora_inicio
");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Reprogramar Cita</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

<style>
*{margin:0;padding:0;font-family:Arial;}

.navbar{
    border-bottom:4px solid #4895ef;
}

.main-layout{
    display:flex;
    margin-top:120px;
}

/* SIDEBAR */
.sidebar{
    width:260px;
    background:#4895ef;
    color:white;
    padding:60px 20px 20px 20px;
}

.sidebar a{
    display:block;
    padding:10px;
    margin-top:10px;
    color:white;
    text-decoration:none;
    background:rgba(255,255,255,0.15);
    border-radius:5px;
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
    background:#f1f7ff;
    padding:25px;
    border-radius:10px;
    box-shadow:0px 2px 10px rgba(0,0,0,0.08);
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-sm bg-white fixed-top">

    <img src="img/logo.jpeg" style="height:120px;">

    <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a href="index.php" class="nav-link text-dark">Inicio</a>
            </li>

            <li class="nav-item">
                <a href="cerrar_sesion.php" class="nav-link text-danger">Cerrar Sesión</a>
            </li>

        </ul>
    </div>

</nav>

<!-- LAYOUT -->
<div class="main-layout">

<!-- SIDEBAR -->
<div class="sidebar">

    <h5>Usuario</h5>
    <h4><?php echo $nombre; ?></h4>

    <hr>

    <a href="consultar_citas.php">Consultar citas</a>
    <a href="index.php">Regresar</a>

</div>

<!-- CONTENIDO -->
<div class="content">

<div class="box">

<h3>🔄 Reprogramar Cita</h3>
<p>Seleccione un nuevo horario disponible</p>

<form method="POST" action="guardar_reprogramacion.php">

<input type="hidden" name="idcita" value="<?php echo $idcita; ?>">

<div class="form-group">
    <label>Fecha actual</label>
    <input type="text" class="form-control"
        value="<?php echo $cita['fecha']." ".$cita['hora_inicio']." - ".$cita['hora_fin']; ?>"
        disabled>
</div>

<div class="form-group">
    <label>Nuevo horario</label>

    <select name="idagenda" class="form-control" required>
        <option value="">Seleccione horario</option>

        <?php while($a = mysqli_fetch_assoc($agendas)){ ?>
            <option value="<?php echo $a['idagenda']; ?>">
                <?php echo $a['fecha']." | ".$a['hora_inicio']." - ".$a['hora_fin']; ?>
            </option>
        <?php } ?>

    </select>
</div>

<button class="btn btn-primary btn-block">
    Guardar reprogramación
</button>

</form>

</div>
</div>
</div>

</body>
</html>