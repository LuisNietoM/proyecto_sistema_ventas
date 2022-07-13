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
