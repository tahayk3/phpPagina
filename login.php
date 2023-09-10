<?php
    session_start();

include_once('./archivosConfig/env.php');


if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if($_POST['usuario'] !=null || $_POST['contrasenia'] !=null)
{

$usuario = $_POST['usuario'];
$contrasenia = $_POST['contrasenia'];

$consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasenia = '$contrasenia'";
$resultado = mysqli_query($conexion, $consulta);



if (mysqli_num_rows($resultado) == 1) {

$consulta2 = "SELECT id_usuario FROM usuarios WHERE usuario = '$usuario' AND contrasenia = '$contrasenia'";
$resultado2 = mysqli_query($conexion, $consulta2);
$row= mysqli_fetch_array($resultado2);
$id_usuario = $row['id_usuario'];

$consulta3 = "SELECT nombre_rol FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_rol where id_usuario = '$id_usuario' ";
$resultado3 = mysqli_query($conexion, $consulta3);
$row= mysqli_fetch_array($resultado3);
$nombre_rol = $row['nombre_rol'];

    $_SESSION['usuario'] = $usuario;
  
    $_SESSION['tipoUsuario'] = $nombre_rol;
    header("Location: index.php");
} else {

    header("Location: index.php");
}


mysqli_close($conexion);
}
?>