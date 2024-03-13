<?php 

session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Usuario</title>
</head>
<body>
<?php require_once '../components/header.php' ?>
    <div class="container">
        <h4 class="text-center">Nuevo Usuario</h4>
        <form action="../functions/add_user.php" method="POST">
  <div class="mb-3">
    <label class="form-label">Nombre</label>

    <input type="text" class="form-control" name="nombre"  aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Contraseña</label>
    <input type="text" name="clave"   class="form-control"  aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Rol</label>
    <br>
    <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" value="Administrador" id="flexRadioDefault1" >
  <label class="form-check-label" for="flexRadioDefault1">
   Administrador
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" value="Usuario" id="flexRadioDefault2" >
  <label class="form-check-label" for="flexRadioDefault2">
    Usuario
  </label>
</div>
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</body>
</html>