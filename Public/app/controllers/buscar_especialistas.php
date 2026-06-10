<?php

include("conexion.php");

$idespecialidad = $_POST['idespecialidad'];

$sql = "
SELECT
    e.idespecialista,
    u.nombre
FROM especialista e
INNER JOIN usuario u
    ON e.idusuario = u.idusuario
WHERE e.idespecialidad = '$idespecialidad'
ORDER BY u.nombre";

$resultado = mysqli_query($conexion,$sql);

echo '<option value="">Seleccione especialista</option>';

while($fila=mysqli_fetch_assoc($resultado)){

    echo '<option value="'.$fila['idespecialista'].'">';
    echo $fila['nombre'];
    echo '</option>';
}
?>