<?php
require_once '../db.php';
session_start();
$sql=$conexion->prepare("SELECT * FROM productos");
$sql->execute();
$datos=$sql->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>

<body>
    <?php require_once '../components/header.php' ?>
    <div class="container">
        <h1 class="text-center">Productos</h1>
    </div>
    <div class="container text-center">
        <div class="d-flex justify-content-evenly flex-wrap gap-3">
        <?php foreach ($datos AS $item){ ?>
            
           
                <div class="card" style="width: 18rem;">

                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item['nombre']; ?></h5>
                        <p class="card-text"><?php echo  '$'.number_format($item['precio'],2); ?></p>
                        <a href="carrito.php?id=<?php echo $item['id']; ?>" class="btn btn-primary">Comprar</a>
                    </div>

                </div>
               
            
            <?php }?>
        </div>

    </div>
</body>

</html>