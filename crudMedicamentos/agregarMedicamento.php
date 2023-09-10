<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['tipoUsuario'] !== "administrador") {
    header("Location: ../index.php"); // Redirigir al formulario de inicio de sesión si no se ha iniciado sesión
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar medicamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
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

<body>
    <div class="container">
        <form action = "../accionesMedicamentos/db_insertar.php" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input name="nombre_medicamento" type="text" class="form-control"  placeholder="Nombre del medicamento">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Precio</label>
                <input name="precio" type="number" class="form-control"  placeholder="Precio del medicamento">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</body>

</html>

