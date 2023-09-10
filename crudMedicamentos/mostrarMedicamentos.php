<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['tipoUsuario'] !== "administrador") {
    header("Location: ../index.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<!--menú-->
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MediXela</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menú</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../crudMedicamentos/mostrarMedicamentos.php">Crud de medicamentos</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Conoce Más
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="#">Contáctenos</a></li>
              <li><a class="dropdown-item" href="#">¿Quiénes somos?</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Ubicaciones</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<!--CRUD-->

<div class="container-sm">
  <h1 >Lista de medicamentos</h1>

  <a href="./agregarMedicamento.php"class="btn btn-primary">AGREGAR</a>
  <a href="../cerrar_sesion.php">Cerrar sesión</a>
  <table class="table"> 
    <thead>
      <tr>
        <th scope="col">Id medicamento</th>
        <th scope="col">Nombre</th>
        <th scope="col">Precio</th>
        <th scope="col">ACCIONES</th>
      </tr>
    </thead>
    <tbody>
    <?php
     include("../archivosConfig/env.php");
     $sql = "SELECT * FROM medicamentos";
     $query = mysqli_query($conexion, $sql);
     
     while($fila = mysqli_fetch_array($query)){
        ?>
        <tr>
            <th scope="row"><?php echo $fila['id_medicamento'] ?></th>
            <td><?php echo $fila['nombre_medicamento'] ?></td>
            <td><?php echo $fila['precio'] ?></td>
            <td><a href="./editarMedicamento.php?id_medicamento=<?php echo $fila['id_medicamento']?>" class="btn btn-primary">Editar</a>
            <a href="../accionesMedicamentos/db_eliminar.php?id_medicamento=<?php echo $fila['id_medicamento']?>" class="btn btn-secondary">Eliminar</a></td>
        </tr>
        <?php
     }
    ?>
    </tbody>
  </table>
</div>
</body>
</html>
