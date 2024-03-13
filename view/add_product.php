<?php 

session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto</title>
</head>
<body>
<?php require_once '../components/header.php' ?>
    <div class="container">
        <h4 class="text-center">Nuevo producto</h4>
        <form action="../functions/add_product.php" method="POST">
  <div class="mb-3">
    <label class="form-label">Nombre</label>

    <input type="text" class="form-control" name="nombre"  aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Precio</label>
    <input type="number" min="0" step="0.01" name="precio"   class="form-control"  aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Cantidad</label>
    
    <input type="number" min="1" class="form-control" name="cantidad"  aria-describedby="emailHelp" required>
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</body>
</html>