<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
<body>
    <div class="container">
        <h1 class="text-center">Login</h1>
    <form action="loginv.php" method="post">
  <div class="mb-3">
    <label class="form-label">Usuario</label>
    <input type="text" name="usuario" class="form-control" required  >
  </div>
  <div class="mb-3">
    <label class="form-label">Contraseña</label>
    <input type="text"  name="clave" class="form-control"  required >
  </div>
 
  
  <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
</form>
    </div>
</body>
</html>