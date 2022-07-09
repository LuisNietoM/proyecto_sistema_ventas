<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/styles.css">
    <title>Carrito</title>
</head>

<body>
    <?php include_once "./layout/navbar.php"; ?>


    <?php

    include_once "./config/db.php";

    # Almacenar pedido en la tabla temporal.
    if ($_GET["id"]) {

        $id = $_GET["id"];
        $insert = "INSERT INTO `temp` (`id_producto`, `cantidad`) VALUES ($id, 1)";
        try {
            $base_de_datos->query($insert);
        } catch (Exception $e) {
            header('location:./carrito.php');
        }

        header('location:./carrito.php');
    }
    ?>

    <div class="container">
        <table class="table text-center m-3">
            <thead class="table-primary ">
                <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Precio Unidad</th>
                    <th>Precio Total</th>
                    <th>Cantidad</th>
                    <th>Imagen</th>
                    <th colspan="2">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT id_producto, cantidad, codigo, descripcion, existencia, precioVenta, imagen FROM temp INNER JOIN productos ON productos.id = temp.id_producto;";

                $result = $base_de_datos->query($sql,  PDO::FETCH_ASSOC)->fetchAll();
                foreach ($result as $fila) {
                    echo "<tr>";
                    echo "<th>${fila['codigo']}</th>";
                    echo   "<td>${fila['descripcion']}</td>";
                    echo   "<td>$ ${fila['precioVenta']}</td>";
                    echo   "<td> $" . number_format($fila['precioVenta'] * $fila['cantidad'], 2) . "</td>";
                    echo   "<td>${fila['cantidad']}</td>";
                    echo   "<td><img src='./assets/productos/${fila['imagen']}' width=70></td>";
                    echo   "<td>
                                <form method='get' action='./agregar.php'>
                                    <input type='hidden' name='id' value=${fila['id_producto']}>
                                    <input type='hidden' name='cantidad' value=${fila['cantidad']}>
                                    <button type='submit' class='btn btn-info'><i class='bi bi-plus-circle'></i> Agregar</button>
                                </form>
                            </td>";
                    echo   "<td>
                            <form method='get' action='./quitar.php'>
                                <input type='hidden' name='id' value=${fila['id_producto']}>
                                <input type='hidden' name='cantidad' value=${fila['cantidad']}>
                                <button type='submit' class='btn btn-warning'><i class='bi bi-dash-circle'></i> Quitar</button>
                            </form>
                        </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="text-center">
            <a href="./index.php" class="btn btn-success"><i class="bi bi-credit-card"></i> Realizar la Compra</a>
            <a href="./eliminar.php" class="btn btn-danger"><i class="bi bi-trash"></i> Cancelar la Compra</a>
        </div>
    </div>

    <script>
        let carrito = document.getElementById('carrito')
        carrito.classList.add('active')
    </script>

</body>

</html>