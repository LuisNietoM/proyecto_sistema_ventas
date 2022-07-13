<?php

include_once "../config/db.php";
$sql = "DELETE FROM `carrito`";
$base_de_datos->query($sql);
header("location: ../index.php");
