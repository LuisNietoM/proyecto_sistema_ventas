<?php
include_once "../config/db.php";

# Actualiar las existencias

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT existencia FROM productos WHERE id=$id;";
    $result = $base_de_datos->query($sql, PDO::FETCH_ASSOC)->fetchAll();
    foreach ($result as $value) {
        $existencia = $value['existencia'];
    }
    $existencia = $existencia - 1;
    $sql = "UPDATE `productos` SET `existencia` = $existencia WHERE `productos`.`id` = $id;";
    $base_de_datos->query($sql);
}


# Actualizar Carrito
if ($_GET['id']) {
    $id = $_GET['id'];
    $cantidad = $_GET['cantidad'] + 1;
    $sql = "UPDATE `carrito` SET `cantidad` = $cantidad WHERE `carrito`.`id_producto` = $id;";
    $base_de_datos->query($sql);
    header("location: ../carrito.php");
} else {
    header("location: ../carrito.php");
}
