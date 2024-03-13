<?php
require_once 'db.php';

$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

$sql=$conexion->prepare("SELECT * FROM usuarios WHERE usuario=:usuario and clave=:clave");
$sql->bindParam(':usuario',$usuario,PDO::PARAM_STR);
$sql->bindParam(':clave',$clave,PDO::PARAM_STR);
$sql->execute();
$row =$sql->fetch(PDO::FETCH_NUM);


if($row>0){
    if($row[3]==1){
        //administrador
        session_start();
        $_SESSION['rol']=1;
        $_SESSION['usuario']=$usuario;
        header('Location:admin/index.php');
        echo "eres administrador";
    }else if ($row[3]==2){
        //usuario
        session_start();
        $_SESSION['rol']=2;
        $_SESSION['usuario']=$usuario;
        header('Location:user/index.php');
        echo "eres usuario";
    }
}else{
    echo "<script>alert('Usuario o Contraseña Incorrecta');window.history.go(-1)</script>";
}

