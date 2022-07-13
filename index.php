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
        <h3 class="mt-3 text-center text-primary">LISTADO DE PRODUCTOS</h3>
        <div style="display: flex;">
            <?php include_once "./funciones/lista-productos.php" ?>
        </div>
    </div>
    <?php include_once "./layout/footer.php"; ?>
    <script>
        let inicio = document.getElementById('inicio')
        inicio.classList.add('active')
    </script>
</body>

</html>