<?php 
session_start();
$id=$_POST['id'];
$carrito=$_SESSION['carrito'];
$cantidad=$_POST['cantidad'];
for($i=0; $i<count($carrito); $i++){
    if($carrito[$i]['Id']==$id){
        $carrito[$i]['Cantidad']=$cantidad;
        $_SESSION['carrito']=$carrito;
        break;
    }
}
