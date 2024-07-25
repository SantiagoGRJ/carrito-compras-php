<?php
require_once '../db.php';
session_start();

if(isset($_SESSION['carrito'])){
    
    if(isset($_GET['id'])){
        $arreglo=$_SESSION['carrito'];
        $encontro=false;
        $numero=0;
        for($i=0; $i<count($arreglo); $i++){
            if($arreglo[$i]['Id']==$_GET['id']){
                $encontro=true;
                $numero=$i;
            }
        }
        if($encontro==true){
            $arreglo[$numero]['Cantidad']+=1;
            $_SESSION['carrito']=$arreglo;
        }else{
            $sql=$conexion->prepare("SELECT * FROM productos WHERE id=:id");
            $sql->bindParam(':id',$_GET['id'],PDO::PARAM_INT);
            $sql->execute();
            $datos=$sql->fetch(PDO::FETCH_NUM);
            $nombre=$datos[1];
            $precio=$datos[2];
            $arregloNuevo = array(
                'Id'=>$_GET['id'],
                'Nombre' => $nombre,
                'Precio' => $precio,
                'Cantidad' => 1
            );
            array_push($arreglo,$arregloNuevo);
            $_SESSION['carrito']=$arreglo;
        }

    }
    
}else{
   if(isset($_GET['id'])){
    $id=$_GET['id'] ;
    $sql=$conexion->prepare("SELECT * FROM productos WHERE id=:id");
    $sql->bindParam(':id',$id,PDO::PARAM_INT);
    $sql->execute();
    $datos=$sql->fetch(PDO::FETCH_NUM);
    $nombre=$datos[1];
    $precio=$datos[2];
    $arreglo[] = array(
        'Id'=>$id,
        'Nombre' => $nombre,
        'Precio' => $precio,
        'Cantidad' => 1
    );
    $_SESSION['carrito']=$arreglo;
   }else{
    header('Location:index.php');
   }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
</head>
<body>
    <?php require_once '../components/header.php' ?>
    <div class="container">
        <h1 class="text-center">Carrito</h1>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Eliminar</th>
            </thead>
            <tbody>
               <?php if($_SESSION['carrito']) {
                $carritoarreglo=$_SESSION['carrito'];
                $total=0;
                foreach ($carritoarreglo AS $index => $valor){
                    $total+=$valor['Precio'] * $valor['Cantidad'];
                ?>
                 <tr>
                    <td><?php echo $valor['Nombre']; ?></td>
                    <td><?php echo $valor['Precio']; ?></td>
                    <td><input data-id="<?php echo$valor['Id']; ?> " data-precio="<?php echo$valor['Precio']; ?> " type="text" value="<?php echo$valor['Cantidad']; ?> " class="form-control txtcantidad" style="width: 100px;" ></td>
                    <td class="cant<?php echo$valor['Id']; ?> "><?php echo '$'.$valor['Precio'] * $valor['Cantidad']; ?></td>
                    <td><a href="" class="btn btn-danger btne" data-id="<?php echo $valor['Id']; ?>">Eliminar</a></td>
                </tr>
               <?php }} ?>
            </tbody>
            <tfoot>
                <tr>
                <td><strong>Total: </strong></td>
                <td></td>
                <td></td>
                <td><strong><?php echo  '$'.number_format($total,2); ?></strong></td>
                <td><button onclick="window.location='../functions/pay.php'" class="btn btn-success btn-buy">Pagar</button></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <script src="../js/jquery-3.7.0.js"></script>
    <script>
        $(document).ready(function(){
            $(".btne").click(function(){
                var id = $(this).data('id');
                var boton =$(this);

                $.ajax({
                   method:'POST',
                   url:'../functions/del_carrito.php',
                   data:{
                    id:id
                   } 
                }).done(function(e){
                    boton.parent('td').parent('tr').remove();
                    location.reload();
                });
            });
            
            $(".txtcantidad").change(function(){
                var cantidad =$(this).val();
                var precio =$(this).data('precio');
                var id =$(this).data('id');
                var op =parseFloat(cantidad) * parseFloat(precio);
                $(".cant"+id).text('$'+op);
                
                $.ajax({
                 method:'POST',
                 url:'../functions/add_carrito.php',
                 data:{
                    id:id,
                    cantidad:cantidad,
                 }
                }).done(function(e){
                    location.reload();
                })
                
                
            });

            $(".btn-buy").click(function(){
                
            })
        });
    </script>
</body>
</html>