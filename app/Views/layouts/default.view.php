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
    <link href="<?= assets('/css/styles.min.css') ?>" rel="stylesheet" />
    <link href="<?= assets('/css/styles.css') ?>" rel="stylesheet" />
    <link href="<?= assets('/css/custom.css') ?>" rel="stylesheet" />
    <link href="<?= assets('/css/datatables.min.css') ?>" rel="stylesheet" />
    <link href="<?= assets('/css/datetimepicker.css') ?>" rel="stylesheet" />

    <!-- Scripts -->
    <script src="<?= assets('/js/jquery.js') ?>"></script>
    <script src="<?= assets('/js/all.js') ?>" crossorigin="anonymous"></script>
    <script src="<?= assets('/js/modales.js') ?>"></script>
    <script src="<?= assets('/js/datatables.min.js') ?>"></script>
    <script src="<?= assets('/js/validaciones.js') ?>"></script>
    <script src="<?= assets('/js/jspdf.umd.min.js') ?>"></script>
    <script src="<?= assets('/js/jspdf.plugin.autotable.js') ?>"></script>
    <script src="<?= assets('/js/datetimepicker.js') ?>"></script>
    <script defer src="<?= assets('/js/alpine.min.js') ?>"></script>
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

    
    <script src="<?= assets('/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= assets('/js/scripts.js') ?>"></script>
    <script src="<?= assets('/js/alertas.js') ?>"></script>

</body>

</html>