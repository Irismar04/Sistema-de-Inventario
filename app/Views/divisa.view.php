<?php if (isset($_GET['success'])): ?>
<?php if ($_GET['success'] == 'crear'): ?>
<?= generarAlertaExito('¡Se ha actualizado el precio de la divisa correctamente!') ?>
<?php endif; ?>
<?php endif; ?>


<!--Alertas-->
<?php if (isset($_GET['error'])): ?>
<?php if ($_GET['error'] == 'crear'): ?>
<?= generarAlertaError('¡Ha ocurrido un error cambiando el precio!') ?>
<?php endif; ?>
<?php endif; ?>

<main>
    <div class="container-fluid px-4">
        <div class="col-sm-5 col-md-10 col-lg-10 col-xl-10 py-10 bg-white">
            <h2 class="text-center font-weight-light my-4">Actualizar Divisa</h2>
            <form id="form" method="post" action="<?= url('divisa') ?>">

                <?php if ($divisa != false): ?>
                <!-- Precio de la divisa -->
                <div class="mb-3">
                    <label for="precio-actual" class="form-label">Precio actual</label>
                    <input class="form-control" name="precio-actual" value="<?= $divisa['cantidad'] ?>" id="precio-actual" placeholder="" readonly
                        type="number" step="0.01" />
                </div>
                <input type="hidden" name="id" value="<?= $divisa['id_divisa'] ?>">
                <?php endif; ?>

                <!-- Precio de la divisa -->
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio de la divisa</label>
                    <input class="form-control" name="precio" id="precio" placeholder="e.j: 30000" autofocus
                    type="number" step="0.01" />
                </div>

                <!-- Botones -->
                <button class="btn btn-success" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Limpiar</button>
            </form>
        </div>
    </div>
</main>

<script src="<?= assetsDir('/js/validaciones/divisa.js') ?>"></script>