<!--Alertas-->
<?php if (isset($_GET['error'])): ?>
<?php if ($_GET['error'] == 'contrasena'): ?>
<?= generarAlertaError('¡La contraseña actual que introdujo es incorrecta!') ?>
<?php endif; ?>
<?php endif; ?>

<main>
    <div class="container-fluid px-4">
        <div class="col-sm-5 col-md-10 col-lg-10 col-xl-10 py-10 bg-white">
            <div class="mb-3">
                <h2 class="text-center font-weight-light my-4">Cambiar contraseña</h2>
                <form id="form" method="post" action="<?= url('perfil/cambiar-contrasena') ?>">

                    <div class="col mb-3">

                        <!-- Usuario -->
                        <div class="col mb-3">
                            <label for="name" class="form-label">Usuario</label>
                            <input type="name" id="name" name="name" class="form-control"
                               readonly disabled value="<?= $usuario['nom_usuario'] ?>">
                               <input type="hidden" name="username" value="<?= $usuario['nom_usuario'] ?>">
                        </div>

                        <!-- Cedula -->
                        <div class="col mb-3">
                            <label for="cedula" class="form-label">Cédula</label>
                            <input type="cedula" id="cedula" name="cedula" class="form-control"
                               readonly disabled value="<?= $usuario['cedula'] ?>">
                        </div>

                        <!-- Contraseña -->
                        <div class="col mb-3">
                            <label for="old-password" class="form-label">Contraseña actual</label>
                            <input type="password" id="old-password" name="old-password" class="form-control"
                                placeholder="Ingrese su contraseña actual">
                        </div>

                        <!-- Contraseña -->
                        <div class="col mb-3">
                            <label for="password" class="form-label">Nueva Contraseña</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Ingrese su nueva contraseña">
                        </div>

                        <!-- Confirmar contraseña -->
                        <div class="col">
                            <label for="confirm-password" class="form-label">Confirmar nueva contraseña</label>
                            <input type="password" id="confirm-password" name="confirm-password" class="form-control"
                                placeholder="Confirme su nueva contraseña">
                        </div>
                    </div>

                    <input type="hidden" name="id" value="<?= $usuario['id_usuario'] ?>">

                    <button class="btn btn-success" type="submit">Guardar</button>
                    <input class="btn btn-danger" type="reset" value="Limpiar">
                </form>
            </div>
        </div>
    </div>
</main>

<script src="<?= assetsDir('/js/validaciones/cambiar-contrasena.js') ?>"></script>