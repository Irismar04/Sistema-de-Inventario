<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="<?= assets('/css/styles.css') ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?= assets('/css/custom.css') ?>">
    <script src="<?= assets('/js/all.js') ?>"></script>

    <script src="<?= assets('/js/validaciones.js') ?>"></script>
</head>

<body class="bg-primary">
    <main class="mb-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Inicio de sesión</h3>
                            <h4 class="text-center font-weight-light my-4">Sistema de Inventario</h4>
                            <div class="text-center mb-4">
                                <img src="<?= assets('/img/imagen1.png') ?>" height="190px"
                                    alt="Logo InternetCtrl">
                            </div>
                            <?php if (isset($_GET['status'])): ?>
                            <?php if ($_GET['status'] == 'error'): ?>
                            <div id="alerta" class="alert alert-danger" role="alert">
                                ¡El nombre de usuario o la contraseña son incorrectos!
                            </div>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <form id="form" method="post" action="<?= url('login') ?>" novalidate="novalidate">
                                <!-- Usuario -->
                                <div class="mb-3">
                                    <label class="small form-label" for="usuario">
                                        <i class="fas fa-user px-1"></i>Usuario
                                    </label>
                                    <input class="form__input form-control" id="usuario" name="usuario" type="text"
                                        placeholder="Ingrese Usuario" />
                                </div>

                                <!-- Contraseña -->
                                <div class="mb-3">
                                    <label class="small mb-1 form-label" for="clave">
                                        <i class="fas fa-key px-1"></i>Contraseña
                                    </label>
                                    <input id="clave" type="password" name="contrasena" class="form__input form-control"
                                        placeholder="Ingrese Contraseña" required="" />
                                </div>

                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <button id="submit-btn" type="submit" class="btn btn-primary">Iniciar Sesión</button>
                                    <input class="btn btn-primary" type="reset" value="Limpiar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include __DIR__ . '/partials/footer.view.php' ?>

    <script src="<?= assets('/js/validaciones/login.js') ?>"></script>
    <script src="<?= assets('/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= assets('/js/scripts.js') ?>"></script>
    <script src="<?= assets('/js/alertas.js') ?>"></script>
</body>
</html>