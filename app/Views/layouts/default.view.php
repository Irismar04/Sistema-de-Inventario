<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $titulo ?></title>

    <!-- Estilos -->
    <link href="<?= assetsDir('/css/styles.min.css') ?>" rel="stylesheet" />
    <link href="<?= assetsDir('/css/styles.css') ?>" rel="stylesheet" />
    <link href="<?= assetsDir('/css/custom.css') ?>" rel="stylesheet" />
    <link href="<?= assetsDir('/css/datatables.min.css') ?>" rel="stylesheet" />
    <link href="<?= assetsDir('/css/datetimepicker.css') ?>" rel="stylesheet" />

    <!-- Scripts -->
    <script src="<?= assetsDir('/js/jquery.js') ?>"></script>
    <script src="<?= assetsDir('/js/all.js') ?>" crossorigin="anonymous"></script>
    <script src="<?= assetsDir('/js/modales.js') ?>"></script>
    <script src="<?= assetsDir('/js/datatables.min.js') ?>"></script>
    <script src="<?= assetsDir('/js/validaciones.js') ?>"></script>
    <script src="<?= assetsDir('/js/jspdf.umd.min.js') ?>"></script>
    <script src="<?= assetsDir('/js/jspdf.plugin.autotable.js') ?>"></script>
    <script src="<?= assetsDir('/js/datetimepicker.js') ?>"></script>
    <script defer src="<?= assetsDir('/js/alpine.min.js') ?>"></script>
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

    
    <script src="<?= assetsDir('/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= assetsDir('/js/scripts.js') ?>"></script>
    <script src="<?= assetsDir('/js/alertas.js') ?>"></script>

</body>

</html>