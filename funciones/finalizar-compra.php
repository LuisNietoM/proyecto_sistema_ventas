<?php

include_once "../config/db.php";



# 1. Crear la venta
$fecha = date('Y-m-d');
$total = $_GET['total'];
$sql = "INSERT INTO ventas (fecha, total) VALUES ('$fecha', $total);";
$base_de_datos->query($sql);



# 2. Obtener el id de la última venta.
$sql1 = "SELECT MAX(id) FROM ventas;";
$result = $base_de_datos->query($sql1, PDO::FETCH_ASSOC)->fetchAll();
foreach ($result as $value) {
    $id_venta = $value["MAX(id)"];
}



# 3. Registrar los productos vendidos con el id de la venta.
$sql2 = "SELECT * FROM carrito;";
$result1 = $base_de_datos->query($sql2, PDO::FETCH_ASSOC)->fetchAll();
foreach ($result1 as $value) {
    $id_producto = $value['id_producto'];
    $cantidad = $value['cantidad'];
    $sql3 = "INSERT INTO productos_vendidos (id_producto, cantidad, id_venta) VALUES (";
    $sql3 = $sql3 . "$id_producto, $cantidad, $id_venta";
    $sql3 = $sql3 . ");";
    $base_de_datos->query($sql3);
    $sql3 = null;
}



# 4. Limpiar carrito
header('location: ./eliminar-carrito.php');