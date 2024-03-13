<?php

if ($_SESSION['rol'] == 1) {
  $index = 'Usuario';
  $indexx = '../admin/index.php';
  $opciontwo = 'Productos';
  $opciontwof = '../admin/producto.php';
  $rol='Administrador';
} elseif ($_SESSION['rol'] == 2) {
  $index = 'Productos';
  $indexx = '../user/index.php';
  $opciontwo = 'Carrito';
  $opciontwof = '../user/carrito.php';
  $rol='Usuario';
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo $indexx; ?>"><?php echo $index; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo $opciontwof; ?>"><?php echo $opciontwo; ?></a>
            </li>
            <li class="nav-item">
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Perfil
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Datos de la Cuenta</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <h5><?php echo $rol; ?></h5>
                      <p><?php echo $_SESSION['usuario']; ?></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a type="button" class="btn btn-dark" href="../cs.php">Cerrar sesion</a>
                    </div>
                  </div>
                </div>
              </div>


            </li>

          </ul>
        </div>
      </div>
    </nav>
  </header>

  <?php require_once 'footer.php' ?>