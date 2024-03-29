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
            <h2 class="text-center font-weight-light my-4">Añadir Marcas</h2>
            <form id="form" autocomplete="off" method="post" action="<?= url('marcas') ?>">
                
                <!-- Nombre de marca -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la marca"
                        required="required" autofocus pattern="[a-zA-Z]+" />
                   <!-- <p class="mt-2"><i>*Solo guarda letras</i></p>-->
                </div>

                <!-- Botones -->
                <button class="btn btn-success" type="submit">Guardar</button>
                <input class="btn btn-danger" type="reset" value="Limpiar"></a>
            </form>
        </div>
    </div>
</main>

<script src="<?= assets('/js/validaciones/marcas-y-categorias.js') ?>"></script>