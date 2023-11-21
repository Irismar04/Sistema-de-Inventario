<!-- Alertas de exito -->
<?php if(isset($_GET['success'])): ?>
<?php if($_GET['success'] == 'crear'): ?>
<?= generarAlertaExito('¡Se agregó stock a un producto satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'borrar'): ?>
<?= generarAlertaExito('¡Se revirtio una entrada de inventario satisfactoriamente!') ?>
<?php endif; ?>
<?php endif; ?>

<!-- Alertas de error -->
<?php if(isset($_GET['error'])): ?>
<?php if($_GET['error'] == 'crear'): ?>
<?= generarAlertaError('¡Ha ocurrido un error al crear el producto!') ?>
<?php elseif($_GET['error'] == 'editar'): ?>
<?= generarAlertaError('¡Ha ocurrido un error al editar el producto!') ?>
<?php elseif($_GET['error'] == 'borrar'): ?>
<?= generarAlertaError('¡Ha ocurrido al revertir la entrada de inventario de un producto!') ?>
<?php elseif($_GET['error'] == 'cantidad'): ?>
<?= generarAlertaError('¡No hay suficiente stock para revertir esta entrada!') ?>
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
                <th rowspan="2">#</th>
                <th rowspan="2">Nombre del producto</th>
                <th rowspan="2">Cantidad</th>
                <th rowspan="2">Precio de entrada (USD$)</th>
                <th rowspan="2">Precio de entrada (Bs)</th>
                <th rowspan="2">Fecha de entrada</th>
                <th rowspan="2">Fecha de vencimiento</th>
                <?php if($_SESSION['usuario']['nom_rol'] == 'Administrador'): ?>
                    <th colspan="2">Acciones</th>
                <?php endif; ?>
            </tr>
            <?php if($_SESSION['usuario']['nom_rol'] == 'Administrador'): ?>
            <tr>
                <th>Revertir Entrada</th>
            </tr>
            <?php endif; ?>
        </thead>
        <tbody>
            <?php foreach ($entradas as $entrada):?>
            <tr>
                <td><?= $entrada['id_detalle_entrada'] ?></td>
                <td><?= ucfirst($entrada['nom_producto']); ?></td>
                <td><?= unidades($entrada['cantidad_entrada']);?></td>
                <td><?= moneyUsd($entrada['precio_entrada']);?></td>
                <td><?= moneyBolivar($entrada['precio_entrada'] * ($entrada['divisa_precio'] ?? 0));?></td>
                <td><?= formatoDeFecha($entrada['fecha_entrada']);?></td>
                <td><?= formatoDeFecha($entrada['fecha_vencimiento']);?></td>
                <?php if($_SESSION['usuario']['nom_rol'] == 'Administrador'): ?>
                <td>
                    <form action="<?= url('entradas/revertir') ?>" method="post" onsubmit="return confirm('¿Estas seguro que deseas revertir esta entrada de inventario?')">
                        <input type="hidden" name="id_producto" value="<?= $entrada['id_producto'] ?>">
                        <input type="hidden" name="id_entrada" value="<?= $entrada['id_entrada'] ?>">
                        <input type="hidden" name="id_detalle_entrada" value="<?= $entrada['id_detalle_entrada'] ?>">
                        <input type="hidden" name="stock_actual" value="<?= $entrada['stock'] ?>">
                        <input type="hidden" name="cantidad_entrada" value="<?= $entrada['cantidad_entrada'] ?>">
                        <button type="submit" class="btn btn-danger">Revertir</button>
                    </form>
                </td>
                <?php endif; ?>
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