<?php

# Agregar al carrito
$id = $_GET['id'];

try {
    include_once "../config/db.php";
    $sql = "INSERT INTO carrito (id_producto, cantidad) VALUES ($id, 1);";
    $base_de_datos->query($sql);
    header("location: ../carrito.php");
} catch (\Throwable $th) {
    header("location: ../carrito.php");
}

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
