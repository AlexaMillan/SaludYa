<?php
session_start();
include("conexion.php");

if(!isset($_SESSION['idusuario'])){
    header("Location: login.php");
    exit();
}

$idusuario = $_SESSION['idusuario'];
$nombre = $_SESSION['nombre'];

$sql = "
SELECT 
    c.idcita,
    c.motivo_consulta,
    c.estado,

    a.fecha,
    a.hora_inicio,
    a.hora_fin,

    u.nombre AS especialista,
    es.nombre AS especialidad,
    s.nombre AS sede

FROM cita_medica c
INNER JOIN agenda_cita a ON c.idagenda = a.idagenda
INNER JOIN especialista e ON a.idespecialista = e.idespecialista
INNER JOIN usuario u ON e.idusuario = u.idusuario
INNER JOIN especialidad es ON e.idespecialidad = es.idespecialidad
INNER JOIN sede s ON a.idsede = s.idsede

WHERE c.idpaciente = '$idusuario'
ORDER BY a.fecha DESC, a.hora_inicio DESC
";

$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Mis Citas</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<style>
*{margin:0;padding:0;font-family:Arial;}

.navbar{border-bottom:4px solid #4895ef;}

.main-layout{display:flex;margin-top:120px;}

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

.content{flex:1;padding:30px;}

.box{
    background:#f1f7ff;
    padding:25px;
    border-radius:10px;
    box-shadow:0px 2px 10px rgba(0,0,0,0.08);
}

.estado{
    padding:5px 10px;
    border-radius:5px;
    color:white;
    font-size:12px;
}

.AGENDADA{background:#4895ef;}
.CONFIRMADA{background:#28a745;}
.REAGENDADA{background:#ffc107;color:black;}
.CANCELADA{background:#dc3545;}
.FINALIZADA{background:#6c757d;}
</style>
</head>

<body>

<nav class="navbar navbar-expand-sm bg-white fixed-top">
    <img src="img/logo.jpeg" style="height:120px;">
    <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="index.php" class="nav-link">Inicio</a></li>
            <li class="nav-item"><a href="cerrar_sesion.php" class="nav-link text-danger">Cerrar Sesión</a></li>
        </ul>
    </div>
</nav>

<div class="main-layout">

<div class="sidebar">
    <h5>Usuario</h5>
    <h4><?php echo $nombre; ?></h4>
    <hr>
    <a href="consultar_citas.php">Consultar citas</a>
    <a href="index.php">Regresar</a>
</div>

<div class="content">
<div class="box">

<h3>📅 Mis Citas Médicas</h3>

<table class="table table-bordered table-hover">
<thead class="thead-dark">
<tr>
    <th>Fecha</th>
    <th>Hora</th>
    <th>Especialista</th>
    <th>Especialidad</th>
    <th>Sede</th>
    <th>Motivo</th>
    <th>Estado</th>
    <th>Acciones</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($resultado)){ ?>

<tr>
    <td><?php echo $row['fecha']; ?></td>
    <td><?php echo $row['hora_inicio']." - ".$row['hora_fin']; ?></td>
    <td><?php echo $row['especialista']; ?></td>
    <td><?php echo $row['especialidad']; ?></td>
    <td><?php echo $row['sede']; ?></td>
    <td><?php echo $row['motivo_consulta']; ?></td>

    <td>
        <span class="estado <?php echo $row['estado']; ?>">
            <?php echo $row['estado']; ?>
        </span>
    </td>

    <td>

    <?php if($row['estado']=='AGENDADA'){ ?>

        <button class="btn btn-danger btn-sm"
            onclick="cancelarCita(<?php echo $row['idcita']; ?>)">
            Cancelar
        </button>

        <a class="btn btn-warning btn-sm"
           href="reprogramar_cita.php?id=<?php echo $row['idcita']; ?>">
            Reprogramar
        </a>

    <?php } else { ?>

        <span class="text-muted">No disponible</span>

    <?php } ?>

    </td>

</tr>

<?php } ?>

</tbody>
</table>

</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function cancelarCita(id){

    Swal.fire({
        title: '¿Cancelar cita?',
        text: "Esta acción no se puede deshacer",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4895ef',
        cancelButtonColor: '#dc3545',
        confirmButtonText: 'Sí, cancelar'
    }).then((result) => {

        if(result.isConfirmed){
            window.location.href = 
            "cambiar_estado_cita.php?id="+id+"&estado=CANCELADA";
        }

    });

}
</script>

</body>
</html>