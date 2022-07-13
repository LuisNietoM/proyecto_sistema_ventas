<?php
include_once "./config/db.php";

$sql = "SELECT id_producto, cantidad, codigo, descripcion, existencia, precioVenta, imagen 
        FROM carrito INNER JOIN productos ON productos.id = carrito.id_producto;";

$precio_total = 0;

$result = $base_de_datos->query($sql,  PDO::FETCH_ASSOC)->fetchAll();
foreach ($result as $fila) {
    $precio_total = $precio_total + ($fila['precioVenta'] * $fila['cantidad']);
    echo "<tr>";
    echo "<th>${fila['codigo']}</th>";
    echo   "<td>${fila['descripcion']}</td>";
    echo   "<td>$ ${fila['precioVenta']}</td>";
    echo   "<td> $" . number_format($fila['precioVenta'] * $fila['cantidad'], 2) . "</td>";
    echo   "<td>${fila['cantidad']}</td>";
    echo   "<td><img src='./assets/productos/${fila['imagen']}' width=70></td>";
    echo   "<td>
                <form method='get' action='./funciones/aumentar-carrito.php'>
                    <input type='hidden' name='id' value=${fila['id_producto']}>
                    <input type='hidden' name='cantidad' value=${fila['cantidad']}>
                    <button type='submit' class='btn btn-info'><i class='bi bi-plus-circle'></i> Agregar</button>
                </form>
            </td>";
    echo   "<td>
                <form method='get' action='./funciones/disminuir-carrito.php'>
                    <input type='hidden' name='id' value=${fila['id_producto']}>
                    <input type='hidden' name='cantidad' value=${fila['cantidad']}>
                    <button type='submit' class='btn btn-warning'><i class='bi bi-dash-circle'></i> Quitar</button>
                </form>
            </td>";
    echo "</tr>";
}

echo "<tr>
        <td></td>
        <td></td>
        <td>Precio Total</td>
        <td> $" . number_format($precio_total, 2) . " </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
     </tr>";
