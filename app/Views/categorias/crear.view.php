<!--Alertas-->
<?php if (isset($_GET['error'])): ?>
<?php if ($_GET['error'] == 'nombre'): ?>
<?= generarAlertaError('¡Ya hay una categoria con ese nombre!') ?>
<?php endif; ?>
<?php endif; ?>

<main>
    <div class="container-fluid px-4">
        <div class="col-sm-5 col-md-10 col-lg-10 col-xl-10 py-10 bg-white">
        <a href="<?= url('categorias') ?>" class="btn btn-info absolute"><i class="fas fa-arrow-left"></i>&nbsp;Volver</a>
            <h2 class="text-center font-weight-light my-4">Añadir Categoría</h2>
            <form autocomplete="off" id="form" method="post" action="<?= url('categorias') ?>">
                <!-- Nombre de la categoría -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input class="form-control" name="nombre" id="nombre" placeholder="Nombre de la categoría" autofocus
                        type="text" />
                 <!--   <p class="mt-2"><i>*Solo guarda letras</i></p>-->
                </div>

                <!-- Botones -->
                <button class="btn btn-success" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Limpiar</button>
            </form>
        </div>
    </div>
</main>

<script src="<?= assetsDir('/js/validaciones/marcas-y-categorias.js') ?>"></script>