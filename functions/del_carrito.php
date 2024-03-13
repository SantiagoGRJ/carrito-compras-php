<?php
session_start();
$id=$_POST['id'];
$carrito=$_SESSION['carrito'];

for($i=0;$i<count($carrito);$i++){
    if($carrito[$i]['Id']!=$id){
        $carritoN[]= array(
            'Id'=>$carrito[$i]['Id'],
            'Nombre' => $carrito[$i]['Nombre'],
            'Precio' => $carrito[$i]['Precio'],
            'Cantidad' => $carrito[$i]['Cantidad']
        );
    }
}
if(isset($carritoN)){
    $_SESSION['carrito']=$carritoN;
}else{
    //unico producto a eliminar
    unset($_SESSION['carrito']);
}
