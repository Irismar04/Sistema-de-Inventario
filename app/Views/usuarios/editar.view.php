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
                <h2 class="text-center font-weight-light my-4">Editar Usuario</h2>
                <form id="form" method="post" action="<?= url('usuarios/actualizar') ?>">


                    <!-- Nombre de usuario -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Nombre de usuario</label>
                        <input type="text" class="form-control" name="username" id="username"
                            placeholder="Nombre de usuario" value="<?= $usuario['nom_usuario'] ?>" autofocus />
                    </div>

                    <!-- Roles-->
                    <div class="mb-3">
                        <label for="roles" class="form-label">Rol</label>
                        <select name="roles" id="roles" class="form-select">
                            <?php foreach ($roles as $rol):?>
                            <option value="<?= $rol['id_rol'] ?>" <?= selected($rol['id_rol'], $usuario['id_rol']) ?>><?= $rol['nom_rol']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row mb-3">
                        <!-- Nombre -->
                        <div class="col">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" value="<?= $usuario['nom_per'] ?>">
                        </div>
                        <!-- Apellido -->
                        <div class="col">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido" value="<?= $usuario['apellido_per'] ?>">
                        </div>
                    </div>

                    <!-- Cedula -->
                    <div class="mb-3">
                        <label for="cedula" class="form-label">Cédula</label>
                        <input class="form-control" type="text" id="cedula" name="cedula"
                            placeholder="Cédula de identidad" value="<?= $usuario['cedula'] ?>">
                    </div>

                    <!-- Genero -->
                    <div class="mb-3">
                        <label for="generos" class="form-label">Genero</label>
                        <select name="generos" id="generos" class="form-select">
                            <option value="<?= App\Constants\Genero::FEMALE ?>" <?= selected(App\Constants\Genero::FEMALE, $usuario['genero']) ?>>
                                <?= App\Constants\Genero::match(App\Constants\Genero::FEMALE) ?></option>
                            <option value="<?= App\Constants\Genero::MALE ?>" <?= selected(App\Constants\Genero::MALE, $usuario['genero']) ?>>
                                <?= App\Constants\Genero::match(App\Constants\Genero::MALE) ?></option>
                        </select>
                    </div>

                    <!-- Dirección -->
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input class="form-control" type="text" id="direccion" name="direccion"
                            placeholder="Dirección de la persona" value="<?= $usuario['direccion'] ?>">
                    </div>

                    <div class="row mb-3">
                        <!-- Telefono -->
                        <div class="col">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" id="telefono" name="telefono" class="form-control"
                                placeholder="Número telefónico" value="<?= $usuario['telefono'] ?>">
                        </div>

                        <!-- Correo -->
                        <div class="col">
                            <label for="correo" class="form-label">Correo electrónico</label>
                            <input type="text" id="correo" name="correo" class="form-control"
                                placeholder="Correo electrónico" value="<?= $usuario['correo'] ?>">
                        </div>
                    </div>
                    
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <button class="btn btn-success" type="submit">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="<?= assetsDir('/js/validaciones/editar-usuarios.js') ?>"></script>