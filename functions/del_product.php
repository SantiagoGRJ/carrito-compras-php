<?php
require_once '../db.php';
$id = isset($_GET['id']) ? $_GET['id'] : 0;

try {
    $sql = $conexion->prepare("DELETE FROM productos WHERE id=:id");
    $sql->bindParam(':id', $id);
    $sql->execute();
    echo "<script>alert('Proceso Exitoso');window.location='../admin/producto.php'</script>";
} catch (PDOException $error) {
    echo 'Error: ' . $error->getMessage();
}
