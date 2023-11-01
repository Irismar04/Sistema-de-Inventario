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
                <h2 class="text-center font-weight-light my-4">Datos del usuario</h2>
                <!-- Nombre de usuario -->
                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de usuario</label>
                    <input type="text" class="form-control" name="username" id="username"
                        value="<?= $usuario['nom_usuario'] ?>" readonly disabled />
                </div>

                <!-- Roles-->
                <div class="mb-3">
                    <label for="rol" class="form-label">Rol</label>
                    <input type="text" class="form-control" name="rol" id="rol"
                        value="<?= $usuario['nom_rol']?>" readonly disabled />
                </div>

                <div class="row mb-3">
                    <!-- Nombre -->
                    <div class="col">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" readonly disabled
                            value="<?= $usuario['nom_per'] ?>">
                    </div>
                    <!-- Apellido -->
                    <div class="col">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" id="apellido" name="apellido" class="form-control" readonly disabled
                            value="<?= $usuario['apellido_per'] ?>">
                    </div>
                </div>

                <!-- Cedula -->
                <div class="mb-3">
                    <label for="cedula" class="form-label">Cédula</label>
                    <input class="form-control" type="text" id="cedula" name="cedula" readonly disabled
                        value="<?= $usuario['cedula'] ?>">
                </div>

                <!-- Genero -->
                <div class="mb-3">
                    <label for="genero" class="form-label">Genero</label>
                    <input type="text" class="form-control" name="genero" id="genero"
                        value="<?= App\Constants\Genero::match($usuario['genero'])?>" readonly disabled />
                </div>

                <!-- Dirección -->
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input class="form-control" type="text" id="direccion" name="direccion"
                    readonly disabled value="<?= $usuario['direccion'] ?>">
                </div>

                <div class="row mb-3">
                    <!-- Telefono -->
                    <div class="col">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" id="telefono" name="telefono" class="form-control"
                        readonly disabled value="<?= $usuario['telefono'] ?>">
                    </div>

                    <!-- Correo -->
                    <div class="col">
                        <label for="correo" class="form-label">Correo electrónico</label>
                        <input type="text" id="correo" name="correo" class="form-control"
                        readonly disabled value="<?= $usuario['correo'] ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>