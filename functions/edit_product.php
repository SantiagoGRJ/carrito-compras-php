<?php 
require_once '../db.php';
$id=isset($_POST['id']) ? $_POST['id'] : 0;
$nombre=isset($_POST['nombre']) ? $_POST['nombre'] : '';
$precio=isset($_POST['precio']) ? $_POST['precio'] : 0;
$cantidad=$_POST['cantidad']+$_POST['c'];

try {
    $sql=$conexion->prepare("UPDATE productos SET nombre=:nombre, precio=:precio, cantidad=:cantidad WHERE id=:id");
    $sql->bindParam(':nombre',$nombre);
    $sql->bindParam(':precio',$precio);
    $sql->bindParam(':cantidad',$cantidad);
    $sql->bindParam(':id',$id);
    $sql->execute();
    echo "<script>alert('Proceso Exitoso');window.location='../admin/producto.php'</script>";
}catch(PDOException $error) {
    echo 'Error: '.$error->getMessage();
}
?>