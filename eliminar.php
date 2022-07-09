<?php
# Cancelar el pedido - Eliminar

include_once "./config/db.php";
$sql = "DELETE FROM `temp`";
$base_de_datos->query($sql);
header("location:./index.php");
