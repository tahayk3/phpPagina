<?php
include_once('../archivosConfig/env.php');

$nombre_medicamento = $_POST['nombre_medicamento'];
$precio = $_POST['precio'];

$sql = "INSERT INTO medicamentos(nombre_medicamento, precio) VALUES('$nombre_medicamento',
'$precio')";



$to = "tahayk3@gmail.com";
$subject = "ALGUIEN SE CONTACTO CONTIGO ";
$message = "El nombre del medicamento es:" . $nombre_medicamento . " el precio del medicamento es: " . $precio;
mail($to, $subject, $message);

$query = mysqli_query($conexion, $sql);
if($query == TRUE)
{
    echo "<script>
    window.location= '../crudMedicamentos/mostrarMedicamentos.php'
          </script>";
}
?>