<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/styles.css">
    <title>Inicio</title>
</head>

<body>
    <?php include_once "./layout/navbar.php" ?>

    <div class="container-fluid">
        <h2 class="mt-3 text-center text-primary">LISTADO DE PRODUCTOS</h2>
        <div style="display: flex;">
            <?php

            include_once "./config/db.php";

            $sql = "SELECT * FROM `productos`";
            $result = $base_de_datos->query($sql,  PDO::FETCH_ASSOC)->fetchAll();

            foreach ($result as $fila) {
                echo "<div class='card m-1' style='width: 18rem;'>";
                echo "<img src='./assets/productos/${fila['imagen']}' class='card-img-top' alt='${fila['imagen']}'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>${fila['descripcion']}</h5>";
                echo "<p class='card-text'>Código: ${fila['codigo']}</p>";
                echo "<p class='card-text'>Sólo hay " . intval($fila['existencia']) . " disponible(s).</p>";
                echo "<a href='./carrito.php?id=${fila['id']}' class='btn btn-primary'>$ ${fila['precioVenta']}</a>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
    <script>
        let inicio = document.getElementById('inicio')
        inicio.classList.add('active')
    </script>
</body>

</html>