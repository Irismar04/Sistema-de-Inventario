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
    <button class="btn btn-info" onclick="generarPDF()" style="float: right;">Generar PDF</button>
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

    function generarPDF() {
        const doc = new window.jspdf.jsPDF()

        const titulo = 'Reporte - Entradas';
        const rif = 'RIF: J-412948105';
        const direccion = 'Dirección: Guayacán de las Flores, Sector Calle 7, casa n°22';
        const nombre = 'Dueño: Edgar Zorrilla';
        const imgWidth = 32;
        const imgHeight = 28;
        const imgX = 10;
        const imgY = 10;

        // Añadir el título y la imagen en la misma línea
        doc.setFontSize(16);
        doc.text(titulo, imgX + imgWidth + 10, imgY - 8 + imgHeight / 2);
        doc.setFontSize(10);
        doc.text(rif, imgX + imgWidth + 10, imgY + imgHeight / 2);
        doc.text(direccion, imgX + imgWidth + 10, imgY + 8 + imgHeight / 2);
        doc.text(nombre, imgX + imgWidth + 10, imgY + 16 + imgHeight / 2);
        doc.addImage('<?= assetsDir('/img/imagen1.png') ?>', 'PNG', imgX, imgY, imgWidth, imgHeight);
        doc.autoTable({
            html: '#tabla-de-reporte',
            includeHiddenHtml: true,
            margin: { top: 50 },
        })
        doc.save(titulo);

    }
</script>