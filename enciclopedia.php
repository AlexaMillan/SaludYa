<?php

include("conexion.php");

$consulta = "SELECT * FROM enciclopedia ";
$resultado = mysqli_query($conexion, $consulta);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Enciclopedia Médica</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body>

<body>

<div class="container-fluid">

    <div class="row">
        <div class="col-md">

            <nav class="navbar navbar-expand-sm bg-white navbar-white" style="border-bottom:4px solid #4895ef;">

                <img src="img/logo.jpeg" style="height: 120px;"></img>

                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#Menu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-around" id="Menu">

                    <ul class="navbar-nav">

                        <li class="nav-item"><a href="index.php" class="nav-link active text-dark"><i class="fas fa-home"></i> Inicio</a></li>
                        <li class="nav-item"><a href="" class="nav-link text-dark"><i class="bi bi-geo-alt-fill"></i> Sedes</a></li>

                    </ul>

                </div>

            </nav>

        </div>
    </div>

<div class="container">

    <h1 class="text-center mt-4">Enciclopedia Médica SaludYa</h1>
    <div class="text-center mb-4">
        <a href="index.php" class="btn btn-outline-info">
            <i class="fas fa-arrow-left"></i> Regresar
        </a>
</div>

    <br>

    <table class="table table-bordered table-hover">

        <thead class="thead-dark">

            <tr>
                <th>Nombre Enfermedad</th>
                <th>Síntomas</th>
                <th>Tratamiento</th>
            </tr>

        </thead>

        <tbody>

        <?php while($fila = mysqli_fetch_assoc($resultado)){ ?>

            <tr>

                <td><?php echo $fila['nombre']; ?></td>

                <td><?php echo $fila['sintomas']; ?></td>

                <td><?php echo $fila['recomendaciones']; ?></td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

</body>
</html>