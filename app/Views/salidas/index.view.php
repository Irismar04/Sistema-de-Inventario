<!-- Alertas de exito -->
<?php if(isset($_GET['success'])): ?>
<?php if($_GET['success'] == 'crear'): ?>
<?= generarAlertaExito('¡Se agregó una salida de productos satisfactoriamente!') ?>
<?php endif; ?>
<?php if($_GET['success'] == 'borrar'): ?>
<?= generarAlertaExito('¡Se revirtio una salida de inventario satisfactoriamente!') ?>
<?php endif; ?>
<?php endif; ?>

<!-- Alertas de error -->
<?php if(isset($_GET['error'])): ?>
<?php if($_GET['error'] == 'crear'): ?>
<?= generarAlertaError('¡Ha ocurrido un error al añadir stock al producto!') ?>
<?php endif; ?>
<?php if($_GET['error'] == 'borrar'): ?>
<?= generarAlertaError('¡Ha ocurrido un error al revertir una salida de inventario!') ?>
<?php endif; ?>
<?php endif; ?>


<main class="mx-4">
    <h2 class="text-center font-weight-light my-4">Lista de Salidas de productos</h2>
    <a class="btn btn-info" href="<?= url('salidas/reportes') ?>" style="float: right;">Generar PDF</a>
    <br>
    <br>
    <table id="tabla-de-reporte">
        <thead>
            <tr>
                <th rowspan="2">#</th>
                <th rowspan="2">Nombre del producto</th>
                <th rowspan="2">Cantidad</th>
                <th rowspan="2">Precio de salida (USD$)</th>
                <th rowspan="2">Precio de salida (Bs)</th>
                <th rowspan="2">Motivo de salida</th>
                <th rowspan="2">Fecha de salida</th>
                <th colspan="2">Acciones</th>
            </tr>
            <tr>
                <th>Revertir Salida</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salidas as $salida):?>
            <tr>
                <td><?= $salida['id_detalle_salida'] ?></td>
                <td><?= ucfirst($salida['nom_producto']); ?></td>
                <td><?= "{$salida['cantidad_salida']} unidades";?></td>
                <td><?= moneyUsd($salida['precio_salida']);?></td>
                <td><?= moneyBolivar($salida['precio_salida'] * ($salida['divisa_precio'] ?? 0));?></td>
                <td><?= App\Constants\Motivo::match($salida['motivo']);?></td>
                <td><?= formatoDeFecha($salida['fecha_salida']);?></td>
                <td>
                    <form action="<?= url('salidas/revertir') ?>" method="post"  onsubmit="return confirm('¿Estas seguro que deseas revertir esta salida de inventario?')">
                        <input type="hidden" name="id_producto" value="<?= $salida['id_producto'] ?>">
                        <input type="hidden" name="id_salida" value="<?= $salida['id_salida'] ?>">
                        <input type="hidden" name="id_detalle_salida" value="<?= $salida['id_detalle_salida'] ?>">
                        <input type="hidden" name="stock_actual" value="<?= $salida['stock'] ?>">
                        <input type="hidden" name="cantidad_salida" value="<?= $salida['cantidad_salida'] ?>">
                        <button type="submit" class="btn btn-danger">Revertir</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<script>
    $(document).ready(function () {
        $('#tabla-de-reporte').DataTable({
            language: {
                url: '<?= assets('/js/es-ES.json') ?>'
            },
            order: [[0,'desc']]
        });
    });
</script>