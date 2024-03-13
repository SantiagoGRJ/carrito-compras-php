<?php
require_once '../db.php';
$id = isset($_GET['id']) ? $_GET['id'] : 0;

try {
    $sql = $conexion->prepare("DELETE FROM usuarios WHERE id=:id");
    $sql->bindParam(':id', $id,PDO::PARAM_INT);
    $sql->execute();
    echo "<script>alert('Proceso Exitoso');window.location='../admin/index.php'</script>";
} catch (PDOException $error) {
    echo 'Error: ' . $error->getMessage();
}