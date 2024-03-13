<?php
require_once '../db.php';

$nombre=isset($_POST['nombre']) ? $_POST['nombre'] : '';
$precio=isset($_POST['precio']) ? $_POST['precio'] : 0;
$cantidad=isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;

try {
    $sql=$conexion->prepare("INSERT INTO productos (nombre,precio,cantidad) VALUES (:nombre,:precio,:cantidad)");
    $sql->bindParam(':nombre',$nombre);
    $sql->bindParam(':precio',$precio);
    $sql->bindParam(':cantidad',$cantidad);
    $sql->execute();
    echo "<script>alert('Proceso Exitoso');window.location='../admin/producto.php'</script>";
} catch (PDOException $error) {
    echo 'Error: '.$error->getMessage();
}