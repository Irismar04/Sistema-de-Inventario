<!--Alertas-->
<?php if (isset($_GET['error'])): ?>
<?php if ($_GET['error'] == 'nombre'): ?>
<?= generarAlertaError('¡Ya hay un usuario con ese nombre de usuario!') ?>
<?php endif; ?>
<?php if ($_GET['error'] == 'cedula'): ?>
<?= generarAlertaError('¡Ya hay un usuario con ese numero de cédula!') ?>
<?php endif; ?>
<?php endif; ?>

<main>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html"></a></li>
        </ol>
        <div class="col-sm-5 col-md-10 col-lg-10 col-xl-10 py-10 bg-white">
            <div class="mb-3">
                <a href="<?= url('usuarios') ?>" class="btn btn-info absolute"><i class="fas fa-arrow-left"></i>&nbsp;Volver</a>
                <h2 class="text-center font-weight-light my-4">Cambiar contraseña</h2>
                <form id="form" autocomplete="off" method="post" action="<?= url('usuarios/cambiar-contrasena') ?>">

                    <div class="col mb-3">

                        <!-- Usuario -->
                        <div class="col mb-3">
                            <label for="name" class="form-label">Usuario</label>
                            <input type="name" id="name" name="name" class="form-control"
                               readonly disabled value="<?= $usuario['nom_usuario'] ?>">
                        </div>

                        <!-- Cedula -->
                        <div class="col mb-3">
                            <label for="cedula" class="form-label">Cédula</label>
                            <input type="cedula" id="cedula" name="cedula" class="form-control"
                               readonly disabled value="<?= $usuario['cedula'] ?>">
                        </div>

                        <!-- Contraseña -->
                        <div class="col mb-3">
                            <label for="password" class="form-label">Nueva Contraseña</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Contraseña">
                        </div>

                        <!-- Confirmar contraseña -->
                        <div class="col">
                            <label for="confirm-password" class="form-label">Confirmar nueva contraseña</label>
                            <input type="password" id="confirm-password" name="confirm-password" class="form-control"
                                placeholder="Confirmar contraseña">
                        </div>
                    </div>

                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">

                    <button class="btn btn-success" type="submit">Guardar</button>
                    <input class="btn btn-danger" type="reset" value="Limpiar">
                </form>
            </div>
        </div>
    </div>
</main>

<script src="<?= assetsDir('/js/validaciones/cambiar-contrasena.js') ?>"></script>