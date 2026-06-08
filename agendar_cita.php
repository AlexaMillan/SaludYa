<?php
session_start();
include("conexion.php");

if(!isset($_SESSION['idusuario'])){
    header("Location: login.php");
    exit();
}

$idusuario = $_SESSION['idusuario'];
$nombre = $_SESSION['nombre'];

/* Traer agendas disponibles con info de especialista y sede */
$sql = "SELECT 
            a.idagenda,
            a.fecha,
            a.hora_inicio,
            a.hora_fin,
            s.nombre AS sede,
            e.idespecialista
        FROM agenda_cita a
        INNER JOIN sede s ON a.idsede = s.idsede
        INNER JOIN especialista e ON a.idespecialista = e.idespecialista
        WHERE a.disponible = 1";

$resultado = mysqli_query($conexion, $sql);

$sqlEspecialidades = "SELECT * FROM especialidad";
$especialidades = mysqli_query($conexion,$sqlEspecialidades);

$sqlSedes = "SELECT * FROM sede
             WHERE estado='ACTIVA'";
$sedes = mysqli_query($conexion,$sqlSedes);

$sqlEspecialistas = "
SELECT
    e.idespecialista,
    u.nombre,
    es.nombre AS especialidad
FROM especialista e
INNER JOIN usuario u
    ON e.idusuario = u.idusuario
INNER JOIN especialidad es
    ON e.idespecialidad = es.idespecialidad
ORDER BY u.nombre";

$especialistasDisponibles =
mysqli_query($conexion,$sqlEspecialistas);

$sqlHorarios = "
SELECT
    a.idagenda,
    a.fecha,
    a.hora_inicio,
    a.hora_fin,
    u.nombre AS especialista
FROM agenda_cita a
INNER JOIN especialista e
    ON a.idespecialista = e.idespecialista
INNER JOIN usuario u
    ON e.idusuario = u.idusuario
WHERE a.disponible = 1
ORDER BY a.fecha, a.hora_inicio";

$horarios = mysqli_query($conexion,$sqlHorarios);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Agendar Cita</title>

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
<nav class="navbar navbar-expand-sm bg-white navbar-white fixed-top">

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

    <a href="actualizar_datos.php">Actualizar datos</a>
    <a href="consultar_citas.php">Consultar citas</a>
    <a href="index.php">Regresar</a>

</div>

<!-- CONTENIDO -->
<div class="content">

<div class="box">

<h3>Agendar Cita Médica</h3>
<p>Seleccione una agenda disponible</p>

<form method="POST" action="guardar_cita.php">

<input type="hidden"
       name="idpaciente"
       value="<?php echo $idusuario; ?>">

<!-- ESPECIALIDAD -->
<div class="form-group">

    <label>Especialidad</label>

    <select name="idespecialidad"
            id="idespecialidad"
            class="form-control"
            required>

        <option value="">
            Seleccione una especialidad
        </option>

        <?php while($esp=mysqli_fetch_assoc($especialidades)){ ?>

        <option value="<?php echo $esp['idespecialidad']; ?>">
            <?php echo $esp['nombre']; ?>
        </option>

        <?php } ?>

    </select>

</div>

<!-- SEDE -->
<div class="form-group">

    <label>Sede de atención</label>

    <select name="idsede"
            class="form-control"
            required>

        <option value="">
            Seleccione una sede
        </option>

        <?php while($sede=mysqli_fetch_assoc($sedes)){ ?>

        <option value="<?php echo $sede['idsede']; ?>">
            <?php echo $sede['nombre']; ?>
        </option>

        <?php } ?>

    </select>

</div>

<!-- ESPECIALISTA -->
<div class="form-group">

    <label>Especialista</label>

    <select name="idespecialista"
        id="idespecialista"
        class="form-control"
        required>

        <option value="">
            Seleccione especialista
        </option>

        <?php while($esp=mysqli_fetch_assoc($especialistasDisponibles)){ ?>

        <option value="<?php echo $esp['idespecialista']; ?>">

            <?php
            echo $esp['nombre']
                 ." - "
                 .$esp['especialidad'];
            ?>

        </option>

        <?php } ?>

    </select>

</div>

<!-- JORNADA -->
<div class="form-group">

    <label>Jornada</label>

    <select name="jornada"
            class="form-control">

        <option value="">
            Seleccione jornada
        </option>

        <option value="MANANA">
            Jornada Mañana (06:00 AM - 12:00 PM)
        </option>

        <option value="TARDE">
            Jornada Tarde (01:00 PM - 06:00 PM)
        </option>

    </select>

</div>

<!-- HORARIO -->
<div class="form-group">

    <label>Horario disponible</label>

    <select name="idagenda"
        id="idagenda"
        class="form-control"
        required>

        <option value="">
            Seleccione horario
        </option>

        <?php while($hora=mysqli_fetch_assoc($horarios)){ ?>

        <option value="<?php echo $hora['idagenda']; ?>">

            <?php
            echo $hora['fecha']
                 ." | "
                 .$hora['hora_inicio']
                 ." - "
                 .$hora['hora_fin']
                 ." | "
                 .$hora['especialista'];
            ?>

        </option>

        <?php } ?>

    </select>

</div>

<!-- MOTIVO -->
<div class="form-group">

    <label>Motivo de consulta</label>

    <textarea
        name="motivo_consulta"
        class="form-control"
        rows="4"
        required></textarea>

</div>

<button
    type="submit"
    class="btn btn-info btn-block">

    Confirmar cita

</button>
</form>
</div>

</div>

</div>

<!-- AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){

    // FILTRAR ESPECIALISTAS

    $("#idespecialidad").change(function(){

        let idespecialidad = $(this).val();

        $.ajax({

            url:"buscar_especialistas.php",
            type:"POST",

            data:{
                idespecialidad:idespecialidad
            },

            success:function(respuesta){

                $("#idespecialista").html(respuesta);

                $("#idagenda").html(
                    '<option value="">Seleccione horario</option>'
                );

            }

        });

    });

    // FILTRAR HORARIOS

    $("#idespecialista").change(function(){

        let idespecialista = $(this).val();

        $.ajax({

            url:"buscar_horarios.php",
            type:"POST",

            data:{
                idespecialista:idespecialista
            },

            success:function(respuesta){

                $("#idagenda").html(respuesta);

            }

        });

    });

});

</script>
</body>
</html>