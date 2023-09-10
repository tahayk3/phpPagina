<?php
include_once('../archivosConfig/env.php');

$id_medicamento = $_REQUEST['id_medicamento'];

$sql = "DELETE FROM medicamentos WHERE id_medicamento = '$id_medicamento'";

$query = mysqli_query($conexion, $sql);
if($query == TRUE)
{
    echo "<script>
    window.location= '../crudMedicamentos/mostrarMedicamentos.php'
          </script>";
}
?>