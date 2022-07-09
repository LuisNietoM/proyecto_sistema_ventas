<?php
# Quitar unidades al carrito - Editar

include_once "./config/db.php";

if ($_GET['id']) {
    $id = $_GET['id'];
    $cantidad = $_GET['cantidad'] - 1;
    $sql = "UPDATE `temp` SET `cantidad` = $cantidad WHERE `temp`.`id_producto` = $id;";
    $base_de_datos->query($sql);
    header("location:./carrito.php");
} else {
    header("location:./carrito.php");
}
