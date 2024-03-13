<?php
require '../db.php';
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
    
    <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../css/responsive.bootstrap5.min.css">
    
    <title>Productos</title>
</head>
<body>
    <?php require_once '../components/header.php' ?>
    <div class="container">
        <h1 class="text-center">Productos</h1>
       <div class="card">
       <a href="../view/add_product.php" class="btn btn-success">Agregar Producto</a>
        <div class="card-body">
            
        <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <th>id</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php foreach ($datos as $item){ ?>
            <tr>
                <td><?php echo $item['id'] ;?></td>
                <td><?php echo $item['nombre'] ;?></td>
                <td><?php echo $item['precio'] ;?></td>
                <td><?php echo $item['cantidad'] ;?></td>
                <td><a href="../view/edit_product.php?id=<?php echo $item['id'] ;?>" class="btn btn-warning">Editar</a> | <a href="../functions/del_product.php?id=<?php echo $item['id'] ;?>" class="btn btn-danger">Eliminar</a></td>
            </tr>
            <?php }?>
        </tbody>
        </table>
        </div>
       </div>
    </div>

    <script src="../js/jquery-3.7.0.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap5.min.js"></script>
    <script src="../js/dataTables.responsive.min.js"></script>
    <script src="../js/responsive.bootstrap5.min.js"></script>
    <script>
        new DataTable('#example',{
            responsive: true,
            autoWidth:false
        });
    </script>
</body>
</html>