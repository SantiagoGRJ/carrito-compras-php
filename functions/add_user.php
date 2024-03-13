<?php
require_once '../db.php';

$nombre=isset($_POST['nombre']) ? $_POST['nombre'] : '';
$clave=isset($_POST['clave']) ? $_POST['clave'] : 0;
$rol=$_POST['flexRadioDefault'] ;
if($rol=='Administrador'){
    $rol=1;
}elseif($rol=='Usuario'){
    $rol=2;
}
 try {
    $sql=$conexion->prepare("INSERT INTO usuarios (usuario,clave,rol) VALUES (:nombre,:clave,:rol)");
    $sql->bindParam(':nombre',$nombre);
    $sql->bindParam(':clave',$clave);
    $sql->bindParam(':rol',$rol);
    $sql->execute();
    echo "<script>alert('Proceso Exitoso');window.location='../admin/index.php'</script>";
} catch (PDOException $error) {
    echo 'Error: '.$error->getMessage();
} 