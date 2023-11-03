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
            <h2 class="text-center font-weight-light my-4">Editar Categoría</h2>
            <form autocomplete="off" id="form" method="post" action="<?= url('categorias/actualizar') ?>">
                <!-- Nombre de la categoria -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre de la categoría</label>
                    <input type="text" class="form-control" value="<?= $categoria['nom_categoria'] ?>" name="nombre"
                        id="nombre" placeholder="Nombre de la categoría" autofocus />
                    <p class="mt-2"><i></i></p>
                </div>

                <!-- ID de la categoria a editar -->
                <input type="hidden" name="id" value="<?= $categoria['id_categoria'] ?>">

                <!-- Botones -->
                <button class="btn btn-success" type="submit">Editar</button>
            </form>
        </div>
    </div>
</main>

<script src="<?= assetsDir('/js/validaciones/marcas-y-categorias.js') ?>"></script>