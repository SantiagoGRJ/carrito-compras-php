

<?php
session_start();

require_once '../db.php';

if (!isset($_SESSION['carrito'])) {
    header("Location:../user/index.php");
    exit();
}

$arreglo = $_SESSION['carrito'];

$total = 0;

for ($i = 0; $i < count($arreglo); $i++) {
    $total += ($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);
}

$fecha = date('Y-m-d H:i:s');

try {
    // Iniciar la transacción
    $conexion->beginTransaction();

    // Insertar en la tabla ventas
    $sql = $conexion->prepare("INSERT INTO ventas(id_usuario, total, fecha) VALUES (:id_usuario, :total, :fecha)");
    $sql->execute([
        ':id_usuario' => 2, // Cambia esto según sea necesario
        ':total' => $total,
        ':fecha' => $fecha
    ]);
    $id_venta = $conexion->lastInsertId();

    // Insertar en la tabla productos_venta
    $sqll = $conexion->prepare("INSERT INTO productos_venta (id_venta, id_producto, cantidad, precio, subtotal) VALUES (:id_venta, :id_producto, :cantidad, :precio, :subtotal)");
    $sqlUpdate = $conexion->prepare("UPDATE productos SET cantidad = cantidad - :mcantidad WHERE id = :id");
    for ($i = 0; $i < count($arreglo); $i++) {
        $sqll->execute([
            ':id_venta' => $id_venta,
            ':id_producto' => $arreglo[$i]['Id'],
            ':cantidad' => $arreglo[$i]['Cantidad'],
            ':precio' => $arreglo[$i]['Precio'],
            ':subtotal' => $arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio']
        ]);
        $sqlUpdate->execute([
            ':mcantidad' => $arreglo[$i]['Cantidad'],
            ':id' => $arreglo[$i]['Id']
        ]);
    }

    // Confirmar la transacción
    $conexion->commit();
    
    // Vaciar el carrito
    unset($_SESSION['carrito']);
    header("Location:../user/index.php");
} catch (PDOException $e) {
    // Si ocurre un error, deshacer la transacción
    $conexion->rollBack();
    echo "Error: " . $e->getMessage();
}
?>




