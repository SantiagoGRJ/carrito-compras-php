<?php 
require_once '../db.php';
session_start();
$id= isset($_GET['id']) ? $_GET['id'] : 0;
$sql=$conexion->prepare("SELECT * FROM productos WHERE id=:id");
$sql->bindParam(':id',$id,PDO::PARAM_INT);
$sql->execute();
$datos=$sql->fetch(PDO::FETCH_NUM);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edicion de Producto</title>
</head>
<body>
<?php require_once '../components/header.php' ?>
    <div class="container">
        <h4 class="text-center">Edición de producto</h4>
        <form action="../functions/edit_product.php" method="POST">
  <div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="hidden" class="form-control" name="id" value="<?php echo $datos[0]; ?>" aria-describedby="emailHelp" required>
    <input type="text" class="form-control" name="nombre" value="<?php echo $datos[1]; ?>" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Precio</label>
    <input type="number" min="0" step="0.01" name="precio" value="<?php echo $datos[2]; ?>"  class="form-control"  aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Cantidad</label>
    <input type="hidden" min="0" class="form-control" name="c" value="<?php echo $datos[3]; ?>"   aria-describedby="emailHelp" >
    <input type="number" min="0" class="form-control" name="cantidad"  aria-describedby="emailHelp" required>
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</body>
</html>