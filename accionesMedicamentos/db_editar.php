<?php

include_once('../archivosConfig/env.php');

$id_medicamento = $_POST['id_medicamento'];
$nombre_medicamento = $_POST['nombre_medicamento'];
$precio = $_POST['precio'];




$sql = "UPDATE medicamentos SET nombre_medicamento = '$nombre_medicamento',
 precio = '$precio'
 where id_medicamento = '$id_medicamento'";

$query = mysqli_query($conexion, $sql);
if($query == TRUE)
{

    echo "<script>
            window.location= '../crudMedicamentos/mostrarMedicamentos.php'
          </script>";
}
?>



