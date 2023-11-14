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
        <div class="col-sm-5 col-md-10 col-lg-10 col-xl-10 py-10 bg-white">
            <div class="mb-3">
                <a href="<?= url('usuarios') ?>" class="btn btn-info absolute"><i class="fas fa-arrow-left"></i>&nbsp;Volver</a>
                <h2 class="text-center font-weight-light my-4">Añadir Usuario</h2>
                <form id="form" autocomplete="off" method="post" action="<?= url('usuarios') ?>">


                    <!-- Nombre de usuario -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Nombre de usuario</label>
                        <input type="text" class="form-control" name="username" id="username"
                            placeholder="Nombre de usuario" autofocus />
                    </div>

                    <div class="row mb-3">
                        <!-- Contraseña -->
                        <div class="col">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Contraseña">
                        </div>

                        <!-- Confirmar contraseña -->
                        <div class="col">
                            <label for="confirm-password" class="form-label">Confirmar contraseña</label>
                            <input type="password" id="confirm-password" name="confirm-password" class="form-control"
                                placeholder="Confirmar contraseña">
                        </div>
                    </div>

                    <!-- Roles-->
                    <div class="mb-3">
                        <label for="roles" class="form-label">Rol</label>
                        <select name="roles" id="roles" class="form-select">
                            <option value="" hidden selected>Seleccione un rol de usuario</option>
                            <?php foreach ($roles as $rol):?>
                            <option value="<?= $rol['id_rol'] ?>"><?= $rol['nom_rol']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row mb-3">
                        <!-- Nombre -->
                        <div class="col">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre">
                        </div>
                        <!-- Apellido -->
                        <div class="col">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido">
                        </div>
                    </div>

                    <!-- Cedula -->
                    <div class="mb-3">
                        <label for="cedula" class="form-label">Cédula</label>
                        <input class="form-control" type="text" id="cedula" name="cedula"
                            placeholder="Cédula de identidad">
                    </div>

                    <!-- Genero -->
                    <div class="mb-3">
                        <label for="generos" class="form-label">Genero</label>
                        <select name="generos" id="generos" class="form-select">
                            <option value="" hidden selected>Seleccione un genero</option>
                            <option value="<?= App\Constants\Genero::FEMALE ?>">
                                <?= App\Constants\Genero::match(App\Constants\Genero::FEMALE) ?></option>
                            <option value="<?= App\Constants\Genero::MALE ?>">
                                <?= App\Constants\Genero::match(App\Constants\Genero::MALE) ?></option>
                        </select>
                    </div>

                    <!-- Dirección -->
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input class="form-control" type="text" id="direccion" name="direccion"
                            placeholder="Dirección de la persona">
                    </div>

                    <div class="row mb-3">
                        <!-- Telefono -->
                        <div class="col">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" id="telefono" name="telefono" class="form-control"
                                placeholder="Número telefónico">
                        </div>

                        <!-- Correo -->
                        <div class="col">
                            <label for="correo" class="form-label">Correo electrónico</label>
                            <input type="text" id="correo" name="correo" class="form-control"
                                placeholder="Correo electrónico">
                        </div>
                    </div>

                    <button class="btn btn-success" type="submit">Guardar</button>
                    <input class="btn btn-danger" type="reset" value="Limpiar">
                </form>
            </div>
        </div>
    </div>
</main>

<script src="<?= assets('/js/validaciones/usuarios.js') ?>"></script>