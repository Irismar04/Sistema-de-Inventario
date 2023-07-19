<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $titulo ?></title>
    <link href="/sistema-de-inventario/assets/css/style.min.css" rel="stylesheet" />
    <link href="/sistema-de-inventario/assets/css/styles.css" rel="stylesheet" />
    <script src="/sistema-de-inventario/assets/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navbar -->
    <?php include dirname(__DIR__) .'/partials/nav.view.php' ?>
    <div id="layoutSidenav">
        <!-- Sidebar -->
        <?php include dirname(__DIR__) . '/partials/sidebar.view.php' ?>
        <div id="layoutSidenav_content">
            {{content}}
            <!-- Footer -->
            <?php include dirname(__DIR__) . '/partials/footer.view.php' ?>
        </div>
    </div>
    <script src="/sistema-de-inventario/assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/sistema-de-inventario/assets/js/scripts.js"></script>
    <script src="/sistema-de-inventario/assets/js/chart.min.js" crossorigin="anonymous"></script>
    <script src="/sistema-de-inventario/assets/demo/chart-area-demo.js"></script>
    <script src="/sistema-de-inventario/assets/demo/chart-bar-demo.js"></script>
    <script src="/sistema-de-inventario/assets/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="/sistema-de-inventario/assets/js/datatables-simple-demo.js"></script>
</body>

</html>