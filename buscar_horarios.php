<?php

include("conexion.php");

$idespecialista = $_POST['idespecialista'];

$sql = "
SELECT
    idagenda,
    fecha,
    hora_inicio,
    hora_fin
FROM agenda_cita
WHERE idespecialista='$idespecialista'
AND disponible=1
ORDER BY fecha,hora_inicio";

$resultado = mysqli_query($conexion,$sql);

echo '<option value="">Seleccione horario</option>';

while($fila=mysqli_fetch_assoc($resultado)){

    echo '<option value="'.$fila['idagenda'].'">';

    echo $fila['fecha']
        ." | "
        .$fila['hora_inicio']
        ." - "
        .$fila['hora_fin'];

    echo '</option>';
}
?>