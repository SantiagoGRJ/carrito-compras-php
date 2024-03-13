<?php
require '../db.php';
session_start();
$sql=$conexion->prepare("SELECT * FROM usuarios");
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
   
    
    <title>Usuarios</title>
</head>
<body>
    <?php require_once '../components/header.php' ?>
    <div class="container">
        <h1 class="text-center">Usuarios</h1>
       <div class="card">
       <a href="../view/add_user.php" class="btn btn-success">Agregar Usuario</a>
        <div class="card-body">
            
        <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <th>id</th>
            <th>Nombre</th>
            <th>Contraseña</th>
            <th>Rol</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php foreach ($datos as $item){ ?>
            <tr>
                <td><?php echo $item['id'] ;?></td>
                <td><?php echo $item['usuario'] ;?></td>
                <td><?php echo $item['clave'] ;?></td>
                <td><?php $rol= $item['rol'] == 1 ? 'Administrador' : 'Usuario'; echo $rol ;?></td>
                <td> <!--<a href="../view/edit_product.php?id=<?php echo $item['id'] ;?>" class="btn btn-warning">Editar</a> | -->  <a href="../functions/del_user.php?id=<?php echo $item['id'] ;?>" class="btn btn-danger">Eliminar</a></td>
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