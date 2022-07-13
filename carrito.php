<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/styles.css">
    <title>Carrito</title>
</head>

<body>
    <?php include_once "./layout/navbar.php"; ?>
    <div class="container" style="min-height: calc(100vh-70px);">
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
                <?php include_once "./funciones/lista-carrito.php" ?>
            </tbody>
        </table>
        <div class="text-center" style="margin-bottom: 200px;">
            <a href="./funciones/finalizar-compra.php?total=<?php echo $precio_total; ?>" class="btn btn-success"><i class="bi bi-credit-card"></i> Finalizar la Compra</a>
        </div>
    </div>
    <?php include_once "./layout/footer.php"; ?>

    <script>
        let carrito = document.getElementById('carrito')
        carrito.classList.add('active')
    </script>


</body>

</html>