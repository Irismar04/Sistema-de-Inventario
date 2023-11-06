<!-- Alertas de exito -->
<?php if(isset($_GET['success'])): ?>
<?php if($_GET['success'] == 'crear'): ?>
<?= generarAlertaExito('¡Se agregó un producto satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'editar'): ?>
<?= generarAlertaExito('¡Se editó un producto satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'borrar'): ?>
<?= generarAlertaExito('¡Se eliminó un producto satisfactoriamente!') ?>
<?php endif; ?>
<?php endif; ?>

<!-- Alertas de error -->
<?php if(isset($_GET['error'])): ?>
<?php if($_GET['error'] == 'crear'): ?>
<?= generarAlertaError('¡Ha ocurrido un error al crear el producto!') ?>
<?php elseif($_GET['error'] == 'editar'): ?>
<?= generarAlertaError('¡Ha ocurrido un error al editar el producto!') ?>
<?php elseif($_GET['error'] == 'borrar'): ?>
<?= generarAlertaError('¡Ha ocurrido un error borrando el producto!') ?>
<?php endif; ?>
<?php endif; ?>


<main class="mx-4">
    <h2 class="text-center font-weight-light my-4">Lista de entradas de productos</h2>
    <a class="btn btn-info" href="<?= url('entradas/reportes') ?>" style="float: right;">Generar PDF</a>
    <br>
    <br>
    <table id="tabla-de-reporte">
        <thead>
            <tr>
                <th>Nombre del producto</th>
                <th>Cantidad</th>
                <th>Precio de entrada (USD$)</th>
                <th>Precio de entrada (Bs)</th>
                <th>Fecha de entrada</th>
                <th>Fecha de vencimiento</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entradas as $entrada):?>
            <tr>
                <td><?= ucfirst($entrada['nom_producto']); ?></td>
                <td><?= unidades($entrada['cantidad_entrada']);?></td>
                <td><?= moneyUsd($entrada['precio_entrada']);?></td>
                <td><?= moneyBolivar($entrada['precio_entrada'] * ($entrada['divisa_precio'] ?? 0));?></td>
                <td><?= formatoDeFecha($entrada['fecha_entrada']);?></td>
                <td><?= formatoDeFecha($entrada['fecha_vencimiento']);?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<script>
    $(document).ready(function () {
        $('#tabla-de-reporte').DataTable({
            language: {
                url: '<?= assetsDir('/js/es-ES.json') ?>'
            }
        });
    });
</script>