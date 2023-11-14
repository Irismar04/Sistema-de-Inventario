<!--Alertas-->
<?php if (isset($_GET['error'])): ?>
<?php if ($_GET['error'] == 'nombre'): ?>
<?= generarAlertaError('¡Ya hay una marca con ese nombre!') ?>
<?php endif; ?>
<?php endif; ?>

<main>
    <div class="container-fluid px-4">
        <div class="col-sm-5 col-md-10 col-lg-10 col-xl-10 py-10 bg-white">
            <a href="<?= url('marcas') ?>" class="btn btn-info absolute"><i class="fas fa-arrow-left"></i>&nbsp;Volver</a>
            <h2 class="text-center font-weight-light my-4">Editar Marca</h2>
            <form id="form" autocomplete="off" method="post" action="<?= url('marcas/actualizar') ?>"  onsubmit="return confirm('¿Esta seguro que desea editar esta marca?')">
                <!-- Nombre de la marca -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre de la marca</label>
                    <input type="text" class="form-control" value="<?= $marca['nom_marca'] ?>" name="nombre" id="nombre"
                        placeholder="Nombre de la marca" autofocus />
                    <p class="mt-2"><i></i></p>
                </div>
                <!-- ID de la marca a editar -->
                <input type="hidden" name="id" value="<?= $marca['id_marca'] ?>">
                <!-- Botones -->
                <button class="btn btn-success" type="submit">Editar</button>
            </form>
        </div>
    </div>
</main>

<script src="<?= assets('/js/validaciones/marcas-y-categorias.js') ?>"></script>