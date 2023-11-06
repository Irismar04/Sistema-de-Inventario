<!-- Alertas de exito -->
<?php if(isset($_GET['success'])): ?>
<?php if($_GET['success'] == 'crear'): ?>
<?= generarAlertaExito('¡Se agregó una salida de productos satisfactoriamente!') ?>
<?php endif; ?>
<?php endif; ?>

<!-- Alertas de error -->
<?php if(isset($_GET['error'])): ?>
<?php if($_GET['error'] == 'crear'): ?>
<?= generarAlertaError('¡Ha ocurrido un error al añadir stock al producto!') ?>
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
                <th>Nombre del producto</th>
                <th>Cantidad</th>
                <th>Precio de salida (USD$)</th>
                <th>Precio de salida (Bs)</th>
                <th>Motivo de salida</th>
                <th>Fecha de salida</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salidas as $salida):?>
            <tr>
                <td><?= ucfirst($salida['nom_producto']); ?></td>
                <td><?= "{$salida['cantidad_salida']} unidades";?></td>
                <td><?= moneyUsd($salida['precio_salida']);?></td>
                <td><?= moneyBolivar($salida['precio_salida'] * ($salida['divisa_precio'] ?? 0));?></td>
                <td><?= App\Constants\Motivo::match($salida['motivo']);?></td>
                <td><?= formatoDeFecha($salida['fecha_salida']);?></td>
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